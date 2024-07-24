<?php

namespace App\Controllers\Informasi;

use App\Controllers\BaseController;
use App\Models\Informasi\KegiatanModel;

class Kegiatan extends BaseController
{

    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $data = [
            'kegiatan' => $this->kegiatanModel->orderBy('id', 'DESC')->paginate(1, 'group1'),
            'pagerKegiatanAdmin' => $this->kegiatanModel->pager,
        ];
        return view('pages/adminKegiatan/index', $data);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'judul' => 'required',
                'badan' => 'required',
            ];

            // Tambahkan aturan validasi untuk gambar (opsional, sesuaikan kebutuhan)
            for ($i = 1; $i <= 15; $i++) {
                $rules['gambar_' . $i] = 'permit_empty|is_image[gambar_' . $i . ']';
            }

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $data = [
                'judul' => $this->request->getPost('judul'),
                'badan' => $this->request->getPost('badan'),
                'waktu' => date('Y-m-d H:i:s'), // Menggunakan waktu server
                'slug' => $this->kegiatanModel->generateSlug($this->request->getPost('judul'), date('Y-m-d H:i:s')),
            ];

            // Penanganan upload gambar
            for ($i = 1; $i <= 15; $i++) {
                $gambar = $this->request->getFile('gambar_' . $i);
                if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                    // File gambar valid dan belum dipindahkan, proses seperti biasa
                    $newName = $gambar->getRandomName();
                    $gambar->move(ROOTPATH . 'public/uploads/kegiatan', $newName);
                    $data['gambar_' . $i] = $newName;
                } else {
                    // Tidak ada file gambar yang diunggah, set nilai menjadi null atau string kosong
                    $data['gambar_' . $i] = null;
                }
            }

            $this->kegiatanModel->insert($data);
            return redirect()->to('/informasi/kegiatan')->with('success', 'Kegiatan berhasil ditambahkan.');
        }

        return redirect()->to('/informasi/kegiatan')->with('error', 'Kegiatan gagal ditambahkan.');
    }

    public function update($id)
    {
        // Pastikan $id valid (misalnya, periksa apakah kegiatan dengan ID tersebut ada)
        if (!$this->kegiatanModel->find($id)) {
            return redirect()->to('/informasi/kegiatan')->with('error', 'Kegiatan tidak ditemukan.');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'judul' => 'required',
                'badan' => 'required',
            ];

            // Tambahkan aturan validasi untuk gambar (opsional, sesuaikan kebutuhan)
            for ($i = 1; $i <= 15; $i++) {
                $rules['gambar_' . $i] = 'permit_empty|is_image[gambar_' . $i . ']';
            }

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $data = [
                'judul' => $this->request->getPost('judul'),
                'badan' => $this->request->getPost('badan'),
            ];

            // Hapus semua gambar lama sebelum memproses gambar baru
            $oldKegiatan = $this->kegiatanModel->find($id);
            for ($i = 1; $i <= 15; $i++) {
                $oldGambar = $oldKegiatan['gambar_' . $i];
                if ($oldGambar && file_exists(ROOTPATH . 'public/uploads/kegiatan/' . $oldGambar)) {
                    unlink(ROOTPATH . 'public/uploads/kegiatan/' . $oldGambar);
                }
                // Kosongkan field gambar di database
                $data['gambar_' . $i] = null;
            }

            // Penanganan upload gambar baru (sama seperti sebelumnya)
            for ($i = 1; $i <= 15; $i++) {
                $gambar = $this->request->getFile('gambar_' . $i);
                if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                    $newName = $gambar->getRandomName();
                    $gambar->move(ROOTPATH . 'public/uploads/kegiatan', $newName);
                    $data['gambar_' . $i] = $newName;
                }
            }

            $this->kegiatanModel->update($id, $data);
            return redirect()->to('/informasi/kegiatan')->with('success', 'Kegiatan berhasil diperbarui.');
        }

        return redirect()->to('/informasi/kegiatan')->with('error', 'Kegiatan gagal diperbarui.');
    }

    public function delete($id)
    {
        try {
            // 1. Ambil data kegiatan berdasarkan ID
            $kegiatan = $this->kegiatanModel->find($id);

            // 2. Jika kegiatan tidak ditemukan, arahkan kembali dengan pesan error
            if (!$kegiatan) {
                return redirect()->to('/informasi/kegiatan')->with('error', 'Kegiatan tidak ditemukan.');
            }

            // 3. Hapus gambar-gambar terkait kegiatan
            for ($i = 1; $i <= 15; $i++) {
                $gambar = $kegiatan['gambar_' . $i];
                if ($gambar) {
                    $gambarPath = ROOTPATH . 'public/uploads/kegiatan/' . $gambar;
                    if (file_exists($gambarPath)) {
                        if (!unlink($gambarPath)) {
                            throw new \Exception("Gagal menghapus gambar: $gambarPath");
                        }
                    }
                }
            }

            // 4. Hapus data kegiatan dari database
            if (!$this->kegiatanModel->delete($id)) {
                throw new \Exception("Gagal menghapus kegiatan dari database");
            }

            // 5. Arahkan kembali dengan pesan sukses
            return redirect()->to('/informasi/kegiatan')->with('success', 'Kegiatan berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error yang terjadi
            log_message('error', $e->getMessage()); // Log pesan error (opsional)
            return redirect()->to('/informasi/kegiatan')->with('error', 'Terjadi kesalahan saat menghapus kegiatan.');
        }
    }
}
