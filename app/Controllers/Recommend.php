<?php

namespace App\Controllers;

use App\Helpers\Recommend as HelpersRecommend;

class Recommend extends BaseController
{
    public function index()
    {
        $rateModel = new \App\Models\Rate_model();
        $produkModel = new \App\Models\Produk_model();
        $recommend = new HelpersRecommend;

        // Contoh struktur data yang akan dibuat.
        // $preferences = [
        //     'user1' => ['item1' => 4, 'item2' => 5, 'item3' => 3],
        //     'user2' => ['item1' => 5, 'item2' => 3, 'item3' => 2],
        //     'user3' => ['item1' => 2, 'item2' => 4, 'item3' => 5]
        // ];

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

        // $cust = (int)session()->get('customerData')['id'];
        $cust = session()->get('customerData')['id'];
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
        dd($recommendation);
    }
}
