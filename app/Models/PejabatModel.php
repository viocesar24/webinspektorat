<?php

namespace App\Models;

use CodeIgniter\Model;

class PejabatModel extends Model
{
    protected $table = 'pejabat';

    public function getPejabat($slug = false)
    {
        // KODE DI BAWAH DIGUNAKAN UNTUK MENGAMBIL SEMUA DATA PEJABAT DARI DATABASE
        if ($slug === false) {
            // RETURN SEMUA DATA PEJABAT DENGAN METHOD CODEIGNITER findAll()
            return $this->findAll();
        }

        // KODE DI BAWAH DIGUNAKAN UNTUK MENGAMBIL DATA PEJABAT DENGAN SLUG TERTENTU
        return $this->where(['slug' => $slug])->first();
    }
}
