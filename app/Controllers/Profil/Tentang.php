<?php

// Namespace dan Penggunaan:
// namespace App\Controllers\Profil;: Menentukan namespace dari controller ini, yang menunjukkan lokasinya dalam struktur proyek.
// use App\Controllers\BaseController;: Mengimpor kelas BaseController yang merupakan kelas dasar untuk semua controller di CodeIgniter.
// use App\Models\Profil\TentangModel;: Mengimpor model TentangModel yang akan digunakan untuk berinteraksi dengan database.

namespace App\Controllers\Profil;

use App\Controllers\BaseController;
use App\Models\Profil\TentangModel;

class Tentang extends BaseController
{

    // Properti $tentangModel:
    // Properti ini digunakan untuk menyimpan instance dari model TentangModel, yang akan digunakan di dalam fungsi-fungsi controller.
    protected $tentangModel;

    // Konstruktor __construct():
    // Konstruktor ini dipanggil saat controller dibuat. Di dalamnya, Anda membuat instance baru dari model TentangModel dan menyimpannya ke dalam properti $tentangModel.
    public function __construct()
    {
        $this->tentangModel = new TentangModel();
    }

    // Fungsi index():
    // Fungsi ini dipanggil saat Anda mengakses URL /adminTentang.
    // Fungsi ini mengambil data pertama dari tabel "tentang" menggunakan $this->tentangModel->first().
    // Jika tidak ada data yang ditemukan, fungsi ini membuat array $data['tentang'] dengan nilai default untuk mencegah error.
    // Fungsi ini kemudian menampilkan view pages/adminTentang/index dengan data $data.
    public function index()
    {
        $data['tentang'] = $this->tentangModel->first(); // Ambil data pertama

        if (!$data['tentang']) {
            // Jika tidak ada data, buat array kosong untuk mencegah error
            $data['tentang'] = ['teks' => '']; // Atau berikan nilai default lainnya
        }

        return view('pages/adminTentang/index', $data); // Sesuaikan path view
    }

    // Fungsi store():
    // Fungsi ini dipanggil saat Anda mengirimkan formulir "Tambah" di modal.
    // Fungsi ini menyimpan data baru ke tabel "tentang" menggunakan $this->tentangModel->save().
    // Kemudian, fungsi ini mengarahkan kembali ke URL /adminTentang dengan pesan sukses.
    public function store()
    {
        // Menyimpan data baru dari formulir "Tambah"
        $this->tentangModel->save([
            'teks' => $this->request->getVar('teks')
        ]);

        // Set pesan sukses dan redirect ke halaman adminTentang
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/adminTentang');
    }

    // Fungsi update():
    // Fungsi ini dipanggil saat Anda mengirimkan formulir "Ubah" di modal.
    // Fungsi ini melakukan validasi input menggunakan $this->validate().
    // Jika validasi berhasil, fungsi ini memperbarui data di tabel "tentang" dengan ID 1 menggunakan $this->tentangModel->update().
    // Kemudian, fungsi ini mengarahkan kembali ke URL /adminTentang dengan pesan sukses.
    // Jika validasi gagal, fungsi ini mengarahkan kembali ke URL /adminTentang dengan pesan error dan input yang telah diisi sebelumnya.
    public function update()
    {
        $id = 1;
        $validationRules = [
            'teks' => 'required'
        ];

        if ($this->validate($validationRules)) {
            $this->tentangModel->update($id, [
                'teks' => $this->request->getPost('teks')
            ]);

            session()->setFlashdata('success', 'Data berhasil diperbarui.');
            return redirect()->to('/adminTentang');
        } else {
            // Jika validasi gagal, tampilkan pesan error di modal
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('/adminTentang')->withInput();
        }
    }
}
