<?php

namespace App\Models;

use CodeIgniter\Model;

class STOModel extends Model
{
    // ...
    protected $table = 'sto';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'Datel', 'Sektor', 'STO'];
    protected $useTimestaps = true;

    public function getsto($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }

    public function deleteSTO($id)
    {
        return $this->delete($id);
    }
}
