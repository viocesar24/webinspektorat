<?php

namespace App\Controllers\Profil;

use App\Controllers\BaseController;
use App\Models\Profil\PejabatModel;

class Pejabat extends BaseController
{

    // Properti $pejabatModel:
    // Properti ini digunakan untuk menyimpan instance dari model PejabatModel, yang akan digunakan di dalam fungsi-fungsi controller.
    protected $pejabatModel;

    // Konstruktor __construct():
    // Konstruktor ini dipanggil saat controller dibuat. Di dalamnya, Anda membuat instance baru dari model PejabatModel dan menyimpannya ke dalam properti $pejabatModel.
    public function __construct()
    {
        $this->pejabatModel = new PejabatModel();
    }

    // Fungsi index():
    // Fungsi ini dipanggil saat Anda mengakses URL /profil/pejabat.
    // Fungsi ini mengambil semua data dari tabel "pejabat" menggunakan $this->pejabatModel->findAll().
    // Jika tidak ada data yang ditemukan, fungsi ini membuat array $data['pejabat'] dengan nilai default untuk mencegah error.
    // Fungsi ini kemudian menampilkan view pages/adminPejabat/index dengan data $data.
    public function index()
    {
        helper("cookie");
        if (get_cookie("username") == "admin") {
            $data['pejabat'] = $this->pejabatModel->findAll(); // Ambil semua data
            if (!$data['pejabat']) {
                // Jika tidak ada data, buat array kosong untuk mencegah error
                $data['pejabat'] = []; // Atau berikan nilai default lainnya
            }
            return view('pages/adminPejabat/index', $data); // Sesuaikan path view
        } else {
            return redirect()->to('/home/view/admin');
        }
    }

    // Fungsi create():
    // Fungsi ini dipanggil saat Anda mengirimkan formulir "Pejabat" di modal.
    // Fungsi ini menyimpan data baru ke tabel "pejabat" menggunakan $this->pejabatModel->save().
    // Kemudian, fungsi ini mengarahkan kembali ke URL /profil/pejabat dengan pesan sukses.
    public function create()
    {
        // Menyimpan data baru dari formulir "Pejabat" yang terdiri dari nip, nama, dan jabatan
        $this->pejabatModel->save([
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan')
        ]);

        // Set pesan sukses dan redirect ke halaman adminPejabat
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/profil/pejabat');
    }

    // Fungsi update():
    // Fungsi ini dipanggil saat Anda mengirimkan formulir "Ubah" di modal.
    // Fungsi ini melakukan validasi input.
    // Jika validasi gagal, fungsi ini mengarahkan kembali ke URL /profil/pejabat dengan pesan error dan input yang telah diisi sebelumnya.
    // Jika validasi sukses, fungsi ini memperbarui data di tabel "pejabat" dengan ID terpilih menggunakan $this->pejabatModel->update().
    // Kemudian, fungsi ini mengarahkan kembali ke URL /profil/pejabat dengan pesan sukses.
    public function update($id)
    {
        // Memperbarui data di tabel "pejabat" dengan ID sesuai dengan ID parameter
        $this->pejabatModel->update($id, [
            'nip' => $this->request->getVar('nip'),
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan')
        ]);

        // Set pesan sukses dan redirect ke halaman adminPejabat
        session()->setFlashdata('success', 'Data berhasil diperbarui.');
        return redirect()->to('/profil/pejabat');
    }

    // Fungsi delete():
    // Fungsi ini dipanggil saat Anda mengirimkan tombol "Hapus" di modal.
    // Fungsi ini memperbarui data di tabel "pejabat" dengan ID terpilih menggunakan $this->pejabatModel->delete().
    // Kemudian, fungsi ini mengarahkan kembali ke URL /profil/pejabat dengan pesan sukses.
    public function delete($id)
    {
        // Memperbarui data di tabel "pejabat" dengan ID terpilih
        $this->pejabatModel->delete($id);

        // Set pesan sukses dan redirect ke halaman adminPejabat
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/profil/pejabat');
    }
}
