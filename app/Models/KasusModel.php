<?php

namespace App\Models;

use CodeIgniter\Model;

class KasusModel extends Model
{
    protected $table      = 'tb_kasus';
    protected $primaryKey = 'id_kasus';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kasus', 'deskripsi', 'tanggal_dibuka'];

    
}