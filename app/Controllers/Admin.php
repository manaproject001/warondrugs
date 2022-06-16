<?php

namespace App\Controllers;
use App\Models\KasusModel;
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
        $kasus = new KasusModel();
        $data['kasuss'] = $kasus->findAll();
        return view('kasus',$data);
    }


    function createKasus()
    {
        $jenisNarkoba = new KasusModel();
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'jenis_narkoba' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        
        // jika data valid, simpan ke database
        if($isDataValid){
            $jenisNarkoba->insert([
                "jenis_narkoba" => $this->request->getPost('jenis_narkoba')
            ]);
            $data['jenisnarkoba'] = $jenisNarkoba->findAll();
            session()->setFlashdata('success', 'Berkas Berhasil Ditambahkan');
            return redirect('admin/data/jenis_narkoba');
        }
    }

    function editJenisNarkoba($id)
    {
         // Proses Update Pelaku
        $jenis = new KasusModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['jenis_narkoba' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $jenis->update($id, [
                "jenis_narkoba" => $this->request->getPost('jenis_narkoba')
            ]);
            session()->setFlashdata('success', 'Berkas Berhasil Diubah');
            return redirect('admin/data/jenis_narkoba');
        }
    }

    public function deleteJenisNarkoba($id){
        $jenisNarkoba = new KasusModel();
        $jenisNarkoba->delete($id);
        $data['jenisnarkoba'] = $jenisNarkoba->findAll();
        session()->setFlashdata('success', 'Berkas Berhasil Dihapus');
        return redirect('admin/data/jenis_narkoba');
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
            $gambar="";
            
            $arrdata = array($nama, $gambar, $profil, $id, $atasan,$narkoba,$berat);
            $fp = fopen($_SERVER['DOCUMENT_ROOT']."/data/data.csv", 'a+');
            // FCPATH."resources/img001/img_name.jpg";
            $tulis = fputcsv($fp, $arrdata);
            
        }
        return view('jaringan_kasus',$data);
    }

}
