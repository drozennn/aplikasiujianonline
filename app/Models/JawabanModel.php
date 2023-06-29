<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jawaban_peserta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['jawaban', 'id_soal', 'id_user'];

    // Dates
    protected $useTimestamps = false;
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


    public function getData($id = false) {
        if ($id == false){
            $this->select('jawaban_peserta.*,master_soal.soal,master_user.nama');
            $this->join('master_soal', 'master_soal.id = id_soal');
            $this->join('master_user', 'master_user.id = id_user');
            return $this->findAll();
        }
        
        $this->select('jawaban_peserta.*,master_soal.soal,master_user.nama');
        $this->join('master_soal', 'master_soal.id = id_soal');
        $this->join('master_user', 'master_user.id = id_user');
        return $this->where(['id' => $id])->first();
    }

    public function getDataByName($id) {
        $this->select('jawaban_peserta.*,master_soal.soal,master_user.nama');
        $this->join('master_soal', 'master_soal.id = id_soal');
        $this->join('master_user', 'master_user.id = id_user');
        return $this->where(['id_user' => $id])->findAll();
    }

    public function getDataCetak() {
        $this->select('jawaban_peserta.*, master_user.email, master_user.univ, master_user.nim, master_user.waktu_mulai, master_user.waktu_selesai');
        $this->join('master_user', 'jawaban_peserta.id_user = master_user.id');
        // $results = $query->get()->getResult();

        return $this->findAll();

    }
}
