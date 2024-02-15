<?php

namespace App\Models;

use CodeIgniter\Model;

class SektorModel extends Model
{

    protected $table = 'sektor';
    protected $primaryKey = 'id_sektor';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_sektor','nama_datel','nama_sektor','hero_sektor'];

    public function getSektor($id_sektor = false) 
    {   
        if($id_sektor === false){
            return $this->findAll();
        } else {
            return $this->where(['id_sektor' => $id_sektor])->first();
        }   
    }
    public function deleteSektor($id_sektor)
    {
        return $this->delete($id_sektor);
    }


}