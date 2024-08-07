<?php

namespace App\Models\Informasi;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'slug', 'badan', 'waktu', 'gambar_1', 'gambar_2', 'gambar_3', 'gambar_4', 'gambar_5', 'gambar_6', 'gambar_7', 'gambar_8', 'gambar_9', 'gambar_10', 'gambar_11', 'gambar_12', 'gambar_13', 'gambar_14', 'gambar_15'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'waktu';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Fungsi untuk membuat slug otomatis
    public function generateSlug($judul, $waktu)
    {
        $slug = url_title($judul . ' ' . $waktu, '-', true);
        return $slug;
    }

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

    public function cariBerita($kunci)
    {
        if ($kunci == '') {
            $this->orderBy('waktu', 'DESC');
            return $this->findAll();
        }

        return $this->orderBy('waktu', 'DESC')->like('judul', $kunci);
    }
}
