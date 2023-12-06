<?php

namespace App\Controllers;

class Owner extends BaseController
{
    protected $produkModel;
    protected $ownerModel;

    public function __construct()
    {
        $this->ownerModel = new \App\Models\Owner_model();
        $this->produkModel = new \App\Models\Produk_model();
    }

    public function index()
    {
        $pembayaranModel = new \App\Models\Pembayaran_model();
        $produkModel = new \App\Models\Produk_model();
        $pesananModel = new \App\Models\Pesanan_model();
        $customerModel = new \App\Models\Customer_model();

        // dd($this->request->getVar());

        // Ambil informasi pembayaran berdasarkan ID Pembayaran
        $customer = session()->get('customerData');
        // $pembayarans = $pembayaranModel->findAll();

        // Ambil nilai bulan dan tahun dari inputan dalam format YYYY-MM
        $tanggalInput = $this->request->getPost('periode');

        // Misalnya, mencari data antara 2023-11-01 dan 2023-11-30 untuk bulan November 2023
        $periodeAwal = $tanggalInput . '-01'; // Tanggal awal bulan
        $periodeAkhir = $tanggalInput . '-31'; // Tanggal terakhir bulan, sesuaikan sesuai jumlah hari dalam bulan

        // Mengambil data pembayaran sesuai dengan rentang bulan yang dipilih
        $pembayarans = $pembayaranModel->where('created_at >=', $periodeAwal)
            ->where('created_at <=', $periodeAkhir)
            ->where('status', 'Pesanan telah diterima')
            ->findAll();

        $data = [];

        foreach ($pembayarans as $pembayaran) {
            // Ambil Informasi Customer berdasarkan id_customer dari tabel pembayaran
            $customerData = $customerModel->find($pembayaran['id_customer']);

            // Ambil informasi pesanan berdasarkan ID Pembayaran
            $pesanan = $pesananModel->where('id_pembayaran', $pembayaran['id'])->findAll();

            // Siapkan array kosong untuk menyimpan informasi produk
            $produkInfo = [];
            $subTotal = 0;

            foreach ($pesanan as $item) {
                // Ambil informasi produk berdasarkan id produk dari setiap pesanan
                $produk = $produkModel->withDeleted()->find($item['id_produk']);

                // Hitung harga total untuk setiap produk
                $totalHarga = $item['jumlah'] * $produk['harga'];

                // Tambahkan subtotal harga produk keseluruhan
                $subTotal += $totalHarga;

                // Simpan informasi produk yang dibeli beserta total harga kedalam array
                $produkInfo[] = [
                    'produk' => $produk['produk'],
                    'size' => $produk['size'],
                    'harga' => $produk['harga'],
                    'jumlah' => $item['jumlah'],
                    'total_harga' => $totalHarga,
                ];
            }

            $data[] = [
                'pembayaran' => $pembayaran,
                'produkInfo' => $produkInfo,
                'customer' => $customerData,
                'subTotal' => $subTotal,
                'ppn' => $subTotal * 0.1,
                'subTotalWithPPN' => $subTotal + ($subTotal * 0.1),
            ];
        }

        return view('/owner/index', ['data' => $data, 'tanggalReqLaporan' =>  $this->request->getVar('periode')]);
    }

    public function loginPageOwner()
    {
        $isLoggedInOwner  = session()->get('isLoggedInAOwner');

        if ($isLoggedInOwner == 1) {
            return redirect()->to(base_url('/owner-home'));
        }

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];

        return view('auth/login_owner', $data);
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
            return redirect()->to(base_url('/login-owner'))->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Lakukan pencarian data customer berdasarkan email
        $owner = $this->ownerModel->where('email', $email)->first();

        // periksa apakah user ditemukan dan password cocok
        if ($owner && password_verify($password, $owner['password'])) {
            // Set session
            $data = [
                'username' => $owner['username'],
                'email' => $owner['email'],
            ];
            session()->set('isLoggedInOwner', 1);
            session()->set('ownerData', $data);
            return redirect()->to(base_url('/owner-home'));
        } else {
            // jika autentikasi login gagal, maka kembali ke halaman login dengan pesan error
            return redirect()->to(base_url('/login-owner'))->withInput()->with('error', 'Email atau password salah');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('isLoggedInOwner');
        $session->remove('ownerData');
        return redirect()->to(base_url('/login-owner'));
    }

    public function home()
    {
        return view('owner/index');
    }


    public function produk()
    {
        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'produk' => $this->getProducts(),
            'cart' => session()->get('cart') ?? [],
            'customer' => session()->get('customerData')
        ];

        return view('owner/produk', $data);
    }

    public function getProducts()
    {
        return $this->produkModel->where('stok >', 0)->findAll();
    }
}
