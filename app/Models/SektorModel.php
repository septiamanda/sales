<?php

namespace App\Models;

use CodeIgniter\Model;

class SektorModel extends Model
{

    protected $table = 'sektor';
    protected $primaryKey = 'id_sektor';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_sektor','nama_datel','nama_sektor'];

    public function getSektor($id = false) 
    {   
        if($id === false){
            return $this->findAll();
        } else {
            return $this->where(['id_sektor' => $id])->first();
        }   
    }
    public function deleteSektor($id_sektor)
    {
        return $this->delete($id_sektor);
    }
    
    public function search($keyword)
    {
        $query = "SELECT * FROM `sektor` WHERE
                                `nama_datel` LIKE '%$keyword%' OR
                                `nama_sektor` LIKE '%$keyword%'
                                ORDER BY `id_sektor` DESC";
        return $this->db->query($query)->getResultArray();
    }

    public function getformSektor()
    {
        return $this->findAll(); // Mengambil semua datasektor dari tabel
    }
}