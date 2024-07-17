<?php

namespace App\Controllers\Informasi;

use App\Controllers\BaseController;
use App\Models\Informasi\DokumenModel;
use App\Models\Informasi\DokumenKategoriModel;

class Dokumen extends BaseController
{

    protected $dokumenModel;
    protected $dokumenKategoriModel;

    public function __construct()
    {
        $this->dokumenModel = new DokumenModel();
        $this->dokumenKategoriModel = new DokumenKategoriModel();
    }

    public function index()
    {
        helper("cookie");
        if (get_cookie("username") == "admin") {
            $data = [
                'dokumen' => $this->dokumenModel
                    ->select('dokumen.id, dokumen.judul, dokumen.file, dokumenkategori.kategori')
                    ->join('dokumenkategori', 'dokumen.kategori = dokumenkategori.id')
                    ->findAll() ?: [],
                'dokumenkategori' => $this->dokumenKategoriModel->findAll() ?: []
            ];
            return view('pages/adminDokumen/index', $data);
        } else {
            return redirect()->to('/home/view/admin');
        }
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $rules = [
                'judul'    => 'required|max_length[255]',
                'kategori' => 'required|integer',
                'file'     => 'uploaded[file]|max_size[file,10240]|ext_in[file,pdf,doc,docx]'
            ];

            if ($this->validate($rules)) {
                $file = $this->request->getFile('file');

                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/dokumen', $newName);  // Save file to 'public/uploads/dokumen'
                    $filePath = 'uploads/dokumen/' . $newName;  // Save the relative path to the database

                    $data = [
                        'judul' => $this->request->getPost('judul'),
                        'kategori' => $this->request->getPost('kategori'),
                        'file' => $filePath
                    ];

                    $this->dokumenModel->save($data);
                    return redirect()->to('/informasi/dokumen')->with('success', 'Dokumen berhasil ditambahkan');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Error during file upload');
                }
            } else {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
        }

        return view('pages/adminDokumen/index');
    }

    public function update($id)
    {
        $dokumen = $this->dokumenModel->find($id);

        if (!$dokumen) {
            return redirect()->to('/informasi/dokumen')->with('error', 'Dokumen tidak ditemukan');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'judul'    => 'required|max_length[255]',
                'kategori' => 'required|integer'
            ];

            // Jika ada file baru yang diupload, tambahkan aturan validasi untuk file
            if ($this->request->getFile('file')->isValid()) {
                $rules['file'] = 'uploaded[file]|max_size[file,10240]|ext_in[file,pdf,doc,docx]';
            }

            if ($this->validate($rules)) {
                $data = [
                    'id' => $id,
                    'judul' => $this->request->getPost('judul'),
                    'kategori' => $this->request->getPost('kategori')
                ];

                // Jika ada file baru yang diupload
                if ($this->request->getFile('file')->isValid() && !$this->request->getFile('file')->hasMoved()) {
                    $file = $this->request->getFile('file');
                    $newName = $file->getRandomName();
                    $file->move(FCPATH . 'uploads/dokumen', $newName);
                    $filePath = 'uploads/dokumen/' . $newName;

                    // Hapus file lama jika ada
                    if ($dokumen['file'] && file_exists(FCPATH . $dokumen['file'])) {
                        unlink(FCPATH . $dokumen['file']);
                    }

                    // Tambahkan path file baru ke data yang akan diupdate
                    $data['file'] = $filePath;
                }

                $this->dokumenModel->save($data);
                return redirect()->to('/informasi/dokumen')->with('success', 'Dokumen berhasil diperbarui');
            } else {
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }
        }

        return view('pages/adminDokumen/view');
    }

    public function delete($id)
    {
        $dokumen = $this->dokumenModel->find($id);

        if (!$dokumen) {
            return redirect()->to('/informasi/dokumen')->with('error', 'Dokumen tidak ditemukan');
        }

        // Hapus file terkait jika ada
        if ($dokumen['file'] && file_exists(FCPATH . $dokumen['file'])) {
            unlink(FCPATH . $dokumen['file']);
        }

        // Hapus data dokumen dari database
        $this->dokumenModel->delete($id);
        return redirect()->to('/informasi/dokumen')->with('success', 'Dokumen berhasil dihapus');
    }

    public function getDokumen($id)
    {
        $dokumen = $this->dokumenModel->find($id);
        return $this->response->download('public/uploads/dokumen/' . $dokumen['file'], null);
    }

    public function createKategori()
    {
        $rules = [
            'kategori' => 'required|is_unique[dokumenkategori.kategori]',
        ];

        if ($this->validate($rules)) {
            $this->dokumenKategoriModel->insert([
                'kategori' => $this->request->getVar('kategori'),
            ]);
            session()->setFlashdata('success', 'Kategori berhasil ditambahkan.');
            return redirect()->to('/informasi/dokumen');
        } else {
            $errors = $this->validator->getErrors();
            $stringError = '';
            foreach ($errors as $error) {
                $stringError .= $error . ', ';
            }
            $stringError = substr($stringError, 0, -2);
            session()->setFlashdata('error', 'Kategori gagal ditambahkan. ' . $stringError);
            return redirect()->to('/informasi/dokumen');
        }
    }

    public function updateKategori($id)
    {
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kategori' => 'required|max_length[255]'
        ]);

        if ($this->request->getMethod() === 'post' && $this->validate([
            'kategori' => 'required|max_length[255]',
        ])) {
            // Ambil data dari request
            $data = [
                'kategori' => $this->request->getPost('kategori'),
            ];

            // Update data
            if ($this->dokumenKategoriModel->update($id, $data)) {
                return redirect()->to('/informasi/dokumen')->with('success', 'Data kategori berhasil diupdate.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data.');
            }
        } else {
            // Ambil data lama untuk ditampilkan di form
            $data['item'] = $this->dokumenKategoriModel->find($id);
            if (!$data['item']) {
                session()->setFlashdata('Data kategori tidak ditemukan');
            }
            return redirect()->to('/informasi/dokumen');
        }
    }

    public function deleteKategori($id)
    {
        $this->dokumenKategoriModel->delete($id);
        session()->setFlashdata('success', 'Kategori berhasil dihapus.');
        return redirect()->to('/informasi/dokumen');
    }
}
