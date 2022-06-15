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
        return view('dashboard');
    }

    public function kasus()
    {
        return view('kasus');
    }

    public function jaringanKasus()
    {
        return view('jaringan_kasus');
    }

}
