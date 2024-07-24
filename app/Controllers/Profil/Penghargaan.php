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

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/penghargaan', $newName);
                $filePath = 'uploads/penghargaan/' . $newName;
                $this->penghargaanModel->save(['gambar' => $filePath]);
            }
            return redirect()->to('/profil/penghargaan');
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
                $file->move('uploads/penghargaan', $newName);
                $filePath = 'uploads/penghargaan/' . $newName;
                $this->penghargaanModel->update($id, ['gambar' => $filePath]);
            }
            return redirect()->to('/profil/penghargaan');
        }
    }

    public function delete($id)
    {
        $penghargaan = $this->penghargaanModel->find($id);
        if ($penghargaan && file_exists($penghargaan['gambar'])) {
            unlink($penghargaan['gambar']); // Hapus file
        }
        $this->penghargaanModel->delete($id);
        return redirect()->to('/profil/penghargaan');
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
