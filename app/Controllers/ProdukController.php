<?php

namespace App\Controllers;

use App\Helpers\Recommend;

class ProdukController extends BaseController
{

    protected $produkModel;
    // protected $cart;

    public function __construct()
    {
        $this->produkModel = new \App\Models\Produk_model();
        // $this->cart = \Config\Services::cart();
    }

    public function index()
    {
        $rateModel = new \App\Models\Rate_model();
        $recommend = new Recommend;
        $produkModel = new \App\Models\Produk_model();
        $kategoriModel = new \App\Models\Kategori_model();

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


        // ========= PROSES MENAMPILKAN REKOMENDASI DI HALAMAN PRODUK ========
        $cust = (int)session()->get('customerData')['id'];
        $cekExistRate = $rateModel->where('id_customer', $cust)->first();
        if ($cekExistRate) {
            $recommend = $recommend->getRecommendations($matrix, $cust);
            if ($recommend) {
                foreach ($recommend as $r) {
                    // Lakukan pencarian detail produk dari database berdasarkan $idProduk
                    $productDetail = $produkModel->find($r['id']);
                    // Tambahkan detail produk ke dalam array untuk ditampilkan
                    $recommendation[] = $productDetail;
                }
            } else if (empty($recommendation)) {
                $randProduct = [];
                $products = $produkModel->findAll();
                $randKeys = array_rand($products, 2);
                foreach ($randKeys as $r) {
                    $randProduct[] = $products[$r];
                }

                $recommendation = $randProduct;
            }

            session()->set('recommendProduk', $recommendation);
        }
        // ============= END RECOMMENDATION =============

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'produk' => $this->getProducts(),
            'cart' => session()->get('cart') ?? [],
            'customer' => session()->get('customerData'),
            'kategori' => $kategoriModel->findAll()
        ];

        return view('customer/index', $data);
    }

    public function getProducts()
    {
        return $this->produkModel->where('stok >', 0)->findAll();
    }

    public function detail($id)
    {
        $produk = $this->produkModel->find($id);


        $data = [
            'produk'  => $produk
        ];

        if ($produk || $produk !== null) {
            return view('customer/product_detail', $data);
        } else {
            return redirect()->to(base_url('/products'));
        }
    }

    public function addToCart($produkId)
    {
        $produk = $this->produkModel->find($produkId);

        if ($produk) {
            //  ambil keranjang
            $cart = session()->get('cart') ?? [];

            // tambahkan produk dalam session
            $cart[$produkId] = array(
                'id' => $produk['id'],
                'nama' => $produk['produk'],
                'qty' => isset($cart[$produkId]['qty']) ? $cart[$produkId]['qty'] + 1 : 1,
                'harga' => $produk['harga'],
                'size' => $produk['size']
            );

            // simpan ke dalam cart
            session()->set('cart', $cart);
            return redirect()->to(base_url('/products'))->with('pesan', 'Produk ditambahkan ke keranjang.');
        }
    }

    public function searchByKategori()
    {
        $rateModel = new \App\Models\Rate_model();
        $recommend = new Recommend;
        $produkModel = new \App\Models\Produk_model();
        $kategoriModel = new \App\Models\Kategori_model();

        // ============== PROSES REKOMENDASI ============
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
        $cekExistRate = $rateModel->where('id_customer', $cust)->first();
        if ($cekExistRate) {
            $recommend = $recommend->getRecommendations($matrix, $cust);
            if ($recommend) {
                foreach ($recommend as $r) {
                    // Lakukan pencarian detail produk dari database berdasarkan $idProduk
                    $productDetail = $produkModel->find($r['id']);
                    // Tambahkan detail produk ke dalam array untuk ditampilkan
                    $recommendation[] = $productDetail;
                }
            } else if (empty($recommendation)) {
                $randProduct = [];
                $products = $produkModel->findAll();
                $randKeys = array_rand($products, 2);
                foreach ($randKeys as $r) {
                    $randProduct[] = $products[$r];
                }

                $recommendation = $randProduct;
            }

            session()->set('recommendProduk', $recommendation);
        }
        // ============= END RECOMMENDATION =============

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'produk' => $this->produkModel->where('id_kategori', $this->request->getVar('kategori'))->findAll(),
            'cart' => session()->get('cart') ?? [],
            'customer' => session()->get('customerData'),
            'kategori' => $kategoriModel->findAll()
        ];

        return view('customer/index', $data);
    }
}
