<?php

namespace App\Models;

use CodeIgniter\Model;

class Owner_model extends Model
{
    protected $table = 'owner';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['username', 'email', 'password'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}
