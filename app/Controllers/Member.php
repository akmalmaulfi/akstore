<?php

namespace App\Controllers;

class Member extends BaseController
{
    protected $customerModel;
    protected $ownerModel;
    protected $adminModel;

    public function __construct()
    {
        $this->customerModel = new \App\Models\Customer_model();
        $this->ownerModel = new \App\Models\Owner_model();
        $this->adminModel = new \App\Models\Admin_model();
    }

    public function index()
    {

        $data = [
            'customer' => $this->customerModel->findAll(),
            'admin' => $this->adminModel->findAll(),
            'owner' => $this->ownerModel->findAll()
            // 'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('dashboard/member', $data);
    }

    public function signupCustPage()
    {
        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('customer/register_cust', $data);
    }

    public function signupAdmin()
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

    public function signupCust()
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
            return redirect()->to(base_url('/regist-custAdmin'))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->customerModel->save([
            'nama' => $this->request->getVar('nama'),
            'telp' => $this->request->getVar('telp'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'role' => 'customer',
            'alamat' => $this->request->getVar('alamat')
        ]);

        session()->setFlashdata('pesan', 'Berhasil membuat akun');
        return redirect()->to(base_url('/members'));
    }

    public function deleteCustAdmin()
    {
        $this->customerModel->delete($this->request->getVar('idCustomer'));
        session()->setFlashdata('pesan', 'Berhasil menghapus customer');
        return redirect()->to(base_url('/members'));
    }

    public function editCustPage($idCustomer)
    {

        $customer =  $this->customerModel->find($idCustomer);
        if ($customer) {
            $data = [
                'customer' => $customer,
                'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()

            ];
            $validation = \Config\Services::validation();
            session()->setFlashdata('validation', $validation);
            return view('dashboard/edit_cust', $data);
        }

        return redirect()->to(base_url('/members'));
    }

    public function updateCustAdmin()
    {
        $emailRules = '';
        $customer = $this->customerModel->find($this->request->getVar('idCustomer'));

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
            return redirect()->to(base_url('/editCustPage/' . $this->request->getVar('idCustomer')))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->customerModel->save([
            'id' => $this->request->getVar('idCustomer'),
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'telp' => htmlspecialchars($this->request->getVar('telp')),
            'email' => htmlspecialchars($this->request->getVar('email')),
            'password' => htmlspecialchars($password),
            'role' => 'customer',
            'alamat' => htmlspecialchars($this->request->getVar('alamat'))
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah akun');
        return redirect()->to(base_url('/members'));
    }

    public function deleteAdmin()
    {
        $this->adminModel->delete($this->request->getVar('idAdmin'));
        session()->setFlashdata('pesan', 'Berhasil menghapus admin');
        return redirect()->to(base_url('/members'));
    }

    public function editAdminPage($idAdmin)
    {

        $admin =  $this->adminModel->find($idAdmin);
        if ($admin) {
            $data = [
                'admin' => $admin,
                'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()

            ];
            $validation = \Config\Services::validation();
            session()->setFlashdata('validation', $validation);
            return view('dashboard/edit_admin', $data);
        }

        return redirect()->to(base_url('/members'));
    }

    public function updateAdmin()
    {

        $admin = $this->adminModel->find($this->request->getVar('idAdmin'));

        $emailRules = '';
        $usernameRules = '';

        if ($admin['email'] == $this->request->getVar('email')) {
            $emailRules = 'required';
        } else {
            $emailRules = 'required|is_unique[admin.email]';
        }

        if ($admin['username'] == $this->request->getVar('username')) {
            $usernameRules = 'required';
        } else {
            $usernameRules = 'required|is_unique[admin.username]';
        }

        // validasi inputan
        if (!$this->validate([
            'username' => [
                'rules' => $usernameRules,
                'errors' => [
                    'is_unique' => 'Username {value} sudah terdaftar, pilih username lain',
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
        ])) {

            $validation = \Config\Services::validation();
            session()->setFlashdata('validation', $validation);
            return redirect()->to(base_url('/editAdmin/' . $this->request->getVar('idAdmin')))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->adminModel->save([
            'id' => $this->request->getVar('idAdmin'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
            'role' => 'admin',
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah akun');
        return redirect()->to(base_url('/members'));
    }

    public function registOwnerPage()
    {

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('auth/register_owner', $data);
    }

    public function signupOwner()
    {
        // validasi inputan
        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[owner.username]',
                'errors' => [
                    'is_unique' => 'Username {value} sudah terdaftar, pilih username lain',
                    'required' => '{field} harus diisi',
                ],
            ],
            'email' => [
                'rules' => 'required|is_unique[owner.email]',
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
            return redirect()->to(base_url('/regist-owner'))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->ownerModel->save([
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
        ]);

        session()->setFlashdata('pesan', 'Berhasil membuat akun');
        return redirect()->to(base_url('/members'));
    }

    public function deleteOwner()
    {
        $this->ownerModel->delete($this->request->getVar('idOwner'));
        session()->setFlashdata('pesan', 'Berhasil menghapus owner');
        return redirect()->to(base_url('/members'));
    }

    public function editOwnerPage($idOwner)
    {
        $owner =  $this->ownerModel->find($idOwner);
        if ($owner) {
            $data = [
                'owner' => $owner,
                'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()

            ];
            $validation = \Config\Services::validation();
            session()->setFlashdata('validation', $validation);
            return view('dashboard/edit_owner', $data);
        }

        return redirect()->to(base_url('/members'));
    }

    public function updateOwner()
    {

        $owner = $this->ownerModel->find($this->request->getVar('idOwner'));

        $emailRules = '';
        $usernameRules = '';

        if ($owner['email'] == $this->request->getVar('email')) {
            $emailRules = 'required';
        } else {
            $emailRules = 'required|is_unique[owner.email]';
        }

        if ($owner['username'] == $this->request->getVar('username')) {
            $usernameRules = 'required';
        } else {
            $usernameRules = 'required|is_unique[owner.username]';
        }

        // validasi inputan
        if (!$this->validate([
            'username' => [
                'rules' => $usernameRules,
                'errors' => [
                    'is_unique' => 'Username {value} sudah terdaftar, pilih username lain',
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
        ])) {

            $validation = \Config\Services::validation();
            session()->setFlashdata('validation', $validation);
            return redirect()->to(base_url('/editOwner/' . $this->request->getVar('idOwner')))->withInput();
        }

        $password = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
        $this->ownerModel->save([
            'id' => $this->request->getVar('idOwner'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $password,
        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah akun');
        return redirect()->to(base_url('/members'));
    }
}
