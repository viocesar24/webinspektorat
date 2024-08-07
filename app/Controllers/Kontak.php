<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KontakModel;

class Kontak extends BaseController
{

    protected $kontakModel;

    public function __construct()
    {
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        $data['kontak'] = $this->kontakModel->findAll(); // Ambil data pertama

        return view('pages/adminKontak/index', $data); // Sesuaikan path view
    }

    public function view($page)
    {
        $data = [
            'kontak' => $this->kontakModel->first(),
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }

    public function create()
    {
        // Memeriksa apakah request method adalah POST
        if ($this->request->getMethod() === 'post') {
            // Aturan validasi untuk input
            $rules = [
                'alamat' => 'required',
                'googlemaps' => 'required',
                'telepon' => 'required',
                'email' => 'required',
                'instagram' => 'permit_empty',
                'facebook' => 'permit_empty',
                'twitter' => 'permit_empty',
                'tiktok' => 'permit_empty',
                'youtube' => 'permit_empty',
            ];

            // Validasi input
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            // Data kontak yang akan disimpan
            $data = [
                'alamat' => $this->request->getPost('alamat'),
                'googlemaps' => $this->request->getPost('googlemaps'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'instagram' => $this->request->getPost('instagram'),
                'facebook' => $this->request->getPost('facebook'),
                'twitter' => $this->request->getPost('twitter'),
                'tiktok' => $this->request->getPost('tiktok'),
                'youtube' => $this->request->getPost('youtube'),
            ];

            // Menyimpan data kontak ke database
            $this->kontakModel->insert($data);
            return redirect()->to('/admin-lainnya/kontak')->with('success', 'Kontak berhasil ditambahkan.');
        }

        return redirect()->to('/admin-lainnya/kontak')->with('error', 'Kontak gagal ditambahkan.');
    }

    public function update($id)
    {
        // Pastikan $id valid (misalnya, periksa apakah kontak dengan ID tersebut ada)
        if (!$this->kontakModel->find($id)) {
            return redirect()->to('/admin-lainnya/kontak')->with('error', 'Kontak tidak ditemukan.');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'alamat' => 'required',
                'googlemaps' => 'required',
                'telepon' => 'required',
                'email' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $data = [
                'alamat' => $this->request->getPost('alamat'),
                'googlemaps' => $this->request->getPost('googlemaps'),
                'telepon' => $this->request->getPost('telepon'),
                'email' => $this->request->getPost('email'),
                'instagram' => $this->request->getPost('instagram'),
                'facebook' => $this->request->getPost('facebook'),
                'twitter' => $this->request->getPost('twitter'),
                'tiktok' => $this->request->getPost('tiktok'),
                'youtube' => $this->request->getPost('youtube'),
            ];

            $this->kontakModel->update($id, $data);
            return redirect()->to('/admin-lainnya/kontak')->with('success', 'Kontak berhasil diperbarui.');
        }

        return redirect()->to('/admin-lainnya/kontak')->with('error', 'Kontak gagal diperbarui.');
    }

    public function delete($id)
    {
        try {
            // 1. Ambil data kontak berdasarkan ID
            $kontak = $this->kontakModel->find($id);

            // 2. Jika kontak tidak ditemukan, arahkan kembali dengan pesan error
            if (!$kontak) {
                return redirect()->to('/admin-lainnya/kontak')->with('error', 'Kontak tidak ditemukan.');
            }

            // 3. Hapus data kontak dari database
            if (!$this->kontakModel->delete($id)) {
                throw new \Exception("Gagal menghapus kontak dari database");
            }

            // 4. Arahkan kembali dengan pesan sukses
            return redirect()->to('/admin-lainnya/kontak')->with('success', 'Kontak berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error yang terjadi
            log_message('error', $e->getMessage()); // Log pesan error (opsional)
            return redirect()->to('/admin-lainnya/kontak')->with('error', 'Terjadi kesalahan saat menghapus kontak.');
        }
    }
}
