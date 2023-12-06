<?php

namespace App\Controllers;

class RegistAdmin  extends BaseController
{

    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new \App\Models\Admin_model();
    }

    public function index()
    {
        // $isLoggedInAdmin = session()->get('isLoggedInAdmin');

        // if ($isLoggedInAdmin == 1) {
        //     return redirect()->to(base_url('/'));
        // }

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('auth/register_admin', $data);
    }

    public function signup()
    {
        // validasi inputan
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[admin.username]',
                'errors' => [
                    'is_unique' => 'Username {value} sudah terdaftar, pilih username lain',
                    'required' => '{field} harus diisi',
                ],
            ],
            'email' => [
                'rules' => 'required|is_unique[admin.email]',
                'errors' => [
                    'required' => 'Email harus diisi',
                    'is_unique' => 'Email ({value}) sudah terdaftar, pilih email lain'
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
            return redirect()->to(base_url('/regist-admin'))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->adminModel->save([
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'role' => 'admin',
        ]);

        session()->setFlashdata('pesan', 'Berhasil membuat akun');
        return redirect()->to(base_url('/members'));
    }
}
