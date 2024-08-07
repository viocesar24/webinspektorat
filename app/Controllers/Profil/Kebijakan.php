<?php

namespace App\Controllers\Profil;

use App\Controllers\BaseController;
use App\Models\Profil\KebijakanModel;

class Kebijakan extends BaseController
{

    protected $kebijakanModel;

    public function __construct()
    {
        $this->kebijakanModel = new KebijakanModel();
    }

    public function index()
    {
        $data['kebijakan'] = $this->kebijakanModel->first();

        if (!$data['kebijakan']) {
            $data['kebijakan'] = ['kebijakan' => ''];
        }

        return view('pages/adminKebijakan/index', $data);
    }

    public function view($page)
    {
        $data = [
            'kebijakan' => $this->kebijakanModel->orderBy('id', 'DESC')->first(),
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        $this->kebijakanModel->save([
            'kebijakan' => $this->request->getVar('teks')
        ]);

        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin-profil/kebijakan');
    }

    public function update()
    {
        $id = 1;

        $this->kebijakanModel->update($id, [
            'kebijakan' => $this->request->getVar('teks')
        ]);

        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/admin-profil/kebijakan');
    }

    public function delete($id = 1)
    {
        if ($this->kebijakanModel->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Data gagal dihapus. ' . implode('<br>', $this->kebijakanModel->errors()));
        }
        return redirect()->to('/admin-profil/kebijakan');
    }
}
