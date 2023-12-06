<?php

namespace App\Controllers;

class Rate extends BaseController
{
    protected $rateModel;

    public function __construct()
    {
        $this->rateModel = new \App\Models\Rate_model();
    }

    public function save()
    {
        $request = $this->request->getJSON();

        // Tangkap data rating dari JSON
        $rating = $request->rating;
        $idProdukString = $request->idProduk;
        $idCustomer = $request->idCustomer;

        // Pecah string ID produk menjadi array
        $idProdukArray = explode(',', $idProdukString);

        // Simpan data rating ke dalam database untuk setiap ID produk
        foreach ($idProdukArray as $idProduk) {
            $this->rateModel->insert([
                'id_produk' => htmlspecialchars($idProduk),
                'id_customer' => htmlspecialchars($idCustomer),
                'rate' => htmlspecialchars($rating)
            ]);
        }
    }
}
