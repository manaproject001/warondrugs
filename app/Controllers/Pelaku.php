<?php

namespace App\Controllers;

use App\Models\PelakuModel;
use App\Models\DetailJenisNarkobaModel;
use App\Models\JenisNarkobaModel;
use App\Models\PelakuViewModel;
class Pelaku extends BaseController
{

    public function index()
    {
        $pelaku = new PelakuViewModel();
        $data['pelakus'] = $pelaku->findAll();

        $detail = new DetailJenisNarkobaModel();
        $data['details'] = $detail->findAll();
        // isset($data['pelakus']) ? count($data['pelakus']) : 0;

        
        
		echo view('pelaku', $data);
    }

    public function createPelaku()
    {
		// lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'jenis_kelamin' => 'required'
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
            $pelaku->insert([
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "nik" => $this->request->getPost('nik'),
                "profil" => $this->request->getPost('profil'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
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
		$jenis = new JenisNarkobaModel();
        $data['jeniss'] = $jenis->findAll();
        // tampilkan form create
        echo view('form_pelaku', $data);
    }

    public function readPelakuEdit($id)
    {
        $pelaku = new PelakuViewModel();
        $data['pelaku'] = $pelaku->where('id_pelaku', $id)->first();
        $jenis = new JenisNarkobaModel();
        $data['jeniss'] = $jenis->findAll();
        echo view('form_pelaku_edit', $data);
    }

    
    function updatePelaku($id)
    {
         // Proses Update Pelaku
        $pelaku = new PelakuModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $pelaku->update($id, [
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "tanggal_lahir" => $this->request->getPost('tanggal_lahir'),
                "nik" => $this->request->getPost('nik'),
                "profil" => $this->request->getPost('profil'),
                "jenis_kelamin" => $this->request->getPost('jenis_kelamin'),
                // "jenis_narkoba" => array_implode($j),
                "berat" => $this->request->getPost('berat'),
                "uang_sita" => $this->request->getPost('uang_sita'),
                "tkp" => $this->request->getPost('tkp'),
                "kewarganegaraan" => $this->request->getPost('kewarganegaraan'),
                "unit" => $this->request->getPost('unit')
            ]);
            
            $jenis = new DetailJenisNarkobaModel();
            $jenis->delete($id);

            $id_pelaku = $id;
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
    }

    public function deletePelaku($id){
        $pelaku = new PelakuModel();
        $pelaku->delete($id);
        session()->setFlashdata('success', 'Berkas Berhasil Dihapus');
        return redirect('admin/pelaku');
    }
}
