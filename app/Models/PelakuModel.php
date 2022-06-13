<?php

namespace App\Models;

use CodeIgniter\Model;

class PelakuModel extends Model
{
    protected $table      = 'tb_pelaku';
    protected $primaryKey = 'id_pelaku';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'nik','profil','jenis_narkoba','berat','uang_sita','tkp','unit'];

    
}