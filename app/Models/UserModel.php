<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'master_user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'nim', 'univ', 'email', 'password', 'token', 'status', 'waktu_mulai', 'waktu_selesai', 'login'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getUser($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getUserSelesai($id = false) {
        return $this->where(['status' => 'selesai'])->findAll();
    }

    public function getEmail($email) {
        return $this->where(['email' => $email])->first();
    }

    public function getUserByName($nama) {
        return $this->where(['nama' => $nama])->findAll();
    }

    public function getBelum(){
        return $this->where(['status' => 'belum'])->findAll();
    }
    
    public function getUjian(){
        return $this->where(['status' => 'ujian'])->findAll();
    }
    public function getSelesai(){
        return $this->where(['status' => 'selesai'])->findAll();
    }
}
