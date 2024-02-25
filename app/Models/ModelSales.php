<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSales extends Model
{
    protected $table = "datasales";
    protected $primaryKey = "id_sales";
    protected $useAutoIncrement = "true";
    protected $allowedFields = ['noSC', 'nama_pengguna', 'alamat_instl', 'tanggal_order', 'sektor', 'sto', 'status'];

    public function getSales()
    {
        return $this->findAll();
    }

    public function dataPieSales($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_order) as bulan, COUNT(*) as total')
            ->where('YEAR(tanggal_order)', $tahun)
            ->groupBy('MONTH(tanggal_order)')
            ->orderBy('MONTH(tanggal_order)')
            ->get()
            ->getResultArray();
    }

    public function getPI()
    {
        return $this->where('status', 'PI')->orderBy('tanggal_order', 'ASC')->findAll();
    }

    public function dataChartPI($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_order) as bulan, COUNT(*) as total')
            ->where('status', 'PI')
            ->where('YEAR(tanggal_order)', $tahun)
            ->groupBy('MONTH(tanggal_order)')
            ->orderBy('MONTH(tanggal_order)')
            ->get()
            ->getResultArray();
    }

    public function getPS()
    {
        return $this->where('status', 'PS')->orderBy('tanggal_order', 'ASC')->findAll();
    }

    public function dataChartPS($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_order) as bulan, COUNT(*) as total')
            ->where('status', 'PS')
            ->where('YEAR(tanggal_order)', $tahun)
            ->groupBy('MONTH(tanggal_order)')
            ->orderBy('MONTH(tanggal_order)')
            ->get()
            ->getResultArray();
    }

    public function getRE()
    {
        return $this->where('status', 'RE')->findAll();
    }

    public function getREChart($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_order) as bulan, COUNT(*) as total')
            ->where('status', 'RE')
            ->where('YEAR(tanggal_order)', $tahun)
            ->groupBy('MONTH(tanggal_order)')
            ->orderBy('MONTH(tanggal_order)')
            ->get()
            ->getResultArray();
    }

    public function getFCC()
    {
        return $this->where('status', 'FCC')->findAll();
    }

    public function getFCCChart($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_order) as bulan, COUNT(*) as total')
            ->where('status', 'FCC')
            ->where('YEAR(tanggal_order)', $tahun)
            ->groupBy('MONTH(tanggal_order)')
            ->orderBy('MONTH(tanggal_order)')
            ->get()
            ->getResultArray();
    }


}
