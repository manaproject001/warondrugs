<?php

namespace App\Models;

use CodeIgniter\Model;

class KasusModel extends Model
{
    protected $table      = 'tb_kasus';
    protected $primaryKey = 'id_kasus';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['kasus', 'deskripsi', 'tanggal_dibuka'];

    public function getAllKasus()
    {
        $this->findAll();
    }

    function get_kategori(){
        $hasil=$this->db->query("SELECT * FROM kategori");
        return $hasil->getResultArray();
    }
 
    function get_subkategori($id){
        $hasil= $this->db->query("SELECT * FROM subkategori WHERE subkategori_kategori_id='$id'");
        return $hasil->getResult();
    }
    
}