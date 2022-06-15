<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisNarkobaModel extends Model
{
    protected $table      = 'tb_jenis_narkoba';
    protected $primaryKey = 'id_jenis_narkoba';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['jenis_narkoba'];

    public function getAllJenisNarkoba()
    {
        $this->findAll();
    }
}