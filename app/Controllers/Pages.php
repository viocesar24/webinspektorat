<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
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

        // MENGUMPULKAN OBJEK-OBJEK YANG DIBUTUHKAN KE DALAM OBJEK $data
        // 'berita' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MENGAMBIL DATA BERITA DARI METHOD getNews() CLASS NewsModel
        // 'title' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MEMUAT HURUF PERTAMA DARI OBJEK $page
        // 'beritaHalaman' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MEMUAT DATA BERITA YANG DIURUTKAN BERDASARKAN WAKTU TERBARU DAN DIPISAH MENJADI 3 HALAMAN DALAM GRUP 1
        // 'pager' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MENAMPILKAN FUNGSI PAGINASI
        // UNTUK MEMAKAI pager, SEBELUMNYA BUAT KUSTOM LINK UNTUK PAGINASI SESUAI TEMA WEBSITE, CONTOHNYA ADA PADA FOLDER TEMPLATES paginasi.php
        $data = [
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
}
