<?php

namespace App\Models;

use CodeIgniter\Model;

class Rate_model extends Model
{
    protected $table = 'rate';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_produk', 'id_customer', 'rate'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
