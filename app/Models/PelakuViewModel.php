<?php

namespace App\Models;

use CodeIgniter\Model;

class PelakuViewModel extends Model
{
    protected $table      = 'v_pelaku';
    protected $primaryKey = 'id_pelaku';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'kewarganegaraan', 'nik','profil','jenis_narkoba','berat','uang_sita','tkp','unit'];

    function get_atasan($profil){
        $hasil= $this->db->query("SELECT * FROM v_pelaku WHERE profil='$profil'");
        return $hasil->getResult();
    }

    function get_kasus($id, $profil){
        if($profil=="Pengguna"){
            $p="Kurir";
        }else{
            $p="Bandar";
        }
        $hasil= $this->db->query("SELECT * FROM v_pelaku WHERE id_kasus='$id' AND profil='$p'");
        return $hasil->getResult();
    }
}