<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'master_soal';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['soal', 'jawaban_benar', 'kategori'];

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

    public function getSoal($id = false) {
        if($id == false){
            return $this->findAll();
        }
        
        return $this->where(['id' => $id])->first();
    }

    public function getSoalJawaban($nama){
        
        $this->select('master_soal.id, master_soal.soal, master_soal.kategori, jawaban_peserta.jawaban, master_user.nama');
        $this->join('jawaban_peserta', 'master_soal.id = jawaban_peserta.id_soal', 'left');
        $this->join('master_user', 'jawaban_peserta.id_user = master_user.id', 'left');
        
        return $this->where(['master_user.nama' => $nama])->findAll();
    }
}
