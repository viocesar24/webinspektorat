<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class AdminAuth extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function register()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]|is_unique[admins.username]',
            'password' => 'required|min_length[8]',
            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $this->adminModel->save($data);

        return redirect()->to('/admin/login')->with('success', 'Registrasi berhasil!');
    }

    public function login()
    {
        return view('pages/admin/login');
    }

    public function auth()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->adminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            // Login sukses, atur session, dll.
            session()->set('admin_logged_in', true); // Set session
            return redirect()->to('/admin-informasi/berita');
        } else {
            // Login gagal
            return redirect()->back()->withInput()->with('error', 'Login gagal');
        }
    }

    public function logout()
    {
        session()->remove('admin_logged_in');
        return redirect()->to('/admin/login');
    }
}
