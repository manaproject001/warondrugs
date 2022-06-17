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

    

}
