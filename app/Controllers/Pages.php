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
