<?php

namespace App\Controllers;

use App\Models\DurasiModel;
use App\Models\JawabanModel;
use App\Models\SoalModel;
use App\Models\UserModel;
use Dompdf\Dompdf;
class AdminController extends BaseController
{
    protected $userModel, $data;
    protected $jawabanModel;
    protected $durasiModel;
    protected $soalModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->jawabanModel = new JawabanModel();
        $this->durasiModel = new DurasiModel();
        $this->soalModel = new SoalModel();
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
        if ($email == 'admin@gmail.com' && $password == 'admin') {
            $name= ['nama' => "admin"];    
            session()->set('account', $name);
            session()->setFlashdata('loginsukses', 'Selamat Datang Admin ');

            return redirect()->to(base_url('/admin/dashboard'));
        } else {
            session()->setFlashdata('alert-login', 'email atau password salah');
            return redirect()->to(base_url('/admin'));
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
            'user' => $this->userModel->getUser()
        ];
        $this->data['get'] = $this->userModel->getUser();
        return view('admin/hasilujian', $this->data);
    }

    public function control() {
        $data = [
            'title' => 'Kontrol Peserta',
            'user' => $this->userModel->getUser()
        ];
        $data['get'] = $this->userModel->getUser();
        return view('admin/controlPeserta', $data);
    }

    public function controlBelum($id) {
        $this->userModel->save([
            'id' => $id,
            'status' => 'belum',
            'waktu_mulai' => null,
            'waktu_selesai' => null,
        ]);
        $array =[];
        $akun = $this->userModel->getUser($id);
        $jawaban = $this->jawabanModel->getDataByName($akun['id']);

        foreach($jawaban as $row){
            $array[] = [
                'id' => $row['id']
                ];
        } 

        foreach($jawaban as $deleteID){
            $this->jawabanModel->delete($deleteID['id']);
        }
        
        session()->setFlashdata('editStatus', 'status berhasil diubah');
        return redirect()->to(base_url('/admin/kontrol/peserta'));
    }

    public function controlSelesai($id) {
        $this->userModel->save([
            'id' => $id,
            'status' => 'selesai',
        ]);

        session()->setFlashdata('editStatus', 'status berhasil diubah');
        return redirect()->to(base_url('/admin/kontrol/peserta'));
    }

    public function kontrol() {
        $data = [
            'title' => 'Kontrol Ujian'
        ];

        return view('admin/kontrol', $data);
    }

    public function waktu() {
        $waktu = $this->durasiModel->getData();
        $waktuMulai = date("Y-m-d\TH:i", strtotime($waktu[0]['mulai']));
        $waktuSelesai = date("Y-m-d\TH:i", strtotime($waktu[0]['selesai']));

        $data = [
            'title' => 'Waktu Ujian',
            'mulai' => $waktuMulai,
            'selesai' => $waktuSelesai,
        ];

        return view('admin/waktu', $data);
    }

    public function setWaktu() {
        $mulai = $this->request->getVar('mulai');
        $selesai = $this->request->getVar('selesai');

        $mulaiConvert = date("Y-m-d H:i:s", strtotime($mulai));
        $selesaiConvert = date("Y-m-d H:i:s", strtotime($selesai));

        $this->durasiModel->save([
            'id' => 1,
            'mulai' => $mulaiConvert,
            'selesai' => $selesaiConvert
        ]);

        session()->setFlashdata('change-time', 'Waktu Berhasil Diubah');
        return redirect()->to(base_url('/admin/kontrol/waktu'));
    }

    public function cetakSemua() {

        $user = $this->userModel->getUser();
        $soal = $this->soalModel->findAll();
        $arrayUser = [];
        foreach($user as $row){
            foreach($soal as $data){
                $jawaban = $this->jawabanModel->getDataByName($row['id']);
                foreach($jawaban as $jwb)  {
                    $arrayUser = [
                        'data' => $jwb
                    ];
                }
            }
        };
        // dd($arrayUser);
    
        $data = [
            'title' => 'Cetak',
            'user' => $this->userModel->getUser(),
            'soalJawaban' => $this->jawabanModel->getDataByName(3),
            'jmlSoal' => count($this->soalModel->findAll()),
            // 'testCetak' => $this->jawabanModel->getDataCetak()
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('admin/cetak', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('Laporan Penilaian', ['Attachment' => 0]);


        // return view('admin/cetak', $data);
    }
}