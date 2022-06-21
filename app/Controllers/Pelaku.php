<?php

namespace App\Controllers;

use App\Models\PelakuModel;
use App\Models\DetailJenisNarkobaModel;
use App\Models\JenisNarkobaModel;
use App\Models\KasusModel;
use App\Models\PelakuViewModel;
use App\Models\PenangananModel;
use Config\Services;

class Pelaku extends BaseController
{
    public function __construct()
    {
        $session = Services::session();
        $this->session = session();
        
    }


    public function index()
    {
        $pelaku = new PelakuViewModel();
        $data['pelakus'] = $pelaku->findAll();
        $detail = new DetailJenisNarkobaModel();
        $data['details'] = $detail->findAll();
        $kasus = new KasusModel();
        $data['kasuss'] = $kasus->findAll();
        
		echo view('pelaku', $data);
    }

    public function createPelaku()
    {
        helper('form');
		$jenis = new JenisNarkobaModel();
        $data['jeniss'] = $jenis->findAll();
        $kasus = new KasusModel();
        $data['kasuss'] = $kasus->findAll();
        $pelaku = new PelakuViewModel();
        $data['kurir'] = $pelaku->query("Select * from v_pelaku where profil='Kurir'" )->getResultArray();
        $data['bandar'] = $pelaku->query("Select * from v_pelaku where profil='Bandar' " )->getResultArray();
        $penanganan = new PenangananModel();
        $data['penanganan'] = $penanganan->findAll();
        echo view('form_pelaku', $data);
    }
    
    public function addPelaku()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'profil' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        $j = $this->request->getPost('jenis_narkoba');
        function array_implode(array $a)
        {
            return implode(',',$a);
        }
        // jika data valid, simpan ke database
        if($isDataValid){
            
            $pelaku = new PelakuModel();
            if($this->request->getPost('profil')=="Bandar"){
                $idatasan="0";
            }else{
                $idatasan= $this->request->getPost('id_atasan');
            }
            $upload = $this->request->getFile('file_upload');
            if($upload->getName()==""){
                if($this->request->getPost('jenis_kelamin')=='Pria'){
                    $foto="Pria.jpg";
                }else{
                    $foto="Wanita.jpg";
                }
            }else{
                $nama=mt_rand(100000, 999999)."-".$this->request->getPost('nama').".jpg";
                $path = WRITEPATH . '../public/assets/images/foto/';
                $upload->move($path,$nama);
                $foto = $nama;
            }
            
            $pelaku->insert([
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "nik" => $this->request->getPost('nik'),
                "profil" => $this->request->getPost('profil'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
                "berat" => $this->request->getPost('berat'),
                "uang_sita" => $this->request->getPost('uang_sita'),
                "tkp" => $this->request->getPost('tkp'),
                "kewarganegaraan" => $this->request->getPost('kewarganegaraan'),
                "unit" => $this->request->getPost('unit'),
                "id_kasus" => $this->request->getPost('id_kasus'),
                "id_atasan" => $idatasan,
                'foto' => $foto,
                "id_penanganan" => $this->request->getPost('id_penanganan'),
                "tempat_penanganan" => $this->request->getPost('tempat_penanganan'),
                "tanggal_penangkapan" => $this->request->getPost('tanggal_penangkapan'),
            ]);
            $id_pelaku = $pelaku->getInsertID();
            $this->insertNarkoba($id_pelaku);
            $this->session->setFlashdata('success', 'Data Berhasil Ditambah');
            
        }else{
            $this->session->setFlashdata('error', $validation->getError());
        }
        return redirect('admin/pelaku');
        
    }

    public function insertNarkoba($id)
    {
        $jenis_narkoba = count($this->request->getPost('jenis_narkoba'));
            for ($i = 0; $i < $jenis_narkoba; $i++) {
                $datas[$i] = array(
                    'id_pelaku' => $id,
                    'id_jenis_narkoba' => $this->request->getPost('jenis_narkoba[' . $i . ']'),
                );
                $jenis = new DetailJenisNarkobaModel();
                $jenis->insert($datas[$i]);
            }
    }

