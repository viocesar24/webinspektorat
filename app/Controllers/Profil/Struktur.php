<?php

namespace App\Controllers\Profil;

use App\Controllers\BaseController;
use App\Models\Profil\StrukturModel;

class Struktur extends BaseController
{

    protected $strukturModel;

    public function __construct()
    {
        $this->strukturModel = new StrukturModel();
    }

    public function index()
    {
        $data['struktur'] = $this->strukturModel->findAll() ?: [];
        return view('pages/adminStruktur/index', $data);
    }

    public function view($page)
    {
        // Ambil data struktur paling akhir
        $data['struktur'] = $this->strukturModel->orderBy('id', 'DESC')->first() ?: null;

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
                $uploadPath = 'uploads';

                // Pastikan nama file yang dihasilkan benar-benar unik
                while (file_exists($uploadPath . '/' . $newName)) {
                    $newName = $file->getRandomName();
                }

                $file->move($uploadPath, $newName);
                $filePath = $uploadPath . '/' . $newName;
                $this->strukturModel->save(['gambar' => $filePath]);
            }
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin-profil/struktur');
        }
    }

    public function edit($id)
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $struktur = $this->strukturModel->find($id);
                if ($struktur && file_exists($struktur['gambar'])) {
                    unlink($struktur['gambar']); // Hapus file lama
                }

                $newName = $file->getRandomName();
                $uploadPath = 'uploads';

                // Pastikan nama file yang dihasilkan benar-benar unik
                while (file_exists($uploadPath . '/' . $newName)) {
                    $newName = $file->getRandomName();
                }

                $file->move($uploadPath, $newName);
                $filePath = $uploadPath . '/' . $newName;
                $this->strukturModel->update($id, ['gambar' => $filePath]);
            }
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
            return redirect()->to('/admin-profil/struktur');
        }
    }

    public function delete($id)
    {
        if ($this->request->getMethod() === 'post') {
            $struktur = $this->strukturModel->find($id);
            if ($struktur && file_exists($struktur['gambar'])) {
                unlink($struktur['gambar']); // Hapus file dari server
            }
            $this->strukturModel->delete($id);
            session()->setFlashdata('success', 'Data berhasil dihapus.');
            return redirect()->to('/admin-profil/struktur');
        }
    }

    public function getImage($id)
    {
        $data = $this->strukturModel->find($id);
        if ($data && file_exists($data['gambar'])) {
            return $this->response->setContentType('image/jpeg')->setBody(file_get_contents($data['gambar']));
        }
        return $this->response->setStatusCode(404, 'File Not Found');
    }
}
