<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LayananModel;
use App\Models\KontakModel;

class Layanan extends BaseController
{

    protected $layananModel;
    protected $kontakModel;

    public function __construct()
    {
        $this->layananModel = new LayananModel();
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        $data['layanan'] = $this->layananModel->findAll(); // Ambil data pertama

        return view('pages/adminLayanan/index', $data); // Sesuaikan path view
    }

    public function view($page)
    {
        $data = [
            'layanan' => $this->layananModel->findAll(),
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
                'judul' => 'required',
                'badan' => 'required',
            ];

            // Validasi input
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            // Data layanan yang akan disimpan
            $data = [
                'judul' => $this->request->getPost('judul'),
                'badan' => $this->request->getPost('badan'),
            ];

            // Menyimpan data layanan ke database
            $this->layananModel->insert($data);
            return redirect()->to('/admin-lainnya/layanan')->with('success', 'Layanan berhasil ditambahkan.');
        }

        return redirect()->to('/admin-lainnya/layanan')->with('error', 'Layanan gagal ditambahkan.');
    }

    public function update($id)
    {
        // Pastikan $id valid (misalnya, periksa apakah layanan dengan ID tersebut ada)
        if (!$this->layananModel->find($id)) {
            return redirect()->to('/admin-lainnya/layanan')->with('error', 'Layanan tidak ditemukan.');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'judul' => 'required',
                'badan' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $data = [
                'judul' => $this->request->getPost('judul'),
                'badan' => $this->request->getPost('badan'),
            ];

            $this->layananModel->update($id, $data);
            return redirect()->to('/admin-lainnya/layanan')->with('success', 'Layanan berhasil diperbarui.');
        }

        return redirect()->to('/admin-lainnya/layanan')->with('error', 'Layanan gagal diperbarui.');
    }

    public function delete($id)
    {
        try {
            // 1. Ambil data layanan berdasarkan ID
            $layanan = $this->layananModel->find($id);

            // 2. Jika layanan tidak ditemukan, arahkan kembali dengan pesan error
            if (!$layanan) {
                return redirect()->to('/admin-lainnya/layanan')->with('error', 'Layanan tidak ditemukan.');
            }

            // 3. Hapus data layanan dari database
            if (!$this->layananModel->delete($id)) {
                throw new \Exception("Gagal menghapus layanan dari database");
            }

            // 4. Arahkan kembali dengan pesan sukses
            return redirect()->to('/admin-lainnya/layanan')->with('success', 'Layanan berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error yang terjadi
            log_message('error', $e->getMessage()); // Log pesan error (opsional)
            return redirect()->to('/admin-lainnya/layanan')->with('error', 'Terjadi kesalahan saat menghapus layanan.');
        }
    }
}
