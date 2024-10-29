<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelayanan extends Model
{
    protected $table      = 'tb_pelayanan';
    protected $primaryKey = 'idpelayanan';
    protected $allowedFields = ['namapelayanan', 'fotopelayanan', 'slug'];

    public function getPelayanan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
