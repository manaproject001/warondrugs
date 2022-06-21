<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailJenisNarkobaModel extends Model
{
    protected $table      = 'det_jenis_narkoba';
    protected $primaryKey = 'id_pelaku';
    protected $allowedFields = ['id_pelaku', 'id_jenis_narkoba'];

    public function insertNarkoba($jenis_narkoba,$id)
    {
        // $jenis_narkoba = count($this->request->getPost('jenis_narkoba'));
            for ($i = 0; $i < $jenis_narkoba; $i++) {
                $datas[$i] = array(
                    'id_pelaku' => $id,
                    'id_jenis_narkoba' => $this->request->getPost('jenis_narkoba[' . $i . ']'),
                );
                // $this->db->insert($datas[$i]);
                $this->db->table($this->table)->insert($datas[$i]);
            }
    }
    
}