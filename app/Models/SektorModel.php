<?php

namespace App\Models;

use CodeIgniter\Model;

class SektorModel extends Model
{

    protected $table = 'sektor';
    protected $primaryKey = 'id_sektor';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_datel','nama_datel','nama_sektor','hero_sektor'];

    function getAll() {
        $builder = $this->db->table('sektor');
        $builder->join('datel', 'datel.id_datel=sektor.id_sektor');
        $query = $builder->get();
        return $query->getResult();
        
    }
    // public function __construct() {
    //     parent::__construct();
    //     //$this->load->database();
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('sektor');
    // }
    public function getDatelOptions() 
    {
        return $this->db->table('datel')->get()->getResultArray();
    }
    public function deleteSektor($id_sektor)
    {
        $this->delete($id_sektor);
        session()->setFlashdata('Pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('sektor');
    }
    

}