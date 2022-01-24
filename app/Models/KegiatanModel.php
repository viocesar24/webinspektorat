<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanModel extends Model
{
    protected $table = 'kegiatan';

    public function getKegiatan($slug = false)
    {
        // KODE DI BAWAH DIGUNAKAN UNTUK MENGAMBIL SEMUA DATA KEGIATAN DARI DATABASE
        if ($slug === false) {
            // DATA KEGIATAN YANG DIAMBIL DIURUTKAN BERDASARKAN WAKTU
            $this->orderBy('waktu', 'DESC');
            // RETURN SEMUA DATA KEGIATAN YANG SUDAH DIURUTKAN DENGAN METHOD CODEIGNITER findAll()
            return $this->findAll();
        }

        // KODE DI BAWAH DIGUNAKAN UNTUK MENGAMBIL DATA KEGIATAN DENGAN SLUG TERTENTU
        return $this->where(['slug' => $slug])->first();
    }
}
