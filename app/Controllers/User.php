<?php

namespace App\Controllers;
use App\Models\KasusModel;
use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->session = session();
        
    }

    public function readUser($id)
    {
        helper('form');
        $user = new UserModel();
        $data['user'] = $user->where('user_id', $id)->first();
        echo view('form_user_edit', $data);
    }

    public function editUser($id)
    {
        helper('form');
         // Proses Update Pelaku
        $user = new UserModel();
        $validation =  \Config\Services::validation();
        $validation->setRules(['username' => 'required','email' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if($isDataValid){
            $upload = $this->request->getFile('file_upload');
            if($upload->getName()==""){
                $foto="Pria.jpg";
            }else{
                $user_name=$this->request->getPost('username').".jpg";
                $path = WRITEPATH . '../public/assets/images/admin/';
                $upload->move($path,$user_name);
                $foto = $user_name;
            }
            $user->update($id, [
                "user_name" => $this->request->getPost('username'),
                "user_email" => $this->request->getPost('email'),
                "user_title" => $this->request->getPost('title'),
                'foto' => $foto
            ]);
            
            session()->setFlashdata('success', 'Berkas Berhasil Diupdate');
            return redirect('admin');
        }else{
            session()->setFlashdata('error', 'Berkas Gagal Diupdate');
            return redirect('admin');
        }
    }
}