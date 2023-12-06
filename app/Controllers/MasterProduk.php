<?php

namespace App\Controllers;

use Config\Services;

class MasterProduk extends BaseController
{
    protected $kategoriModel;
    protected $produkModel;
    protected $ukuranModel;
    protected $db;
    protected $cart;

    public function __construct()
    {
        $this->kategoriModel = new \App\Models\Kategori_model();
        $this->produkModel = new \App\Models\Produk_model();
        $this->ukuranModel = new \App\Models\Ukuran_model();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // $isLoggedInAdmin = session()->get('isLoggedInAdmin');
        // if ($isLoggedInAdmin == 1) {
        //     return redirect()->to(base_url('/'));
        // }

        $data = [
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation(),
            'kategori' => $this->getKategori(),
            'getProdukWithKategori' => $this->produkModel->getProdukWithKategori()
        ];

        return view('dashboard/item_handler', $data);
    }

    public function getKategori()
    {
        return $kategori = $this->kategoriModel->findAll();
    }


    public function createKategori()
    {
        $nama = $this->request->getVar('nama');
        $checkKategoryIsExist = $this->kategoriModel->where('nama', $nama)->first();

        if ($checkKategoryIsExist || $checkKategoryIsExist != null) {

            echo "<script>
                        alert('Kategori sudah ada'); 
                        window.location.href = '" . base_url('/item-handler') . "';
                  </script>";
            return;
        }

        $this->kategoriModel->save([
            'nama' => $nama
        ]);

        session()->setFlashdata('pesan', "Kategori {$nama} telah ditambahkan.");
        return redirect()->to(base_url('/item-handler'));
    }

    public function deleteKategori($id)
    {
        $kategoriId = $this->kategoriModel->find($id);

        if (!$kategoriId || $kategoriId === null) {
            return redirect()->to(base_url('/item-handler'));
        }

        $this->kategoriModel->delete($kategoriId);
        session()->setFlashdata('pesan', 'Berhasil menghapus kategori');
        return redirect()->to(base_url('/item-handler'));
    }

    public function updateKategori()
    {
        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');

        $cekNama = $this->kategoriModel->where('nama', $nama)->first();

        if ($cekNama || $cekNama !== null) {
            echo "<script>
            alert('Kategori sudah ada'); 
            window.location.href = '" . base_url('/item-handler') . "';
             </script>";
            return;
        }

        $this->kategoriModel->save([
            'id' => htmlspecialchars($id),
            'nama' => htmlspecialchars($nama)
        ]);
        session()->setFlashdata('pesan', 'Berhasil mengubah kategori');
        return redirect()->to(base_url('/item-handler'));
    }

    public function getKategoriJSON()
    {
        $id = $this->request->getVar('id');
        $kategori = $this->kategoriModel->find($id);

        // jika kategori ditemukan, kirimkan sebagai json
        if ($kategori) {
            return $this->response->setJSON($kategori);
        } else {
            // jika kategori tidak ditemukan, kirim respons kosong atau pesan error
            return $this->response->setJSON(['error' => 'kategori tidak ditemukan']);
        }
    }

    // Create Produk Lama
    public function createProduk()
    {
        $size = $this->request->getVar('size');
        $validSizes = ['S', 'M', 'L', 'XL', 'XXL'];

        if (!in_array($size, $validSizes)) {
            // Tampilkan pesan atau lakukan tindakan sesuai kebutuhan
            echo "<script>alert('Ukuran tidak valid!'); window.location='/item-handler';</script>";
            exit();
        }

        $namaFoto = '';
        if ($_FILES['foto']['name'] === '') {
            $namaFoto = 'default.png';
        } else {
            // cek file
            $fileFoto  = $this->request->getFile('foto');
            $imageFileType = strtolower(pathinfo($fileFoto->getName(), PATHINFO_EXTENSION));
            $uploadOK = 1;

            // Ekstensi file yang boleh masuk
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != 'jpeg') {
                $uploadOK = 0;
                echo "<script>alert('File bukan format image'); window.location='/item-handler';</script>";
                exit();
            }

            // Cek size file jika 0 maka pilih gambar lain &  batasi ukuran file
            if ($fileFoto->getSize() === 0) {
                echo "<script>alert('Foto tidak diterima, pilih gambar lain'); window.location='/item-handler';</script>";
                exit();
            } else if ($fileFoto->getSize() > 2000000) {
                $uploadOK = 0;
                echo "<script>alert('Maksimal Ukuran file 2MB'); window.location='/item-handler';</script>";
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
                $fileFoto->move('uploads', $namaFoto);
            }
        }

