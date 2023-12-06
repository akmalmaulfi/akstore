<?php

namespace App\Controllers;

class RegistCustomer extends BaseController
{

    protected $costumerModel;

    public function __construct()
    {
        $this->costumerModel = new \App\Models\Customer_model();
    }

    public function index()
    {
        $isLoggedIn = session()->get('isLoggedIn');

        if ($isLoggedIn == 1) {
            return redirect()->to(base_url('/products'));
        }

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('auth/register_cust', $data);
    }

    public function signup()
    {
        // validasi inputan
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'email' => [
                'rules' => 'required|is_unique[customer.email]',
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
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'no hp harus diisi',
                ],
            ],
        ])) {

            $validation = \Config\Services::validation();
            session()->setFlashdata('validation', $validation);
            return redirect()->to(base_url('/regist-cust'))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->costumerModel->save([
            'nama' => $this->request->getVar('nama'),
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'role' => 'customer',
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesan', 'Berhasil membuat akun');
        return redirect()->to(base_url('/login-cust'));
    }
}
