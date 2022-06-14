<?php

namespace App\Models;

use CodeIgniter\Model;

class PelakuViewModel extends Model
{
    protected $table      = 'v_pelaku';
    protected $primaryKey = 'id_pelaku';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'nik','profil','jenis_narkoba','berat','uang_sita','tkp','unit'];

    
}