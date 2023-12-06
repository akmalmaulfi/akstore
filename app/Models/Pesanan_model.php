<?php

namespace App\Models;

use CodeIgniter\Model;

class Pesanan_model extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_produk', 'id_pembayaran', 'jumlah'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
