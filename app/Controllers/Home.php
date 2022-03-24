<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\KegiatanModel;
use App\Models\PejabatModel;

class Home extends BaseController
{

    public function index()
    {
        return $this->view();
    }

    public function view($page = 'home', $slug = false)
    {
        $model = model(NewsModel::class);
        $modelKegiatan = model(KegiatanModel::class);
        $modelPejabat = model(PejabatModel::class);
        $request = \Config\Services::request();
        $kunci = $request->getGet();
        $admin = $request->getGet();
        $stringAdmin = implode("", $admin);

        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            //Oh..., tidak ada halaman yang dimaksud
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        if ($kunci) {
            $kunciBool = true;
        } else {
            $kunciBool = false;
        }

        if ($slug != '') {
            $slugBool = true;
        } else {
            $slugBool = false;
        }

        if ($stringAdmin == 'admin') {
            $adminBool = true;
        } else {
            $adminBool = false;
        }

        // MENGUMPULKAN OBJEK-OBJEK YANG DIBUTUHKAN KE DALAM OBJEK $data
        // 'berita' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MENGAMBIL DATA BERITA DARI METHOD getNews() CLASS NewsModel
        // 'title' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MEMUAT HURUF PERTAMA DARI OBJEK $page
        // 'beritaHalaman' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MEMUAT DATA BERITA YANG DIURUTKAN BERDASARKAN WAKTU TERBARU DAN DIPISAH MENJADI 3 HALAMAN DALAM GRUP 1
        // 'pager' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MENAMPILKAN FUNGSI PAGINASI
        // UNTUK MEMAKAI pager, SEBELUMNYA BUAT KUSTOM LINK UNTUK PAGINASI SESUAI TEMA WEBSITE, CONTOHNYA ADA PADA FOLDER TEMPLATES paginasi.php
        $data = [
            'admin' => $adminBool,
            'kunci' => $kunciBool,
            'slug' => $slugBool,
            'berita' => $model->getNews(),
            'beritaDetail' => $model->getNews($slug),
            'cariBerita' => $model->cariBerita($kunci),
            'cariBerita' => $model->orderBy('waktu', 'DESC')->paginate(100, 'group1'),
            'kegiatan' => $modelKegiatan->getKegiatan(),
            'pejabat' => $modelPejabat->getPejabat(),
            'title' => ucfirst($page),
            'beritaHalaman' => $model->orderBy('waktu', 'DESC')->paginate(2, 'group1'),
            'kegiatanHalaman' => $modelKegiatan->orderBy('waktu', 'DESC')->paginate(2, 'group1'),
            'pejabatHalaman' => $modelPejabat->paginate(10, 'group1'),
            'pager' => $model->pager,
            'pagerKegiatan' => $modelKegiatan->pager,
            'pagerPejabat' => $modelPejabat->pager,
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }

    public function insertBerita()
    {
        $modelBerita = model(NewsModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => '',
            'judul_berita' => 'required|min_length[3]|max_length[255]',
            'slug_berita' => 'required',
            'badan_berita'  => 'required',
            'waktu_berita'  => 'required',
            'gambar1_berita'  => 'required',
            'gambar2_berita'  => 'required',
        ])) {
            $modelBerita->save([
                'id' => $this->request->getPost('id_number'),
                'judul'  => $this->request->getPost('judul_berita'),
                'slug'  => $this->request->getPost('slug_berita'),
                'badan'  => $this->request->getPost('badan_berita'),
                'waktu'  => $this->request->getPost('waktu_berita'),
                'gambar_1'  => $this->request->getPost('gambar1_berita'),
                'gambar_2'  => $this->request->getPost('gambar2_berita'),
            ]);

            return $this->view('d2Dys3Berita');
        } else {
            return $this->view('d2Dys3Berita');
        }
    }

    public function insertKegiatan()
    {
        $modelKegiatan = model(KegiatanModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => '',
            'judul_kegiatan' => 'required|min_length[3]|max_length[255]',
            'slug_kegiatan' => 'required',
            'badan_kegiatan'  => 'required',
            'waktu_kegiatan'  => 'required',
            'gambar1_kegiatan'  => 'required',
            'gambar2_kegiatan'  => 'required',
        ])) {
            $modelKegiatan->save([
                'id' => $this->request->getPost('id_number'),
                'judul'  => $this->request->getPost('judul_kegiatan'),
                'slug'  => $this->request->getPost('slug_kegiatan'),
                'badan'  => $this->request->getPost('badan_kegiatan'),
                'waktu'  => $this->request->getPost('waktu_kegiatan'),
                'gambar_1'  => $this->request->getPost('gambar1_kegiatan'),
                'gambar_2'  => $this->request->getPost('gambar2_kegiatan'),
            ]);

            return $this->view('d2Dys3Kegiatan');
        } else {
            return $this->view('d2Dys3Kegiatan');
        }
    }
}
