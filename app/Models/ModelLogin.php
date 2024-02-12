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

    public function getAdmin($id = false){
        if($id === false){
            return $this->where('levelId', 1)->findAll();
        } else{
            return $this->where(['userId'=>$id])->first();
        }
        
    }
    public function getKaryawan($id = false){
        if($id === false){
            return $this->where('levelId', 2)->findAll();
        } else{
            return $this->where(['userId'=>$id])->first();
        }
    }

    public function deleteAdmin($id)
    {
        return $this->delete($id);
    }

    public function deleteKaryawan($id)
    {
        return $this->delete($id);
    }

}
