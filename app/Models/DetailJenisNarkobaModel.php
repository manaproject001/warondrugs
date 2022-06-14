<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailJenisNarkobaModel extends Model
{
    protected $table      = 'det_jenis_narkoba';

    protected $allowedFields = ['id_pelaku', 'id_jenis_narkoba'];

    
}