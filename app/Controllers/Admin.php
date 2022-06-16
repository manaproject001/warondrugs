<?php

namespace App\Controllers;
use App\Models\PelakuViewModel;
class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        return view('dashboard');
    }

    public function baru()
    {
        return view('baru');
    }

    public function kasus()
    {
        $pelaku = new PelakuViewModel();
        $data['pelakus'] = $pelaku->findAll();
        $fpp = fopen($_SERVER['DOCUMENT_ROOT']."/data/data.csv", 'w');
        $ar = array('name','imageUrl','positionName','id','parentId','narkoba','berat');
        fputcsv($fpp, $ar);
        foreach ($data['pelakus'] as $row) {
            $id = $row['id_pelaku'];
            $id = $row['id_pelaku'];
            $nama = $row['nama'];
            $profil = $row['profil'];
            $narkoba = $row['narkoba'];
            $berat = $row['berat'];
            $atasan = $row['id_atasan'];
            if($atasan=="0"){
                $atasan="";
            }
            $gambar="";
            
            $arrdata = array($nama, $gambar, $profil, $id, $atasan,$narkoba,$berat);
            $fp = fopen($_SERVER['DOCUMENT_ROOT']."/data/data.csv", 'a+');
            // FCPATH."resources/img001/img_name.jpg";
            $tulis = fputcsv($fp, $arrdata);
            
        }
        return view('kasus');
    }

    public function jaringanKasus()
    {
        return view('jaringan_kasus');
    }

}
