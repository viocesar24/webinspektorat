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
        helper("cookie");

        // // get cookie value
        // get_cookie("username");

        // // remove cookie value
        // delete_cookie("username");

        $model = model(NewsModel::class);
        $modelKegiatan = model(KegiatanModel::class);
        $modelPejabat = model(PejabatModel::class);
        $request = \Config\Services::request();
        $kunci = $request->getVar('cari');
        $admin = $request->getPost();
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

        if ($stringAdmin == 't@!T`,7u2W-+[/`d') {
            $adminBool = true;
            // store a cookie value
            set_cookie("username", "admin", 3600);
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
            'beritaHalaman' => $model->orderBy('waktu', 'DESC')->paginate(5, 'group1'),
            'kegiatanHalaman' => $modelKegiatan->orderBy('waktu', 'DESC')->paginate(5, 'group1'),
            'pejabatHalaman' => $modelPejabat->paginate(10, 'group1'),
            'pager' => $model->pager,
            'pagerKegiatan' => $modelKegiatan->pager,
            'pagerPejabat' => $modelPejabat->pager,
            'beritaHalamanAdmin' => $model->orderBy('waktu', 'ASC')->paginate(1, 'group1'),
            'kegiatanHalamanAdmin' => $modelKegiatan->orderBy('waktu', 'ASC')->paginate(1, 'group1'),
            'pagerBeritaAdmin' => $model->pager,
            'pagerKegiatanAdmin' => $modelKegiatan->pager,
        ];

        if ($page == 'admin' || $page == 'adminberita' || $page == 'adminkegiatan') {
            if (get_cookie("username") == "admin") {
                # code...
                echo view('templates/headeradmin', $data);
                echo view('pages/' . $page, $data);
                echo view('templates/footeradmin', $data);
            } else {
                # code...
                echo view('templates/headeradmin', $data);
                echo view('pages/' . 'admin', $data);
                echo view('templates/footeradmin', $data);
            }
        } else {
            # code...
            delete_cookie("username");
            echo view('templates/header', $data);
            echo view('pages/' . $page, $data);
            echo view('templates/footer', $data);
        }
    }

    public function tambahberita()
    {
        $modelBerita = model(NewsModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => 'min_length[0]',
            'judul_berita' => 'required|min_length[3]|max_length[255]',
            'slug_berita' => 'required',
            'badan_berita'  => 'required',
            'waktu_berita'  => 'required',
            'gambar1_berita'  => 'required',
            'gambar2_berita'  => 'required',
            'gambar3_berita'  => 'permit_empty',
            'gambar4_berita'  => 'permit_empty',
            'gambar5_berita'  => 'permit_empty',
            'gambar6_berita'  => 'permit_empty',
            'gambar7_berita'  => 'permit_empty',
            'gambar8_berita'  => 'permit_empty',
            'gambar9_berita'  => 'permit_empty',
            'gambar10_berita'  => 'permit_empty',
        ])) {
            $modelBerita->save([
                'id' => $this->request->getPost('id_number'),
                'judul'  => $this->request->getPost('judul_berita'),
                'slug'  => $this->request->getPost('slug_berita'),
                'badan'  => $this->request->getPost('badan_berita'),
                'waktu'  => $this->request->getPost('waktu_berita'),
                'gambar_1'  => $this->request->getPost('gambar1_berita'),
                'gambar_2'  => $this->request->getPost('gambar2_berita'),
                'gambar_3'  => $this->request->getPost('gambar3_berita'),
                'gambar_4'  => $this->request->getPost('gambar4_berita'),
                'gambar_5'  => $this->request->getPost('gambar5_berita'),
                'gambar_6'  => $this->request->getPost('gambar6_berita'),
                'gambar_7'  => $this->request->getPost('gambar7_berita'),
                'gambar_8'  => $this->request->getPost('gambar8_berita'),
                'gambar_9'  => $this->request->getPost('gambar9_berita'),
                'gambar_10'  => $this->request->getPost('gambar10_berita'),
            ]);

            return redirect()->to(base_url() . '/home/view/adminberita');
        } else {
            return redirect()->to(base_url() . '/home/view/admin');
        }
    }

    public function pembaruanberita()
    {
        $modelBerita = model(NewsModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => 'min_length[0]',
            'judul_berita' => 'required|min_length[3]|max_length[255]',
            'slug_berita' => 'required',
            'badan_berita'  => 'required',
            'waktu_berita'  => 'required',
            'gambar1_berita'  => 'required',
            'gambar2_berita'  => 'required',
            'gambar3_berita'  => 'permit_empty',
            'gambar4_berita'  => 'permit_empty',
            'gambar5_berita'  => 'permit_empty',
            'gambar6_berita'  => 'permit_empty',
            'gambar7_berita'  => 'permit_empty',
            'gambar8_berita'  => 'permit_empty',
            'gambar9_berita'  => 'permit_empty',
            'gambar10_berita'  => 'permit_empty',
        ])) {
            $modelBerita->replace([
                'id' => $this->request->getPost('id_number'),
                'judul'  => $this->request->getPost('judul_berita'),
                'slug'  => $this->request->getPost('slug_berita'),
                'badan'  => $this->request->getPost('badan_berita'),
                'waktu'  => $this->request->getPost('waktu_berita'),
                'gambar_1'  => $this->request->getPost('gambar1_berita'),
                'gambar_2'  => $this->request->getPost('gambar2_berita'),
                'gambar_3'  => $this->request->getPost('gambar3_berita'),
                'gambar_4'  => $this->request->getPost('gambar4_berita'),
                'gambar_5'  => $this->request->getPost('gambar5_berita'),
                'gambar_6'  => $this->request->getPost('gambar6_berita'),
                'gambar_7'  => $this->request->getPost('gambar7_berita'),
                'gambar_8'  => $this->request->getPost('gambar8_berita'),
                'gambar_9'  => $this->request->getPost('gambar9_berita'),
                'gambar_10'  => $this->request->getPost('gambar10_berita'),
            ]);

            return redirect()->to(base_url() . '/home/view/adminberita');
        } else {
            return redirect()->to(base_url() . '/home/view/admin');
        }
    }

    public function hapusberita()
    {
        $modelBerita = model(NewsModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => 'min_length[0]',
        ])) {
            $modelBerita->delete([
                'id' => $this->request->getPost('id_number'),
            ]);

            return redirect()->to(base_url() . '/home/view/adminberita');
        } else {
            return redirect()->to(base_url() . '/home/view/admin');
        }
    }

    public function tambahkegiatan()
    {
        $modelKegiatan = model(KegiatanModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => 'min_length[0]',
            'judul_kegiatan' => 'required|min_length[3]|max_length[255]',
            'slug_kegiatan' => 'required',
            'badan_kegiatan'  => 'required',
            'waktu_kegiatan'  => 'required',
            'gambar1_kegiatan'  => 'required',
            'gambar2_kegiatan'  => 'required',
            'gambar3_kegiatan'  => 'permit_empty',
            'gambar4_kegiatan'  => 'permit_empty',
            'gambar5_kegiatan'  => 'permit_empty',
            'gambar6_kegiatan'  => 'permit_empty',
            'gambar7_kegiatan'  => 'permit_empty',
            'gambar8_kegiatan'  => 'permit_empty',
            'gambar9_kegiatan'  => 'permit_empty',
            'gambar10_kegiatan'  => 'permit_empty',
        ])) {
            $modelKegiatan->save([
                'id' => $this->request->getPost('id_number'),
                'judul'  => $this->request->getPost('judul_kegiatan'),
                'slug'  => $this->request->getPost('slug_kegiatan'),
                'badan'  => $this->request->getPost('badan_kegiatan'),
                'waktu'  => $this->request->getPost('waktu_kegiatan'),
                'gambar_1'  => $this->request->getPost('gambar1_kegiatan'),
                'gambar_2'  => $this->request->getPost('gambar2_kegiatan'),
                'gambar_3'  => $this->request->getPost('gambar3_kegiatan'),
                'gambar_4'  => $this->request->getPost('gambar4_kegiatan'),
                'gambar_5'  => $this->request->getPost('gambar5_kegiatan'),
                'gambar_6'  => $this->request->getPost('gambar6_kegiatan'),
                'gambar_7'  => $this->request->getPost('gambar7_kegiatan'),
                'gambar_8'  => $this->request->getPost('gambar8_kegiatan'),
                'gambar_9'  => $this->request->getPost('gambar9_kegiatan'),
                'gambar_10'  => $this->request->getPost('gambar10_kegiatan'),
            ]);

            return redirect()->to(base_url() . '/home/view/adminkegiatan');
        } else {
            return redirect()->to(base_url() . '/home/view/admin');
        }
    }

    public function pembaruankegiatan()
    {
        $modelKegiatan = model(KegiatanModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => 'min_length[0]',
            'judul_kegiatan' => 'required|min_length[3]|max_length[255]',
            'slug_kegiatan' => 'required',
            'badan_kegiatan'  => 'required',
            'waktu_kegiatan'  => 'required',
            'gambar1_kegiatan'  => 'required',
            'gambar2_kegiatan'  => 'required',
            'gambar3_kegiatan'  => 'permit_empty',
            'gambar4_kegiatan'  => 'permit_empty',
            'gambar5_kegiatan'  => 'permit_empty',
            'gambar6_kegiatan'  => 'permit_empty',
            'gambar7_kegiatan'  => 'permit_empty',
            'gambar8_kegiatan'  => 'permit_empty',
            'gambar9_kegiatan'  => 'permit_empty',
            'gambar10_kegiatan'  => 'permit_empty',
        ])) {
            $modelKegiatan->replace([
                'id' => $this->request->getPost('id_number'),
                'judul'  => $this->request->getPost('judul_kegiatan'),
                'slug'  => $this->request->getPost('slug_kegiatan'),
                'badan'  => $this->request->getPost('badan_kegiatan'),
                'waktu'  => $this->request->getPost('waktu_kegiatan'),
                'gambar_1'  => $this->request->getPost('gambar1_kegiatan'),
                'gambar_2'  => $this->request->getPost('gambar2_kegiatan'),
                'gambar_3'  => $this->request->getPost('gambar3_kegiatan'),
                'gambar_4'  => $this->request->getPost('gambar4_kegiatan'),
                'gambar_5'  => $this->request->getPost('gambar5_kegiatan'),
                'gambar_6'  => $this->request->getPost('gambar6_kegiatan'),
                'gambar_7'  => $this->request->getPost('gambar7_kegiatan'),
                'gambar_8'  => $this->request->getPost('gambar8_kegiatan'),
                'gambar_9'  => $this->request->getPost('gambar9_kegiatan'),
                'gambar_10'  => $this->request->getPost('gambar10_kegiatan'),
            ]);

            return redirect()->to(base_url() . '/home/view/adminkegiatan');
        } else {
            return redirect()->to(base_url() . '/home/view/admin');
        }
    }

    public function hapuskegiatan()
    {
        $modelKegiatan = model(KegiatanModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'id_number' => 'min_length[0]',
        ])) {
            $modelKegiatan->delete([
                'id' => $this->request->getPost('id_number'),
            ]);

            return redirect()->to(base_url() . '/home/view/adminkegiatan');
        } else {
            return redirect()->to(base_url() . '/home/view/admin');
        }
    }
}