        $this->produkModel->save([
            'produk' => htmlspecialchars($this->request->getVar('produk')),
            'stok' => htmlspecialchars($this->request->getVar('stok')),
            'size' => htmlspecialchars($size),
            'harga' => htmlspecialchars($this->request->getVar('harga')),
            'keterangan' => htmlspecialchars($this->request->getVar('keterangan')),
            'foto' => $namaFoto,
            'id_kategori' => htmlspecialchars($this->request->getVar('kategori'))
        ]);

        session()->setFlashdata('pesan', 'Berhasil menambahkan produk');
        return redirect()->to(base_url('/item-handler'));
    }


    public function getProduk()
    {

        return  $this->produkModel->findAll();
    }

    public function deleteProduk($id)
    {
        $this->produkModel->delete($id);
        // unlink('uploads/' . $produk['foto']);
        session()->setFlashdata('pesan', 'Berhasil menghapus produk');
        return redirect()->to(base_url('/item-handler'));
    }

    public function updateProduk()
    {
        // Tangkap semua request yang dikirimkan
        $produkId = $this->request->getVar('id-produk');
        $kategoriLama = $this->request->getVar('kategoriLama');
        $sizeLama = $this->request->getVar('sizeLama');
        $fotoLama = $this->request->getVar('fotoLama');
        $produk = $this->request->getVar('produk');
        $kategori = $this->request->getVar('kategori');
        $stok = $this->request->getVar('stok');
        $harga = $this->request->getVar('harga');
        $keterangan = $this->request->getVar('keterangan');
        $foto = $this->request->getFile('foto');
        $ukuran = $this->request->getVar('ukuran');

        // Cek Ukuran
        $size = $this->request->getVar('size');
        $validSizes = ['S', 'M', 'L', 'XL', 'XXL'];

        if (!in_array($size, $validSizes)) {
            // Tampilkan pesan atau lakukan tindakan sesuai kebutuhan
            echo "<script>alert('Ukuran tidak valid!'); window.location='/item-handler';</script>";
            exit();
        }


        $namaFoto = '';

        // validasi foto
        if ($foto == '' || $foto === null) {
            $namaFoto = $fotoLama;
        } else {
            // cek file
            $fileFoto  = $foto;
            $imageFileType = strtolower(pathinfo($fileFoto->getName(), PATHINFO_EXTENSION));
            $uploadOK = 1;

            // Ekstensi file yang boleh masuk
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != 'jpeg') {
                $uploadOK = 0;
                echo "<script>alert('File bukan format image'); window.location='/item-handler';</script>";
                exit();
            }

            // Cek size file jika 0 maka pilih gambar lain &  batasi ukuran file
            if ($fileFoto->getSize() === 0) {
                echo "<script>alert('Foto tidak diterima, pilih gambar lain'); window.location='/item-handler';</script>";
                exit();
            } else if ($fileFoto->getSize() > 2000000) {
                $uploadOK = 0;
                echo "<script>alert('Maksimal Ukuran file 2MB'); window.location='/item-handler';</script>";
                exit();
            }

            // cek apakah image real atau fake
            $check = getimagesize($fileFoto->getTempName());
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            $namaFoto = $fileFoto->getRandomName(); // -> ini pake nama random pas di save img nya

            if ($uploadOK === 1) {
                $fileFoto->move('uploads', $namaFoto);
                unlink('uploads/' . $fotoLama);
            }
        }

        $this->produkModel->save([
            'id' => $produkId,
            'produk' => htmlspecialchars($this->request->getVar('produk')),
            'stok' => htmlspecialchars($this->request->getVar('stok')),
            'size' => htmlspecialchars($this->request->getVar('size')),
            'harga' => htmlspecialchars($this->request->getVar('harga')),
            'keterangan' => htmlspecialchars($this->request->getVar('keterangan')),
            'foto' => $namaFoto,
            'id_kategori' => htmlspecialchars($this->request->getVar('kategori'))
        ]);

        session()->setFlashdata('pesan', 'Berhasil megubah produk');
        return redirect()->to(base_url('/item-handler'));
    }

    public function getProdukJSON()
    {
        $id = $this->request->getVar('id');
        $produk = $this->produkModel->find($id);

        // jika kategori ditemukan, kirimkan sebagai json
        if ($produk) {
            // ambil ukuran produk
            // $ukuranProduk = $this->ukuranModel->where('id_produk', $id)->findAll();
            return $this->response->setJSON($produk);
        } else {
            // jika kategori tidak ditemukan, kirim respons kosong atau pesan error
            return $this->response->setJSON(['error' => 'Produk tidak ditemukan']);
        }
    }
}
