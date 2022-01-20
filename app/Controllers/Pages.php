<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pages extends Controller
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data['berita'] = $model->getNews();
    }

    public function view($page = 'home')
    {
        $model = model(NewsModel::class);

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
            'title' => ucfirst($page),
            'beritaHalaman' => $model->orderBy('waktu', 'DESC')->paginate(3, 'group1'),
            'pager' => $model->pager,
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
}
