<?php

namespace App\Controllers;

class peserta extends BaseController
{
    public function login(){
        return view('peserta/login');
    }
    
    public function index()
    {
        return view('peserta/dashboard');
    }
}
