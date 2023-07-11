<?php

namespace App\Controllers;

use App\Models\DurasiModel;
use App\Models\JawabanModel;
use App\Models\UserModel;
use App\Models\SoalModel;

class peserta extends BaseController
{
    protected $userModel;
    protected $soalModel;
    protected $jawabanModel;
    protected $durasimodel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->soalModel = new SoalModel();
        $this->jawabanModel = new JawabanModel();
        $this->durasimodel = new DurasiModel();

        if(session()->get('account')){
            session()->set('account', $this->userModel->getUser(session()->get('account')['id']));
        }
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
                    'required' => 'E-mail tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $account = $this->userModel->getEmail($email);
        // $name = $this->userModel->getUser($account['id']);

        if (!$account == false) {
            if ($password == $account['password']) {

                if($account['login'] == 0){
                    $this->userModel->save([
                        'id' => $account['id'],
                        'login' => true,
                    ]);
    
                    $name = $this->userModel->getUser($account['id']);
                    session()->set('account', $account);
                    
    
                    session()->setFlashData('loginsukses', 'Selamat Datang, '.$name['nama']);
                    return redirect()->to(base_url('/dashboard'));
                } else{
                    session()->setFlashData('alert-login', 'Perangkat lain sedang login');
                    return redirect()->to(base_url('/'));
                }
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
        $this->userModel->save([
            'id' => session()->get('account')['id'],
            'login' => 'false',
        ]);

        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function ujian()
    {    
        $now = strtotime(date('H:i:s'));
        $open = strtotime($this->durasimodel->getData()[0]['mulai']);
        $close = strtotime($this->durasimodel->getData()[0]['selesai']);
        $data = [
            'title' => 'Daftar Ujian',
            'peserta' => $this->userModel->getUser(session()->get('account')['id']),
            'soal' => $this->soalModel->getSoal(),
            'now' => $now,
            'open' => $open,
            'close' => $close,
            'durasi' => $this->durasimodel->getData()
        ];

        return view('peserta/ujian', $data);
        
    }

    public function token()
    {
        if(session()->get('account')['status'] == 'belum'){
            $token = $this->request->getVar('inputtoken');
            $tokendb =  $this->userModel->getUser(session()->get('account')['id']);

            if (!$this->validate([
                'inputtoken'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required' => 'Token tidak boleh kosong'
                    ]
                ]
            ])){
                return redirect()->back()->withInput();
            }

            if ($token != $tokendb['token']){
                session()->setFlashdata('token-false', 'Token yang anda masukkan salah!');
                return redirect()->to(base_url('/ujian'));
            } else{
                $this->userModel->save([
                    'id' => session()->get('account')['id'],
                    'status' => 'ujian',
                    'waktu_mulai' => date('Y-m-d H:i:s')
                ]);

                session()->set('account', $this->userModel->getUser(session()->get('account')['id']));


                return redirect()->to(base_url('/shuffle'));
            }
        } elseif (session()->get('account')['status'] == 'ujian'){
            return redirect()->to(base_url('/loadSoal/1'));
        }
    }

    public function shuffle() {
        $array = [];
        $soal = $this->soalModel->getSoal();
        foreach ($soal as $data){
            $array[] = [
                'id' => $data['id'],
                'soal' => $data['soal'],
                'kategori' => $data['kategori'],
                'jawaban' => null
            ];
        }

        shuffle($array);

        foreach ($array as $index => &$item) {
            $item['urutan'] = $index + 1;
        }

        session()->set('soal', $array);
        return redirect()->to(base_url('/loadSoal/1'));
    }

    public function loadSoal($idx) {

        $intIndex = intval($idx);
        $indexFinal = $intIndex - 1;
        $indexAkhir = count(session()->get('soal'));

            $data = [
                'title' => 'Ujian IMEV',
                'soal' => session()->get('soal')[$indexFinal],
                'jmlSoal' => session()->get('soal'),
                'akhir' => $indexAkhir,
                'waktu' => $this->durasimodel->findAll(),
            ];

            return view('peserta/soal', $data);
    }

    public function jawaban($idUrutan) {
        $posisi = $idUrutan;
        $jmlIndex = count($this->soalModel->getSoal());

        $testArr = [
            'button' => $this->request->getVar('button'),
            'jawaban' => $this->request->getVar('jawaban')
        ];
        $array = session()->get('soal');
        $array[$idUrutan-1]['jawaban'] = $testArr['jawaban'];
        session()->set('soal', $array);

        if($testArr['button'] == 'simpan jawaban'){
            if($posisi == $jmlIndex){
                return redirect()->to(base_url('/confirm'));
            }
            $idUrutan++;
        }elseif ($testArr['button'] == 'previous'){
            $idUrutan--;
        } else{
            return redirect()->to(base_url('/confirm'));
        }
        return redirect()->to(base_url("/loadSoal/$idUrutan"));
    }

    public function confirm() {
        

        if (session()->get('account')['status'] == "selesai"){
            $data = [
                'title' => 'Dashboard',
            ];
            return view('peserta/dashboard', $data );
        }else{
            $data = [
                'title' => 'Finish',
                'data' => session()->get('soal')
            ];
            return view('peserta/confirm', $data);
        }
    }


    public function save() {
        if(session()->get('account')['status'] != "selesai"){
            
            $isi = session()->get('soal');

            foreach($isi as $row){
                $this->jawabanModel->save([
                    'jawaban' => $row['jawaban'],
                    'id_soal' => $row['id'],
                    'id_user' => session()->get('account')['id']
                ]);
            }
    
            return redirect()->to(base_url('/selesai'));
        }
        return redirect()->to(base_url('/dashboard'));
    }
    
    public function selesai() {
        $this->userModel->save([
            'id' => session()->get('account')['id'],
            'status' => 'selesai',
            'waktu_selesai' => date('Y-m-d H:i:s')
        ]);
        session()->set('account', $this->userModel->getUser(session()->get('account')['id']));

        session()->setFlashdata('selesai', 'Ujian telah selesai');
        return redirect()->to(base_url('/ujian'));
    }

    public function hasilUjian() {
        $data =[
            'title' => 'Hasil Ujian',
            'data' => $this->jawabanModel->getDataByName(session()->get('account')['id'])
        ];

        return view('peserta/hasilujian', $data);
    }

}
