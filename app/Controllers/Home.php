<?php

namespace App\Controllers;

use App\Models\Informasi\BeritaModel;
use App\Models\Informasi\KegiatanModel;
use App\Models\LayananModel;
use App\Models\KontakModel;
use App\Models\BannerBerandaModel;

class Home extends BaseController
{

    // Properti $tentangModel:
    // Properti ini digunakan untuk menyimpan instance dari model TentangModel, yang akan digunakan di dalam fungsi-fungsi controller.
    protected $beritaModel;
    protected $kegiatanModel;
    protected $layananModel;
    protected $kontakModel;
    protected $bannerBerandaModel;

    // Konstruktor __construct():
    // Konstruktor ini dipanggil saat controller dibuat. Di dalamnya, Anda membuat instance baru dari model TentangModel dan menyimpannya ke dalam properti $tentangModel.
    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->layananModel = new LayananModel();
        $this->kontakModel = new KontakModel();
        $this->bannerBerandaModel = new BannerBerandaModel();
    }

    public function view($page)
    {
        $data = [
            'berita' => $this->beritaModel->getNews(),
            'kegiatan' => $this->kegiatanModel->getKegiatan(),
            'layanan' => $this->layananModel->findAll(),
            'kontak' => $this->kontakModel->first(),
            'bannerBeranda' => $this->bannerBerandaModel->findAll(),
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }
}
