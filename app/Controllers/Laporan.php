<?php

namespace App\Controllers;

class Laporan extends BaseController
{
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


        return view('/dashboard/report_handler', ['data' => $data, 'tanggalReqLaporan' =>  $this->request->getVar('periode')]);
    }
}
