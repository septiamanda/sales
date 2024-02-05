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

}
