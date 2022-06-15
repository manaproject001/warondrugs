<?php

namespace App\Controllers;
class Admin extends BaseController
{
    public function __construct()
    {
        $this->session = session();
    }

    public function index()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/auth/login');
        }
        
        //cek role dari session
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }
        $data['sesi'] = $this->session->has('isLogin');
        $data['role'] = $this->session->has('role');
        return view('dashboard', $data);
    }

    public function kasus()
    {
        return view('kasus');
    }

}
