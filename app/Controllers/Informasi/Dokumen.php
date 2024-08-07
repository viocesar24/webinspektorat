<?php

namespace App\Controllers\Informasi;

use App\Controllers\BaseController;
use App\Models\Informasi\DokumenModel;
use App\Models\Informasi\DokumenKategoriModel;
use App\Models\KontakModel;

class Dokumen extends BaseController
{

    protected $dokumenModel;
    protected $dokumenKategoriModel;
    protected $kontakModel;

    public function __construct()
    {
        $this->dokumenModel = new DokumenModel();
        $this->dokumenKategoriModel = new DokumenKategoriModel();
        $this->kontakModel = new KontakModel();
    }

    public function index()
    {
        $data = [
            'dokumen' => $this->dokumenModel
                ->select('dokumen.id, dokumen.judul, dokumen.file, dokumenkategori.kategori')
                ->join('dokumenkategori', 'dokumen.kategori = dokumenkategori.id')
                ->findAll() ?: [],
            'dokumenkategori' => $this->dokumenKategoriModel->findAll() ?: []
        ];
        return view('pages/adminDokumen/index', $data);
    }

    public function view($page)
    {
        $data = [
            'dokumen' => $this->dokumenModel
                ->select('dokumen.id, dokumen.judul, dokumen.file, dokumenkategori.kategori')
                ->join('dokumenkategori', 'dokumen.kategori = dokumenkategori.id')
                ->findAll(),
            'dokumenkategori' => $this->dokumenKategoriModel->findAll(),
            'kontak' => $this->kontakModel->first(),
        ];

        echo view('templates/header', $data);
        echo view('pages/' . $page, $data);
        echo view('templates/footer', $data);
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
                    $uploadPath = FCPATH . 'uploads/dokumen';

                    // Pastikan nama file yang dihasilkan benar-benar unik
                    while (file_exists($uploadPath . '/' . $newName)) {
                        $newName = $file->getRandomName();
                    }

                    $file->move($uploadPath, $newName);  // Save file to 'public/uploads/dokumen'
                    $filePath = 'uploads/dokumen/' . $newName;  // Save the relative path to the database

                    $data = [
                        'judul' => $this->request->getPost('judul'),
                        'kategori' => $this->request->getPost('kategori'),
                        'file' => $filePath
                    ];

                    $this->dokumenModel->save($data);
                    return redirect()->to('/admin-informasi/dokumen')->with('success', 'Dokumen berhasil ditambahkan');
                } else {
                    return redirect()->back()->withInput()->with('error', 'Error during file upload' . implode('<br>', $this->validator->getErrors()));
                }
            } else {
                return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
            }
        }

        return view('pages/adminDokumen/index');
    }

    public function update($id)
    {
        $dokumen = $this->dokumenModel->find($id);

        if (!$dokumen) {
            return redirect()->to('/admin-informasi/dokumen')->with('error', 'Dokumen tidak ditemukan' . implode('<br>', $this->validator->getErrors()));
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'judul'    => 'required|max_length[255]',
                'kategori' => 'required|integer'
            ];

            // Jika ada file baru yang diupload, tambahkan aturan validasi untuk file
            $file = $this->request->getFile('file');
            if ($file && $file->isValid()) {
                $rules['file'] = 'uploaded[file]|max_size[file,10240]|ext_in[file,pdf,doc,docx]';
            }

            if ($this->validate($rules)) {
                $data = [
                    'id' => $id,
                    'judul' => $this->request->getPost('judul'),
                    'kategori' => $this->request->getPost('kategori')
                ];

                // Jika ada file baru yang diupload
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $uploadPath = FCPATH . 'uploads/dokumen';

                    // Pastikan nama file yang dihasilkan benar-benar unik
                    while (file_exists($uploadPath . '/' . $newName)) {
                        $newName = $file->getRandomName();
                    }

                    $file->move($uploadPath, $newName);
                    $filePath = 'uploads/dokumen/' . $newName;

                    // Hapus file lama jika ada
                    if ($dokumen['file'] && file_exists(FCPATH . $dokumen['file'])) {
                        unlink(FCPATH . $dokumen['file']);
                    }

                    // Tambahkan path file baru ke data yang akan diupdate
                    $data['file'] = $filePath;
                }

                $this->dokumenModel->save($data);
                return redirect()->to('/admin-informasi/dokumen')->with('success', 'Dokumen berhasil diperbarui');
            } else {
                return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
            }
        }

        return view('pages/adminDokumen/view');
    }

    public function delete($id)
    {
        $dokumen = $this->dokumenModel->find($id);

        if (!$dokumen) {
            return redirect()->to('/admin-informasi/dokumen')->with('error', 'Dokumen tidak ditemukan' . implode('<br>', $this->validator->getErrors()));
        }

        // Hapus file terkait jika ada
        if ($dokumen['file'] && file_exists(FCPATH . $dokumen['file'])) {
            unlink(FCPATH . $dokumen['file']);
        }

        // Hapus data dokumen dari database
        $this->dokumenModel->delete($id);
        return redirect()->to('/admin-informasi/dokumen')->with('success', 'Dokumen berhasil dihapus');
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
            return redirect()->to('/admin-informasi/dokumen')->with('success', 'Kategori berhasil ditambahkan.');
        } else {
            $errors = $this->validator->getErrors();
            $stringError = '';
            foreach ($errors as $error) {
                $stringError .= $error . ', ';
            }
            $stringError = substr($stringError, 0, -2);
            return redirect()->to('/admin-informasi/dokumen')->with('error', 'Kategori gagal ditambahkan. ' . $stringError);
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
                return redirect()->to('/admin-informasi/dokumen')->with('success', 'Data kategori berhasil diupdate.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data.' . implode('<br>', $this->validator->getErrors()));
            }
        } else {
            // Ambil data lama untuk ditampilkan di form
            $data['item'] = $this->dokumenKategoriModel->find($id);
            if (!$data['item']) {
                session()->setFlashdata('error', 'Data kategori tidak ditemukan');
            }
            return redirect()->to('/admin-informasi/dokumen');
        }
    }

    public function deleteKategori($id)
    {
        $this->dokumenKategoriModel->delete($id);
        return redirect()->to('/admin-informasi/dokumen')->with('success', 'Kategori berhasil dihapus.');
    }
}
