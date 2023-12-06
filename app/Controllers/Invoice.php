<?php

namespace App\Controllers;

use App\Helpers\Recommend;

class Invoice extends BaseController
{

    public function index($idPembayaran)
    {
        $pembayaranModel = new \App\Models\Pembayaran_model();
        $produkModel = new \App\Models\Produk_model();
        $pesananModel = new \App\Models\Pesanan_model();
        $customerModel = new \App\Models\Customer_model();

        // Ambil informasi pembayaran berdasarkan ID Pembayaran
        $pembayaran = $pembayaranModel->find($idPembayaran);
        $customer = session()->get('customerData');

        if ($pembayaran && $pembayaran['id_customer'] === $customer['id']) {
            // Ambil Informasi Customer berdasarkan id_customer dari tabel pembayaran
            $customer = $customerModel->find($pembayaran['id_customer']);

            // Ambil informasi pesanan berdasarkan ID Pembayaran
            $pesanan = $pesananModel->where('id_pembayaran', $idPembayaran)->findAll();

            // Siapkan array kosong untuk menyimpan informasi produk
            $produkInfo = [];

            // Loop melalui setiap pesanan untuk mendapatkan informasi produk
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
                    'id' => $produk['id'],
                    'produk' => $produk['produk'],
                    'size' => $produk['size'],
                    'harga' => $produk['harga'],
                    'jumlah' => $item['jumlah'],
                    'total_harga' => $totalHarga,
                ];
            }

            // Menampilkan ALgo ke view
            $recommend = session()->getFlashdata('recommend');
            $recommendedProducts = [];

            // d($recommend);

            if ($recommend) {
                foreach ($recommend as $r) {
                    // Lakukan pencarian detail produk dari database berdasarkan $idProduk
                    $productDetail = $produkModel->find($r['id']);
                    // Tambahkan detail produk ke dalam array untuk ditampilkan
                    $recommendedProducts[] = $productDetail;
                }
            }

            $data = [
                'pembayaran' => $pembayaran,
                'produkInfo' => $produkInfo,
                'customer' => $customer,
                'subTotal' => $subTotal,
                'ppn' => $subTotal * 0.1,
                'subTotalWithPPN' => $subTotal + ($subTotal * 0.1),
                'idProdukArray' => array_column($produkInfo, 'id'),
                'recommend' => $recommendedProducts
            ];

            return view('/customer/invoice', $data);
        } else {
            return redirect()->to(base_url('/products'));
        }
    }

    public function paymentProof()
    {
        $idPembayaran = $this->request->getVar('idPembayaran');

        $namaFoto = '';
        if ($_FILES['buktiPembayaran']['name'] === '') {
            $namaFoto = 'default.png';
        } else {
            // cek file
            $fileFoto  = $this->request->getFile('buktiPembayaran');
            $imageFileType = strtolower(pathinfo($fileFoto->getName(), PATHINFO_EXTENSION));
            $uploadOK = 1;

            // Ekstensi file yang boleh masuk
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != 'jpeg') {
                $uploadOK = 0;
                echo "<script>alert('File bukan format image'); window.location='/invoice/$idPembayaran';</script>";
                exit();
            }

            // Cek size file jika 0 maka pilih gambar lain &  batasi ukuran file
            if ($fileFoto->getSize() === 0) {
                echo "<script>alert('Foto tidak diterima, pilih gambar lain'); window.location='/invoice/$idPembayaran';</script>";
                exit();
            } else if ($fileFoto->getSize() > 2000000) {
                $uploadOK = 0;
                echo "<script>alert('Maksimal Ukuran file 2MB'); window.location='/invoice/$idPembayaran';</script>";
                exit();
            }

            // cek apakah image real atau fake
            $check = getimagesize($fileFoto->getTempName());
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }


            $namaFoto = $fileFoto->getRandomName(); // -> ini pake nama random pas di save img nys

            if ($uploadOK === 1) {
                $fileFoto->move('uploads/bukti_pembayaran', $namaFoto);
            }
        }

        $pembayaranModel = new \App\Models\Pembayaran_model();
        $data = [
            'status' => 'Menunggu Konfirmasi Admin',
            'bukti' => $namaFoto
        ];

        $pembayaranModel->update($idPembayaran, $data);
        return redirect()->to(base_url('/invoice/' . $idPembayaran));
    }

    public function cancelOrder()
    {

        $idPembayaran = $this->request->getVar('idPembayaran');
        $pembayaranModel = new \App\Models\Pembayaran_model();

        $data = [
            'status' => 'Dibatalkan Pembeli'
        ];

        $pembayaranModel->update($idPembayaran, $data);

        return redirect()->to(base_url('/invoice/' . $idPembayaran));
    }

    public function orderArrivedCust()
    {
        $pembayaranModel = new \App\Models\Pembayaran_model();
        $produkModel = new \App\Models\Produk_model();
        $rateModel = new \App\Models\Rate_model();
        $recommend = new Recommend;

        $pembayaran = $pembayaranModel->find($this->request->getVar('idPembayaran'));

        if ($pembayaran) {
            $pembayaranModel->save([
                'id' => $this->request->getVar('idPembayaran'),
                'status' => 'Pesanan telah diterima'
            ]);

            // ======== PROSES REKOMENDASI ============
            $rate = $rateModel->findAll();
            $matrix = [];
            foreach ($rate as $r) {
                $idCustomer = $r['id_customer'];
                $idProduk = $r['id_produk'];
                $rate = (float)$r['rate'];

                if (!isset($matrix[$idCustomer])) {
                    $matrix[$idCustomer] = [];
                }

                $matrix[$idCustomer][$idProduk] = $rate;
            }

            $cust = (int)session()->get('customerData')['id'];
            $recommendation = $recommend->getRecommendations($matrix, $cust);

            if (empty($recommendation)) {
                $randProduct = [];
                $products = $produkModel->findAll();
                $randKeys = array_rand($products, 2);
                foreach ($randKeys as $r) {
                    $randProduct[] = $products[$r];
                }

                $recommendation = $randProduct;
            }

            session()->setFlashdata('recommend', $recommendation);

            // ============= END RECOMMENDATION =============
            return redirect()->to(base_url('/invoice/' . $this->request->getVar('idPembayaran')));
        }
    }
}
