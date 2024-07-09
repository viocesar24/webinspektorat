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
        helper("cookie");
        if (get_cookie("username") == "admin") {
            $data['struktur'] = $this->strukturModel->findAll() ?: [];
            return view('pages/adminStruktur/index', $data);
        } else {
            return redirect()->to('/home/view/admin');
        }
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $file = $this->request->getFile('gambar');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads', $newName);
                $filePath = 'uploads/' . $newName;
                $this->strukturModel->save(['gambar' => $filePath]);
            }
            return redirect()->to('/profil/struktur');
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
                $file->move('uploads', $newName);
                $filePath = 'uploads/' . $newName;
                $this->strukturModel->update($id, ['gambar' => $filePath]);
            }
            return redirect()->to('/profil/struktur');
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
            return redirect()->to('/profil/struktur');
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
