<?php

namespace App\Models;

use CodeIgniter\Model;

class Produk_model extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['produk', 'stok', 'size', 'harga', 'keterangan', 'foto', 'id_kategori'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    public function getProdukWithKategori()
    {
        $builder = $this->db->table('produk');
        $builder->select('produk.*, kategori.nama');
        $builder->join('kategori', 'kategori.id = produk.id_kategori');
        $builder->where('produk.deleted_at', null);
        $query = $builder->get();

        return $query->getResult();
    }
}
