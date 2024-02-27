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

    public function getSalesChart($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_order) as bulan, COUNT(*) as total')
            ->where('YEAR(tanggal_order)', $tahun)
            ->groupBy('MONTH(tanggal_order)')
            ->orderBy('MONTH(tanggal_order)')
            ->get()
            ->getResultArray();
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

    public function deleteSales($id_sales)
    {
        return $this->delete($id_sales);
    }

    public function moveToHistorical($id_sales)
    {
        // Get the sales data to be moved
        $salesData = $this->find($id_sales);

        // Create historical data
        $historicalData = [
            'id_sales' => $salesData['id_sales'],
            'noSC' => $salesData['noSC'],
            'nama_pengguna' => $salesData['nama_pengguna'],
            'alamat_instl' => $salesData['alamat_instl'],
            'tanggal_order' => $salesData['tanggal_order'],
            'sektor' => $salesData['sektor'],
            'sto' => $salesData['sto'],
            'status' => $salesData['status'] // Status dari tabel sales
        ];

        // Insert historical data into historical sales table
        $this->db->table('histori_sales')->insert($historicalData);

        // Delete the data from sales table
        $this->delete($id_sales);
    }

    public function getStatus($id_sales)
    {
        // Get the status of the sales data based on ID
        $salesData = $this->find($id_sales);

        // Check if sales data exists
        if ($salesData) {
            // Return the status
            return $salesData['status'];
        } else {
            // Return null if sales data not found
            return null;
        }
    }

    public function updateStatus($id_sales, $newStatus)
    {
        $success = false;

        // Begin transaction
        $this->db->transBegin();

        try {
            // Update status in datasales table
            $this->db->table('datasales')
                ->where('id_sales', $id_sales)
                ->update(['status' => $newStatus]);

            // Get the updated data
            $updatedData = $this->find($id_sales);

            // Insert the updated data into historical_sales table
            $this->db->table('historical_sales')->insert($updatedData);

            // Commit transaction
            $this->db->transCommit();

            $success = true;
        } catch (\Exception $e) {
            // Rollback transaction if any error occurs
            $this->db->transRollback();
            log_message('error', $e->getMessage());
        }

        return $success;
    }
}
