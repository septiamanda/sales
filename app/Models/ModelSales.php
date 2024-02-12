<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelSales extends Model
{
    protected $table = "data sales";
    protected $primaryKey = "id_sales";
    protected $allowedFields = ['id_sales','noSC','nama_pengguna', 'alamat_instl', 'sektor', 'sto', 'status'];

    public function getSales()
    {
        return $this->findAll();
    }
}
