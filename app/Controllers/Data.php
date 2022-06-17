<?php
namespace App\Controllers;
use App\Models\PelakuViewModel;
use App\Models\JenisNarkobaModel;

class Data extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function jenis_narkoba()
    {
        $jenisNarkoba = new JenisNarkobaModel();
        $data['jenisnarkoba'] = $jenisNarkoba->findAll();
        $data['username'] = $this->session->get("username");
        echo view('jenis_narkoba', $data);
    }

    function createJenisNarkoba()
    {
        $jenisNarkoba = new JenisNarkobaModel();
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
        }else{
            session()->setFlashdata('error', 'Berkas Gagal Dihapus');
        }
        return redirect('admin/data/jenis_narkoba');
    }

    function editJenisNarkoba($id)
    {
         // Proses Update Pelaku
        $jenis = new JenisNarkobaModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['jenis_narkoba' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $jenis->update($id, [
                "jenis_narkoba" => $this->request->getPost('jenis_narkoba')
            ]);
            session()->setFlashdata('success', 'Berkas Berhasil Diubah');
        }else{
            session()->setFlashdata('error', 'Berkas Gagal Dihapus');
        }
        return redirect('admin/data/jenis_narkoba');
    }

    public function deleteJenisNarkoba($id){
        $jenisNarkoba = new JenisNarkobaModel();
        $delete = $jenisNarkoba->delete($id);
        $data['jenisnarkoba'] = $jenisNarkoba->findAll();
        if($delete){
            session()->setFlashdata('success', 'Berkas Berhasil Dihapus');
        }else{
            session()->setFlashdata('error', 'Berkas Gagal Dihapus');
        }
        
        return redirect('admin/data/jenis_narkoba');
    }

}
