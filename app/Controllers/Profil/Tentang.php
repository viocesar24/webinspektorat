<?php

namespace App\Controllers\Profil;

use App\Controllers\BaseController;
use App\Models\Profil\TentangModel;

class Tentang extends BaseController
{
    protected $tentangModel;

    public function __construct()
    {
        $this->tentangModel = new \App\Models\Profil\TentangModel();
    }

    public function index()
    {
        $data['tentang'] = $this->tentangModel->first(); // Ambil data pertama
        return view('adminTentang/index', $data);
    }

    public function edit($id)
    {
        $id = 1; // Asumsikan ID selalu 1 karena hanya ada satu baris
        $data['tentang'] = $this->tentangModel->find($id);
        return view('adminTentang/edit', $data);
    }

    public function update($id)
    {
        $id = 1; // Asumsikan ID selalu 1 karena hanya ada satu baris
        $this->tentangModel->update($id, [
            'teks' => $this->request->getPost('teks')
        ]);
        return redirect()->to('/adminTentang');
    }
}
