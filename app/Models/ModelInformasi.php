<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelInformasi extends Model
{
    protected $table      = 'tb_informasi';
    protected $primaryKey = 'idinformasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['namainformasi', 'fotoinformasi', 'iframe', 'artikel', 'slug'];

    public function getInformasi($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    // tampil data
    public function AllData()
    {
        return $this->db->table('tb_informasi')
            ->Get()->getResultArray();
    }

    public function getAdditionalData($limit, $offset)
    {
        return $this->db->table('tb_informasi')
            ->orderBy('idinformasi', 'DESC')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    }
}
