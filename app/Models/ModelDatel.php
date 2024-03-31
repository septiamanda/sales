<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDatel extends Model
{
    // ...
    protected $table = 'datel';
    protected $primaryKey = 'id_datel';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_datel', 'nama_datel', 'kota', 'provinsi'];

    public function getDatel()
    {
        return $this->findAll(); // Mengambil semua data STO dari tabel
    }
}
