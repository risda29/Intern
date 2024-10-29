<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPuskesmas extends Model
{
    // tampil data
    public function AllData()
    {
        return $this->db->table('tb_profilweb')
            ->Get()->getResultArray();
    }

    // detail data
    public function DetailData($idprofilweb)
    {
        return $this->db->table('tb_profilweb')
            ->where('idprofilweb', $idprofilweb)
            ->Get()->getRowArray();
    }
}
