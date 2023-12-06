<?php

namespace App\Models;

use CodeIgniter\Model;

class Customer_model extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'telp', 'email', 'password', 'role', 'alamat'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
