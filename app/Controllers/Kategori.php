<?php
namespace App\Controllers;

use App\Models\KasusModel;
use App\Models\PelakuViewModel;

class Kategori extends BaseController{
    
    
    function index(){
        $kasus = new KasusModel();
        $x['data']=$kasus->findAll();
        echo view('v_kategori',$x);
    }
 
    function get_kasus(){
        $id = $this->request->getPost('id');
        $profil = $this->request->getPost('profil');
        $pelaku = new PelakuViewModel();
        $data=$pelaku->get_kasus($id, $profil);
        echo json_encode($data);
    }
}