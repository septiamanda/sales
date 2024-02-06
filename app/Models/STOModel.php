<?php

namespace App\Models;

use CodeIgniter\Model;

class STOModel extends Model
{
    // ...
    protected $table = 'sto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Nama_STO', 'STO', 'PenanggungJawab', 'Sektor_Hero'];
    protected $useTimestaps = true;
}
