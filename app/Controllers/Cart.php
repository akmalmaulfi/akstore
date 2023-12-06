<?php

namespace App\Controllers;

class Cart extends BaseController
{
    protected $pembayaranModel;
    protected $pesananModel;
    protected $pembayaranId;
    protected $produkModel;

    public function __construct()
    {
        $this->pembayaranModel = new \App\Models\Pembayaran_model();
        $this->pesananModel = new \App\Models\Pesanan_model();
        $this->produkModel = new \App\Models\Produk_model();
    }

    public function index()
    {
        $cart = session()->get('cart', []);

        // Hitung Total harga
        $totalHarga = 0;
        if ($cart) {
            foreach ($cart as $item) {
                $totalHarga += $item['harga'] * $item['qty'];
            }
        }

        $data = [
            'cart' => session()->get('cart') ?? [],
            'totalHarga' => $totalHarga,
            'customerData' => session()->get('customerData'),
        ];

        return view('customer/cart', $data);
    }

    public function clearCart()
    {
        session()->remove('cart');
        return redirect()->to(base_url('/cart'));
    }

    public function removeProductFromCart($id)
    {
        // ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // periksa apakah produk dengan ID tersebut ada di keranjang
        if (array_key_exists($id, $cart)) {
            // Hapus produk tersebut dari session cart
            unset($cart[$id]);

            // simpan kembali session cart nya
            session()->set('cart', $cart);

            session()->setFlashdata('pesan', 'Produk berhasil dihapus dari keranjang');
            return redirect()->to(base_url('/cart'));
        }

        session()->setFlashdata('pesan', 'Produk tidak ditemukan dalam keranjang.');
        return redirect()->to(base_url('/cart'));
    }

    public function checkout()
    {
        // Ambil inputan yang dikirm dari form cart
        $customerId = $this->request->getVar('customerId');
        $nama = $this->request->getVar('nama');
        $telp = $this->request->getVar('telp');
        $email = $this->request->getVar('email');
        $alamat = $this->request->getVar('alamat');
        $cart = session()->get('cart');

        // Simpan informasi pembayan ke tabel pembayaran
        $pembayaranData = [
            'id_customer' => $customerId,
            'bukti' => null,
            'status' => 'Menunggu Pembayaran'
        ];
        $idPembayaran = $this->pembayaranModel->insert($pembayaranData);

        // Simpan informasi pesanan ke tabel pesanan
        foreach ($cart as $item) {
            $pesananData = [
                'id_produk' => $item['id'],
                'id_pembayaran' => $idPembayaran,
                'jumlah' => $item['qty']
            ];
            $this->pesananModel->insert($pesananData);

            // Kurangi stok produk yang dibeli
            $produk = $this->produkModel->find($item['id']);
            $newStock = $produk['stok'] - $item['qty'];
            $this->produkModel->update($item['id'], ['stok' => $newStock]);
        }

        session()->remove('cart');
        session()->setFlashdata('pesan', 'Berhasil melakukan checkout');
        return redirect()->to(base_url('/invoice/' . $idPembayaran));
    }
}
