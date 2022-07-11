<?php

namespace App\Controllers;
use App\Models\KasusModel;
use App\Models\PelakuViewModel;

class Kasus extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        
    }
    public function jaringanKasus($id)
    {
        $kasus = new KasusModel();
        $data['kasuss'] = $kasus->getWhere(['id_kasus' => $id])->getResultArray();
        foreach ($data['kasuss'] as $row) {
            $data['nama_kasus'] = $row['kasus'];
        }
        $pelaku = new PelakuViewModel();
        $data['pelakus'] = $pelaku->getWhere(['id_kasus' => $id])->getResultArray();
        $fpp = fopen($_SERVER['DOCUMENT_ROOT']."/data/data.csv", 'w');
        echo $_SERVER['DOCUMENT_ROOT']."/data/data.csv";
        die();
        $ar = array('name','imageUrl','positionName','id','parentId','narkoba','berat');
        fputcsv($fpp, $ar);
        foreach ($data['pelakus'] as $row) {
            
            $id = $row['id_pelaku'];
            $nama = $row['nama'];
            $profil = $row['profil'];
            $narkoba = $row['narkoba'];
            $berat = $row['berat'];
            $atasan = $row['id_atasan'];
            if($atasan=="0"){
                $atasan="";
            }
            $gambar=$row['foto'];
            
            $arrdata = array($nama, $gambar, $profil, $id, $atasan,$narkoba,$berat);
            $fp = fopen($_SERVER['DOCUMENT_ROOT']."/data/data.csv", 'a+');
            // FCPATH."resources/img001/img_name.jpg";
            $tulis = fputcsv($fp, $arrdata);
            
        }
        return view('jaringan_kasus',$data);
    }

    public function kasus()
    {
        $kasus = new KasusModel();
        $data['kasuss'] = $kasus->findAll();
        return view('kasus',$data);
    }


    function createKasus()
    {
        $kasus = new KasusModel();
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'kasus' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        // jika data valid, simpan ke database
        if($isDataValid){
            $kasus->insert([
                "kasus" => $this->request->getPost('kasus'),
                "deskripsi" => $this->request->getPost('deskripsi'),
                "tanggal_dibuka" => $this->request->getPost('tanggal_dibuka'),
                "tanggal_ditutup" => $this->request->getPost('tanggal_ditutup'),
            ]);
            $data['kasus'] = $kasus->findAll();
            session()->setFlashdata('success', 'Berkas Berhasil Ditambahkan');
            return redirect('admin/kasus');
        }else{
            session()->setFlashdata('error', 'Berkas gagal Ditambahkan');
            return redirect('admin/kasus');
        }
    }
    function editkasusNarkoba($id)
    {
         // Proses Update Pelaku
        $kasus = new KasusModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['kasus' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $kasus->update($id, [
                "kasus" => $this->request->getPost('kasus'),
                "deskripsi" => $this->request->getPost('deskripsi'),
                "tanggal_dibuka" => $this->request->getPost('tanggal_dibuka'),
                "tanggal_ditutup" => $this->request->getPost('tanggal_ditutup'),
            ]);
            session()->setFlashdata('success', 'Berkas Berhasil Diubah');
        }else{
            session()->setFlashdata('error', 'Berkas Gagal Dihapus');
        }
        return redirect('admin/kasus');
    }
    public function deleteKasus($id){
        $kasus = new KasusModel();
        $delete = $kasus->delete($id);
        $data['kasus'] = $kasus->findAll();
        if($delete){
            session()->setFlashdata('success', 'Berkas Berhasil Dihapus');
        }else{
            session()->setFlashdata('error', 'Berkas Gagal Dihapus');
        }
        
        return redirect('admin/kasus');
    }
}