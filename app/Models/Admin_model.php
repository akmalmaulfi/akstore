<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'email', 'password', 'role'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
