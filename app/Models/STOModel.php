<?php

namespace App\Models;

use CodeIgniter\Model;

class STOModel extends Model
{
    // ...
    protected $table = 'sto';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'Nama_STO', 'STO', 'Hero', 'Sektor'];
    protected $useTimestaps = true;

    public function getsto()
    {
        return $this->findAll();
    }
}
