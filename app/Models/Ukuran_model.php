<?php

namespace App\Models;

use CodeIgniter\Model;

class Ukuran_model extends Model
{
    protected $table = 'ukuran';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_produk', 'ukuran'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
