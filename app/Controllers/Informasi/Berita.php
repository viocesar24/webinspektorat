<?php

// Menentukan namespace controller untuk pengorganisasian kode
namespace App\Controllers\Informasi;

// Menggunakan BaseController sebagai dasar
use App\Controllers\BaseController;
// Menggunakan model BeritaModel untuk berinteraksi dengan database
use App\Models\Informasi\BeritaModel;

class Berita extends BaseController
{

    // Properti untuk menyimpan instance BeritaModel
    protected $beritaModel;
    protected $newsModel;

    // Constructor untuk inisialisasi BeritaModel
    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
    }

    // Menampilkan daftar berita di halaman admin
    public function index()
    {
        // Mengambil data berita dengan paginasi
        // Menyimpan informasi paginasi
        $data = [
            'berita' => $this->beritaModel->orderBy('id', 'DESC')->paginate(1, 'group1'),
            'pagerBeritaAdmin' => $this->beritaModel->pager,
        ];
        // Menampilkan view dengan data berita
        return view('pages/adminBerita/index', $data);
    }

    public function view($page, $slug = false)
    {
        $request = \Config\Services::request();
        $kunci = $request->getVar('cari');

        if ($kunci) {
            $kunciBool = true;
        } else {
            $kunciBool = false;
        }

        if ($slug != '') {
            $slugBool = true;
        } else {
            $slugBool = false;
        }

        $data = [
            'kunci' => $kunciBool,
            'slug' => $slugBool,
            'berita' => $this->beritaModel->getNews(),
            'beritaDetail' => $this->beritaModel->getNews($slug),
            'cariBerita' => $this->beritaModel->cariBerita($kunci),
            'cariBerita' => $this->beritaModel->orderBy('waktu', 'DESC')->paginate(100, 'group1'),
            'beritaHalaman' => $this->beritaModel->orderBy('waktu', 'DESC')->paginate(5, 'group1'),
            'pager' => $this->beritaModel->pager,
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
    }

    // Menangani pembuatan berita baru
    public function create()
    {
        // Memeriksa apakah request method adalah POST
        if ($this->request->getMethod() === 'post') {
            // Aturan validasi untuk input
            $rules = [
                'judul' => 'required',
                'badan' => 'required',
            ];

            // Tambahkan aturan validasi untuk gambar (opsional, sesuaikan kebutuhan)
            for ($i = 1; $i <= 15; $i++) {
                $rules['gambar_' . $i] = 'permit_empty|is_image[gambar_' . $i . ']';
            }

            // Validasi input
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            // Data berita yang akan disimpan
            $data = [
                'judul' => $this->request->getPost('judul'),
                'badan' => $this->request->getPost('badan'),
                'waktu' => date('Y-m-d H:i:s'),
                'slug' => $this->beritaModel->generateSlug($this->request->getPost('judul'), date('Y-m-d H:i:s')),
            ];

            // Penanganan upload gambar
            for ($i = 1; $i <= 15; $i++) {
                $gambar = $this->request->getFile('gambar_' . $i);
                if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                    // File gambar valid dan belum dipindahkan, proses seperti biasa
                    $newName = $gambar->getRandomName();
                    $uploadPath = ROOTPATH . 'public/uploads/berita';

                    // Pastikan nama file yang dihasilkan benar-benar unik
                    while (file_exists($uploadPath . '/' . $newName)) {
                        $newName = $gambar->getRandomName();
                    }

                    $gambar->move($uploadPath, $newName);
                    $data['gambar_' . $i] = $newName;
                } else {
                    // Tidak ada file gambar yang diunggah, set nilai menjadi null atau string kosong
                    $data['gambar_' . $i] = null; // Atau '' (string kosong)
                }
            }

            // Menyimpan data berita ke database
            $this->beritaModel->insert($data);
            return redirect()->to('/admin-informasi/berita')->with('success', 'Berita berhasil ditambahkan.');
        }

        return redirect()->to('/admin-informasi/berita')->with('error', 'Berita gagal ditambahkan.');
    }

    public function update($id)
    {
        // Pastikan $id valid (misalnya, periksa apakah berita dengan ID tersebut ada)
        if (!$this->beritaModel->find($id)) {
            return redirect()->to('/admin-informasi/berita')->with('error', 'Berita tidak ditemukan.');
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
            $oldBerita = $this->beritaModel->find($id);
            for ($i = 1; $i <= 15; $i++) {
                $oldGambar = $oldBerita['gambar_' . $i];
                if ($oldGambar && file_exists(ROOTPATH . 'public/uploads/berita/' . $oldGambar)) {
                    unlink(ROOTPATH . 'public/uploads/berita/' . $oldGambar);
                }
                // Kosongkan field gambar di database
                $data['gambar_' . $i] = null;
            }

            // Penanganan upload gambar
            for ($i = 1; $i <= 15; $i++) {
                $gambar = $this->request->getFile('gambar_' . $i);
                if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
                    // File gambar valid dan belum dipindahkan, proses seperti biasa
                    $newName = $gambar->getRandomName();
                    $uploadPath = ROOTPATH . 'public/uploads/berita';

                    // Pastikan nama file yang dihasilkan benar-benar unik
                    while (file_exists($uploadPath . '/' . $newName)) {
                        $newName = $gambar->getRandomName();
                    }

                    $gambar->move($uploadPath, $newName);
                    $data['gambar_' . $i] = $newName;
                } else {
                    // Tidak ada file gambar yang diunggah, set nilai menjadi null atau string kosong
                    $data['gambar_' . $i] = null; // Atau '' (string kosong)
                }
            }

            $this->beritaModel->update($id, $data);
            return redirect()->to('/admin-informasi/berita')->with('success', 'Berita berhasil diperbarui.');
        }

        return redirect()->to('/admin-informasi/berita')->with('error', 'Berita gagal diperbarui.');
    }

    public function delete($id)
    {
        try {
            // 1. Ambil data berita berdasarkan ID
            $berita = $this->beritaModel->find($id);

            // 2. Jika berita tidak ditemukan, arahkan kembali dengan pesan error
            if (!$berita) {
                return redirect()->to('/admin-informasi/berita')->with('error', 'Berita tidak ditemukan.');
            }

            // 3. Hapus gambar-gambar terkait berita
            for ($i = 1; $i <= 15; $i++) {
                $gambar = $berita['gambar_' . $i];
                if ($gambar) {
                    $gambarPath = ROOTPATH . 'public/uploads/berita/' . $gambar;
                    if (file_exists($gambarPath)) {
                        if (!unlink($gambarPath)) {
                            throw new \Exception("Gagal menghapus gambar: $gambarPath");
                        }
                    }
                }
            }

            // 4. Hapus data berita dari database
            if (!$this->beritaModel->delete($id)) {
                throw new \Exception("Gagal menghapus berita dari database");
            }

            // 5. Arahkan kembali dengan pesan sukses
            return redirect()->to('/admin-informasi/berita')->with('success', 'Berita berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error yang terjadi
            log_message('error', $e->getMessage()); // Log pesan error (opsional)
            return redirect()->to('/admin-informasi/berita')->with('error', 'Terjadi kesalahan saat menghapus berita.');
        }
    }
}
