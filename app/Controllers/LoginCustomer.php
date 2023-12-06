<?php

namespace App\Controllers;

class LoginCustomer extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new \App\Models\Customer_model;
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

        return view('auth/login_cust', $data);
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
            return redirect()->to(base_url('/login-cust'))->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Lakukan pencarian data customer berdasarkan email
        $customer = $this->customerModel->where('email', $email)->first();

        // periksa apakah user ditemukan dan password cocok
        if ($customer && password_verify($password, $customer['password'])) {
            // Set session
            $data = [
                'id' => $customer['id'],
                'nama' => $customer['nama'],
                'email' => $customer['email'],
                'alamat' => $customer['alamat'],
                'telp' => $customer['telp'],
                'role' => $customer['role']
            ];
            session()->set('isLoggedIn', 1);
            session()->set('customerData', $data);
            return redirect()->to(base_url('/products'));
        } else {
            // jika autentikasi login gagal, maka kembali ke halaman login dengan pesan error
            return redirect()->to(base_url('/login-cust'))->withInput()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('isLoggedIn');
        $session->remove('customerData');
        return redirect()->to(base_url('/login-cust'));
    }
}
