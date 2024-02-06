<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelSales extends Model
{
    protected $table = "data sales";
    protected $primaryKey = "noSC";
    protected $allowedFields = ['nama_pengguna', 'alamat_instl', 'sektor', 'sto', 'status'];
}
?>