<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembayaran_model extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_customer', 'bukti', 'status'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
