<?php

namespace App\Controllers;

use App\Models\PelakuModel;
class Admin extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function kasus()
    {
        $news = new NewsModel();
        $data['newses'] = $news->findAll();
		echo view('admin_list_news', $data);
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

        // jika data valid, simpan ke database
        if($isDataValid){
            $pelaku = new PelakuModel();
            $pelaku->insert([
                "nama" => $this->request->getPost('nama'),
                "tempat_lahir" => $this->request->getPost('tempat_lahir'),
                "nik" => $this->request->getPost('nik'),
                "profil" => $this->request->getPost('profil'),
                "jenis_narkoba" => $this->request->getPost('jenis_narkoba'),
                "berat" => $this->request->getPost('berat'),
                "uang_sita" => $this->request->getPost('uang_sita'),
                "tkp" => $this->request->getPost('tkp'),
                "kewarganegaraan" => $this->request->getPost('kewarganegaraan'),
                "unit" => $this->request->getPost('unit')
            ]);
            return redirect('admin/pelaku');
        }
		
        // tampilkan form create
        echo view('form_pelaku');
    }
}
