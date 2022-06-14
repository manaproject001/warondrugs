<?php

namespace App\Controllers;
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

}
