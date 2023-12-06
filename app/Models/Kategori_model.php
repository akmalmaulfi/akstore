<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'telp', 'email', 'password', 'role', 'alamat'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
