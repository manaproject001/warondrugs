<?php
namespace App\Controllers;
use App\Models\JenisNarkobaModel;

class Data extends BaseController
{
    public function jenis_narkoba()
    {
        $jenisNarkoba = new JenisNarkobaModel();
        $data['jenisnarkoba'] = $jenisNarkoba->findAll();

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
            return redirect('admin/data/jenis_narkoba');
        }
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
            return redirect('admin/data/jenis_narkoba');
        }
    }

    public function deleteJenisNarkoba($id){
        $jenisNarkoba = new JenisNarkobaModel();
        $jenisNarkoba->delete($id);
        $data['jenisnarkoba'] = $jenisNarkoba->findAll();
        return redirect('admin/data/jenis_narkoba');
    }

}
