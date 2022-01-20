<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'berita';

    public function getNews($slug = false)
    {
        // KODE DI BAWAH DIGUNAKAN UNTUK MENGAMBIL SEMUA DATA BERITA DARI DATABASE
        if ($slug === false) {
            // DATA BERITA YANG DIAMBIL DIURUTKAN BERDASARKAN WAKTU
            $this->orderBy('waktu', 'DESC');
            // RETURN SEMUA DATA BERITA YANG SUDAH DIURUTKAN DENGAN METHOD CODEIGNITER findAll()
            return $this->findAll();
        }

        // KODE DI BAWAH DIGUNAKAN UNTUK MENGAMBIL DATA BERITA DENGAN SLUG TERTENTU
        return $this->where(['slug' => $slug])->first();
    }
}
