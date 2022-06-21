<?php

namespace App\Models;

use CodeIgniter\Model;

class PenangananModel extends Model
{
    protected $table      = 'tb_penanganan';
    protected $primaryKey = 'id_penanganan';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['penanganan'];

    public function getAllPenanganan()
    {
        $this->findAll();
    }
    
}