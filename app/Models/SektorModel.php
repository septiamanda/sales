<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class SektorModel extends Model
{
    protected $table = 'sektor';
    protected $primaryKey = 'id_sektor';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['datel','nama_sektor','pj_sektor'];
    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('sektor');
    }

    // public function getSektorById($id_sektor)
    // {
    //     return $this->find($id_sektor);
    // }
    // public function getSektorByDatel($datel)
    // {
    //     return $this->where('datel', $datel)->first();
    // }
}