    public function get_atasan(){
        $id = $this->request->getPost('id');
        $atasan = new PelakuViewModel();
        $data=$atasan->get_atasan($id);
        echo json_encode($data);
    }

    public function readPelakuEdit($id)
    {
        helper('form');
        $pelaku = new PelakuViewModel();
        $data['pelaku'] = $pelaku->where('id_pelaku', $id)->first();
        
        $id_kasus = $data['pelaku']['id_kasus'];
        $profil = $data['pelaku']['profil'];
        if($profil=="Pengguna"){
            $p="Kurir";
        }else{
            $p="Bandar";
        }
        $data['pelakus'] = $pelaku->query("SELECT * FROM v_pelaku WHERE id_kasus='$id_kasus' AND profil='$p'")->getResultArray();
        $jenis = new JenisNarkobaModel();
        $data['jeniss'] = $jenis->findAll();
        $kasus = new KasusModel();
        $data['kasuss'] = $kasus->findAll();
        $penanganan = new PenangananModel();
        $data['penanganan'] = $penanganan->findAll();
        echo view('form_pelaku_edit', $data);
    }

    
    function updatePelaku($id)
    {
        helper('form');
         // Proses Update Pelaku
        $pelaku = new PelakuModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($this->request->getPost('profil')=="Bandar"){
            $idatasan="0";
        }else{
            $idatasan= $this->request->getPost('id_atasan');
        }
        if($isDataValid){
            $fotolama = $this->request->getPost('file_upload_old');
            $upload = $this->request->getFile('file_upload');
            $uploadName = $upload->getName();
            if($uploadName==""){
                $foto=$fotolama;
            }else{
                if($uploadName != 'Pria.jpg' AND $uploadName != 'Wanita.jpg'){
                    $delete = unlink( $_SERVER['DOCUMENT_ROOT']."/assets/images/foto/$fotolama");
                }
                $nama=mt_rand(100000, 999999)."-".$this->request->getPost('nama').'.jpg';
                $path = WRITEPATH . '../public/assets/images/foto/';
                $upload->move($path,$nama);
                $foto = $nama;
            }
            
            $pelaku->update($id, [
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "nik" => $this->request->getPost('nik'),
                "profil" => $this->request->getPost('profil'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
                "berat" => $this->request->getPost('berat'),
                "uang_sita" => $this->request->getPost('uang_sita'),
                "tkp" => $this->request->getPost('tkp'),
                "kewarganegaraan" => $this->request->getPost('kewarganegaraan'),
                "unit" => $this->request->getPost('unit'),
                "id_kasus" => $this->request->getPost('id_kasus'),
                "id_atasan" => $idatasan,
                'foto' => $foto,
                "id_penanganan" => $this->request->getPost('id_penanganan'),
                "tempat_penanganan" => $this->request->getPost('tempat_penanganan'),
                "tanggal_penangkapan" => $this->request->getPost('tanggal_penangkapan'),
            ]);
            
            $jenis = new DetailJenisNarkobaModel();
            $jenis->delete($id);

            $id_pelaku = $id;
            $this->insertNarkoba($id_pelaku);
            
            session()->setFlashdata('success', 'Berkas Berhasil Diupdate');
            return redirect('admin/pelaku');
        }
    }

    public function deletePelaku($id){
        
       
        $pelaku = new PelakuModel();
        $data['pelaku'] = $pelaku->where('id_pelaku', $id)->first();
        $foto = $data['pelaku']['foto'];
        if($foto != 'Pria.jpg' AND $foto != 'Wanita.jpg'){
            $delete = unlink( $_SERVER['DOCUMENT_ROOT']."/assets/images/foto/$foto");
        }else{
            $delete=true;
        }
        
        if($delete){
            $pelaku->delete($id);
            session()->setFlashdata('success', 'Berkas Berhasil Dihapus');
        }else{
            session()->setFlashdata('error', 'Berkas Gagal Dihapus');
        }
        
        return redirect('admin/pelaku');
    }
}
