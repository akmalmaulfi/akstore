<?php


namespace App\Controllers;

class Beranda extends BaseController
{

    public function index()
    {
        $produkModel =   new \App\Models\Produk_model();
        $customerModel = new \App\Models\Customer_model();
        $pesananModel = new \App\Models\Pesanan_model();
        $pembayaranModel = new \App\Models\Pembayaran_model();

        $data = [
            'produk' =>  $produkModel->where('stok >', 0)->countAllResults(),
            'customer' => $customerModel->countAllResults(),
            'pesanan' => $pesananModel->countAllResults(),
            'pembayaran' => $pembayaranModel->countAllResults()
        ];

        return view('dashboard/index', $data);
    }
}
