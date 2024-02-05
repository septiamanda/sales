<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'userId';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'userId', 'username', 'userEmail', 'userPass', 'levelId'
    ];

    public function getAdmin(){
        return $this->where('levelId', 1)->findAll();
    }
    public function getKaryawan(){
        return $this->where('levelId', 2)->findAll();
    }

}
