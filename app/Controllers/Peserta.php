<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SoalModel;

class peserta extends BaseController
{
    protected $userModel;
    protected $soalModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->soalModel = new SoalModel();
    }

    public function login()
    {
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

        $name = $this->userModel->getUser($account['id']);

        if (!$account == false) {
            if ($password == $account['password']) {
                session()->set('account', $account);
                session()->setFlashData('loginsukses', 'Selamat Datang, '.$name['nama']);
                return redirect()->to(base_url('/dashboard'));
            } else {
                session()->setFlashdata('alert-login', 'Password Salah');
                return redirect()->to(base_url('/'))->withInput();
            }
        } else {
            session()->setFlashdata('alert-login', 'Email tidak terdaftar');
            return redirect()->to(base_url('/'))->withInput();
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('peserta/dashboard', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function ujian()
    {    

        $data = [
            'title' => 'Daftar Ujian',
            'peserta' => $this->userModel->getUser(session()->get('account')['id']),
            'soal' => $this->soalModel->countSoal(session()->get('account')['paket'])
        ];

        return view('peserta/ujian', $data);
        
    }
}