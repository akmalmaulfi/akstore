<?php

namespace App\Controllers;

class Profile extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new \App\Models\Customer_model();
    }

    public function index($id)
    {
        $customer = $this->customerModel->find($id);
        $customerLogin = session()->get('customerData');

        if ($customer && $customer['id'] === $customerLogin['id']) {
            $data = [
                'customer' => $customer,
                'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
            ];

            return view('customer/profile', $data);
        } else {
            return redirect()->to(base_url('/products'));
        }
    }

    public function updateCustomer()
    {
        // cek jika user tidak merubah email
        $customer = $this->customerModel->find($this->request->getVar('idCustomer'));

        $emailRules = '';

        if ($customer['email'] == $this->request->getVar('email')) {
            $emailRules = 'required';
        } else {
            $emailRules = 'required|is_unique[customer.email]';
        }

        // validasi inputan
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ],
            ],
            'email' => [
                'rules' => $emailRules,
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
            return redirect()->to(base_url('/profile/' . $this->request->getVar('idCustomer')))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->customerModel->save([
            'id' => $this->request->getVar('idCustomer'),
            'nama' => $this->request->getVar('nama'),
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'role' => 'customer',
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengedit akun');
        return redirect()->to(base_url('/profile/' . $this->request->getVar('idCustomer')));
    }
}
