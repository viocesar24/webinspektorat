<?php

namespace App\Controllers\Profil;

use App\Controllers\BaseController;
use App\Models\Profil\PenghargaanModel;

class Penghargaan extends BaseController
{

    protected $penghargaanModel;

    public function __construct()
    {
        $this->penghargaanModel = new PenghargaanModel();
    }

    public function index()
    {
        $data['penghargaan'] = $this->penghargaanModel->findAll() ?: [];
        return view('pages/adminPenghargaan/index', $data);
    }

    public function view($page)
    {
        $data = [
            'penghargaan' => $this->penghargaanModel->orderBy('id', 'DESC')->findAll(),
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $uploadPath = 'uploads/penghargaan';

                // Pastikan nama file yang dihasilkan benar-benar unik
                while (file_exists($uploadPath . '/' . $newName)) {
                    $newName = $file->getRandomName();
                }

                $file->move($uploadPath, $newName);
                $filePath = $uploadPath . '/' . $newName;
                $this->penghargaanModel->save(['gambar' => $filePath]);
            }
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin-profil/penghargaan');
        }
    }

    public function edit($id)
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $penghargaan = $this->penghargaanModel->find($id);
                if ($penghargaan && file_exists($penghargaan['gambar'])) {
                    unlink($penghargaan['gambar']); // Hapus file lama
                }

                $newName = $file->getRandomName();
                $uploadPath = 'uploads/penghargaan';

                // Pastikan nama file yang dihasilkan benar-benar unik
                while (file_exists($uploadPath . '/' . $newName)) {
                    $newName = $file->getRandomName();
                }

                $file->move($uploadPath, $newName);
                $filePath = $uploadPath . '/' . $newName;
                $this->penghargaanModel->update($id, ['gambar' => $filePath]);
            }
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
            return redirect()->to('/admin-profil/penghargaan');
        }
    }

    public function delete($id)
    {
        $penghargaan = $this->penghargaanModel->find($id);
        if ($penghargaan && file_exists($penghargaan['gambar'])) {
            unlink($penghargaan['gambar']); // Hapus file
        }
        $this->penghargaanModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/admin-profil/penghargaan');
    }

    public function getImage($id)
    {
        $penghargaan = $this->penghargaanModel->find($id);
        if ($penghargaan && file_exists($penghargaan['gambar'])) {
            return base64_encode(file_get_contents($penghargaan['gambar']));
        }
        return null;
    }
}
