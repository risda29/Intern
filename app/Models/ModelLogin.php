<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table      = 'tb_user';
    protected $primaryKey = 'iduser';
    protected $allowedFields = ['username', 'pw', 'leveluser'];

    // public function getLogin($iduser = false)
    // {
    //     if ($iduser == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['iduser' => $iduser])->first();
    // }
}
