<?php

namespace App\Controllers;

class Transaksi extends BaseController
{

    public function index()
    {
        $pembayaranModel = new \App\Models\Pembayaran_model();
        $produkModel = new \App\Models\Produk_model();
        $pesananModel = new \App\Models\Pesanan_model();
        $customerModel = new \App\Models\Customer_model();

        // Ambil informasi pembayaran berdasarkan ID Pembayaran
        $customer = session()->get('customerData');
        $pembayarans = $pembayaranModel->findAll();

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
                'subTotalWithPPN' => $subTotal + ($subTotal * 0.1)
            ];
        }

        $pesananTerkirim  = $pembayaranModel->where('status', 'Pesanan telah diterima')->findAll();

        return view('dashboard/transaction_handler', ['data' => $data, 'pesananTerkirim' => $pesananTerkirim]);
    }

    public function orderShipped()
    {
        $pembayaranModel = new \App\Models\Pembayaran_model();
        $pembayaran = $pembayaranModel->find($this->request->getVar('idPembayaran'));

        if ($pembayaran) {
            $pembayaranModel->save([
                'id' => $this->request->getVar('idPembayaran'),
                'status' => 'Pesanan sudah dikirim'
            ]);

            return redirect()->to(base_url('/transaction-handler'));
        }
    }

    public function orderArrived()
    {
        $pembayaranModel = new \App\Models\Pembayaran_model();
        $pembayaran = $pembayaranModel->find($this->request->getVar('idPembayaran'));

        if ($pembayaran) {
            $pembayaranModel->save([
                'id' => $this->request->getVar('idPembayaran'),
                'status' => 'Pesanan telah diterima'
            ]);

            return redirect()->to(base_url('/transaction-handler'));
        }
    }
}
