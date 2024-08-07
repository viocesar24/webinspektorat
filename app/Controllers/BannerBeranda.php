<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BannerBerandaModel;

class BannerBeranda extends BaseController
{

    protected $bannerBerandaModel;

    public function __construct()
    {
        $this->bannerBerandaModel = new BannerBerandaModel();
    }

    public function index()
    {
        $data = [
            'bannerBeranda' => $this->bannerBerandaModel->findAll(),
        ];
        return view('pages/adminBannerBeranda/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'judul' => $this->request->getPost('judul'),
                'link' => $this->request->getPost('link'),
            ];

            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $uploadPath = 'uploads/bannerBeranda';

                // Pastikan nama file yang dihasilkan benar-benar unik
                while (file_exists($uploadPath . '/' . $newName)) {
                    $newName = $file->getRandomName();
                }

                $file->move($uploadPath, $newName);
                $filePath = $uploadPath . '/' . $newName;
                $data['gambar'] = $filePath; // Tambahkan path gambar ke array data
            }

            // Simpan semua data sekaligus
            $this->bannerBerandaModel->save($data);
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin-lainnya/banner-beranda');
        }

        return redirect()->to('/admin-lainnya/banner-beranda')->with('error', 'Data gagal ditambahkan.');
    }

    public function update($id)
    {
        // Pastikan $id valid (misalnya, periksa apakah banner dengan ID tersebut ada)
        if (!$this->bannerBerandaModel->find($id)) {
            return redirect()->to('/admin-lainnya/banner-beranda')->with('error', 'Banner tidak ditemukan.');
        }

        if ($this->request->getMethod() === 'post') {
            $data = [
                'judul' => $this->request->getPost('judul'),
                'link' => $this->request->getPost('link'),
            ];

            $file = $this->request->getFile('gambar');
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $bannerBeranda = $this->bannerBerandaModel->find($id);
                if ($bannerBeranda && file_exists($bannerBeranda['gambar'])) {
                    unlink($bannerBeranda['gambar']); // Hapus file lama
                }

                $newName = $file->getRandomName();
                $uploadPath = 'uploads/bannerBeranda';

                // Pastikan nama file yang di-upload benar-benar unik
                while (file_exists($uploadPath . '/' . $newName)) {
                    $newName = $file->getRandomName();
                }

                $file->move($uploadPath, $newName);
                $filePath = $uploadPath . '/' . $newName;
                $data['gambar'] = $filePath; // Tambahkan path gambar ke array data
            }

            // Simpan semua data sekaligus
            $this->bannerBerandaModel->update($id, $data);
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
            return redirect()->to('/admin-lainnya/banner-beranda');
        }

        return redirect()->to('/admin-lainnya/banner-beranda')->with('error', 'Data gagal diperbarui.');
    }

    public function delete($id)
    {
        // Pastikan $id valid (misalnya, periksa apakah banner dengan ID tersebut ada)
        if (!$this->bannerBerandaModel->find($id)) {
            return redirect()->to('/admin-lainnya/banner-beranda')->with('error', 'Banner tidak ditemukan.');
        }

        $bannerBeranda = $this->bannerBerandaModel->find($id);
        if ($bannerBeranda && file_exists($bannerBeranda['gambar'])) {
            unlink($bannerBeranda['gambar']); // Hapus file lama
        }
        $this->bannerBerandaModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/admin-lainnya/banner-beranda');
    }
}
