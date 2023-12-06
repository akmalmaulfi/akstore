<?php

namespace App\Controllers;

class LoginAdmin extends BaseController
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new \App\Models\Admin_model();
    }

    public function index()
    {
        $isLoggedInAdmin  = session()->get('isLoggedInAdmin');

        if ($isLoggedInAdmin == 1) {
            return redirect()->to(base_url('/beranda'));
        }

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('auth/login_admin', $data);
    }

    public function signin()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
        ])) {

            $validation = \Config\Services::validation();
            session()->setFlashdata('validation', $validation);
            return redirect()->to(base_url('/login-admin'))->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Lakukan pencarian data customer berdasarkan email
        $admin = $this->adminModel->where('email', $email)->first();

        // periksa apakah user ditemukan dan password cocok
        if ($admin && password_verify($password, $admin['password'])) {
            // Set session
            $data = [
                'username' => $admin['username'],
                'email' => $admin['email'],
                'role' => $admin['role']
            ];
            session()->set('isLoggedInAdmin', 1);
            session()->set('adminData', $data);
            return redirect()->to(base_url('/beranda'));
        } else {
            // jika autentikasi login gagal, maka kembali ke halaman login dengan pesan error
            return redirect()->to(base_url('/login-admin'))->withInput()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('isLoggedInAdmin');
        $session->remove('adminData');
        return redirect()->to(base_url('/login-admin'));
    }
}
