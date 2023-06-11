<?php

namespace App\Controllers;

use App\Models\UserModel;
class AdminController extends BaseController
{
    protected $userModel, $data, $model;

    public function __construct()
    {
        $this->userModel = new UserModel();
 

    }

    public function login(){
        return view('admin/login');
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
        if ($email = 'admin@gmail.com' && $password = 'admin') {
            $name= ['nama' => "admin"];    
            session()->set('account', $name);
            session()->setFlashdata('loginsukses', 'Selamat Datang Admin ');

            return redirect()->to(base_url('/admin/dashboard'));
        } else {
           
            return redirect()->to(base_url('/admin/login'));
        }
       
    }

    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin/dashboard', $data);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('/admin'));
    }

    public function examuser() {
        $this->data = [
            'title' => 'Peserta Ujian',
            'user' => $this->userModel->getUser(),
            'nama' => $this->userModel->getUser()
        ];
        $this->data['get'] = $this->userModel->getUser();
  
        
       

        return view('admin/pesertaujian', $this->data);
    }
    public function examresult() {
        $this->data = [
            'title' => 'Hasil Ujian',
            'user' => $this->userModel->getUser(),
            'nama' => $this->userModel->getUser()
        ];
        $this->data['get'] = $this->userModel->getUser();
  
        
       

        return view('admin/hasilujian', $this->data);
    }

}