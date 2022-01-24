<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        $model = model(NewsModel::class);
        $modelKegiatan = model(KegiatanModel::class);
        $modelPejabat = model(PejabatModel::class);

        $data['berita'] = $model->getNews();
        $data['kegiatan'] = $modelKegiatan->getNews();
        $data['pejabat'] = $modelPejabat->getNews();
    }

    public function view($page = 'home')
    {
        $model = model(NewsModel::class);
        $modelKegiatan = model(KegiatanModel::class);
        $modelPejabat = model(PejabatModel::class);

        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            //Oh..., tidak ada halaman yang dimaksud
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        // MENGUMPULKAN OBJEK-OBJEK YANG DIBUTUHKAN KE DALAM OBJEK $data
        // 'berita' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MENGAMBIL DATA BERITA DARI METHOD getNews() CLASS NewsModel
        // 'title' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MEMUAT HURUF PERTAMA DARI OBJEK $page
        // 'beritaHalaman' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MEMUAT DATA BERITA YANG DIURUTKAN BERDASARKAN WAKTU TERBARU DAN DIPISAH MENJADI 3 HALAMAN DALAM GRUP 1
        // 'pager' MERUPAKAN OBJEK YANG DIGUNAKAN UNTUK MENAMPILKAN FUNGSI PAGINASI
        // UNTUK MEMAKAI pager, SEBELUMNYA BUAT KUSTOM LINK UNTUK PAGINASI SESUAI TEMA WEBSITE, CONTOHNYA ADA PADA FOLDER TEMPLATES paginasi.php
        $data = [
            'berita' => $model->getNews(),
            'kegiatan' => $modelKegiatan->getKegiatan(),
            'pejabat' => $modelPejabat->getPejabat(),
            'title' => ucfirst($page),
            'beritaHalaman' => $model->orderBy('waktu', 'DESC')->paginate(3, 'group1'),
            'kegiatanHalaman' => $modelKegiatan->orderBy('waktu', 'DESC')->paginate(3, 'group1'),
            'pejabatHalaman' => $modelPejabat->paginate(4, 'group1'),
            'pager' => $model->pager,
            'pagerKegiatan' => $modelKegiatan->pager,
            'pagerPejabat' => $modelPejabat->pager,
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
}
