<?php

namespace App\Controllers;

use App\Models\PelakuModel;
use App\Models\DetailJenisNarkobaModel;
class Admin extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function kasus()
    {
        return view('kasus');
    }

    public function pelaku()
    {
        $pelaku = new PelakuModel();
        $data['pelakus'] = $pelaku->findAll();
		echo view('pelaku', $data);
    }

    public function createPelaku()
    {
		// lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        $j = $this->request->getPost('jenis_narkoba');
        function array_implode(array $a)
        {
            return implode(',',$a);
        }
        // jika data valid, simpan ke database
        if($isDataValid){
            $pelaku = new PelakuModel();
            $pelaku->insert([
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "nik" => $this->request->getPost('nik'),
                "profil" => $this->request->getPost('profil'),
                // "jenis_narkoba" => array_implode($j),
                "berat" => $this->request->getPost('berat'),
                "uang_sita" => $this->request->getPost('uang_sita'),
                "tkp" => $this->request->getPost('tkp'),
                "kewarganegaraan" => $this->request->getPost('kewarganegaraan'),
                "unit" => $this->request->getPost('unit')
            ]);
            $id_pelaku = $pelaku->getInsertID();
            $jenis_narkoba = count($this->request->getPost('jenis_narkoba'));
            for ($i = 0; $i < $jenis_narkoba; $i++) {
                $datas[$i] = array(
                    'id_pelaku' => $id_pelaku,
                    'id_jenis_narkoba' => $this->request->getPost('jenis_narkoba[' . $i . ']')
                );
                $jenis = new DetailJenisNarkobaModel();
                $jenis->insert($datas[$i]);
            }

            return redirect('admin/pelaku');
        }
		
        // tampilkan form create
        echo view('form_pelaku');
    }

    public function readPelakuEdit($id)
    {
        $pelaku = new PelakuModel();
        $data['pelaku'] = $pelaku->where('id_pelaku', $id)->first();
        echo view('form_pelaku_edit', $data);
    }

    public function editPelaku()
    {
        $id = $this->uri->getSegment(3);

        echo $id;
        die();
        // ambil artikel yang akan diedit
        
        // $pelaku->update($id, [
        //     "nama" => $this->request->getPost('nama'),
        //     "tempat_lahir" => $this->request->getPost('tempat_lahir'),
        //     "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
        //     "nik" => $this->request->getPost('nik')
        // ]);
        // echo "<pre>";
        // print_r($pelaku);
        // die();
        // lakukan validasi data artikel
        $pelaku = new PelakuModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
  
        // jika data vlid, maka simpan ke database
        if($isDataValid){
            $pelaku->update($id, [
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "nik" => $this->request->getPost('nik')
            ]);
            echo "<pre>";
            print_r($pelaku);
            die();
            // return redirect('admin/pelaku');
        }
        // echo view('form_pelaku_edit', $data);
    }

    
    function updatePelaku($id)
    {
         // Proses Update Pelaku
         $pelaku = new PelakuModel();
         
             $pelaku->update($id, [
                 "nama" => $this->request->getPost('nama'),
                 "nik" => $this->request->getPost('nik')
             ]);
             return redirect('admin/pelaku');
         
    }
}
