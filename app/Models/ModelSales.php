<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelSales extends Model
{
    protected $table = "datasales";
    protected $primaryKey = "id_sales";
    protected $useAutoIncrement = "true";
    protected $allowedFields = ['id_sales','noSC','nama_pengguna', 'alamat_instl', 'sektor', 'sto', 'status'];

    public function getSales()
    {
        return $this->findAll();
    }

    public function getPI()
    {
        return $this->where('status', 'PI')->findAll();
    }
}
