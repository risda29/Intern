<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengaduan extends Model
{
    protected $table      = 'tb_pengaduan';
    protected $primaryKey = 'idpengaduan';
    protected $useTimestamps = true;
    protected $allowedFields = ['judulpengaduan', 'isipengaduan',  'idpoli', 'status'];

    public function getPengaduan($idpengaduan = false)
    {
        if ($idpengaduan == false) {
            return $this->findAll();
        }

        return $this->db->table('tb_pengaduan')
            ->join('tb_poli', 'tb_poli.idpoli=tb_pengaduan.idpoli', 'left')
            ->where(['idpengaduan' => $idpengaduan])
            ->get()
            ->getRowArray();
    }

    public function AllData()
    {
        return $this->db->table('tb_pengaduan')
            ->join('tb_poli', 'tb_poli.idpoli=tb_pengaduan.idpoli', 'left')
            ->Get()->getResultArray();
    }

    public function AllPoli()
    {
        return $this->db->table('tb_poli')
            ->Get()->getResultArray();
    }
}
