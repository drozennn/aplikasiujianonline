<?php

namespace App\Controllers;

use App\Models\UserModel;

class peserta extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(){
        return view('peserta/login');
    }
    
    public function auth()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }
        
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password'); 

        $account = $this->userModel->getEmail($email);
        
        if(!$account == false){
            if($password == $account['password']){
                session()->set('account', $account);
                return redirect()->to(base_url('/dashboard'));
            }else{
                session()->setFlashdata('alert-login', 'Password Salah');
                return redirect()->to(base_url('/'))->withInput();
            }
        }else{
            session()->setFlashdata('alert-login', 'Email tidak terdaftar');
            return redirect()->to(base_url('/'))->withInput();
        }
    }

    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('peserta/dashboard', $data);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
