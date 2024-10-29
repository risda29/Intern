<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProfilweb extends Model
{
    protected $table      = 'tb_profilweb';
    protected $primaryKey = 'idprofilweb';
    protected $allowedFields = ['judulprofilweb', 'fotoprofilweb',  'slug'];

    public function getProfilweb($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
