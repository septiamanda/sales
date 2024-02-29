<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSales extends Model
{
    protected $table = "datasales";
    protected $primaryKey = "id_sales";
    protected $useAutoIncrement = "true";
    protected $allowedFields = ['noSC', 'nama_pengguna', 'alamat_instl', 'tanggal_order', 'tanggal_update', 'sektor', 'sto', 'status'];

    public function getSales()
    {
        return $this->orderBy('tanggal_order', 'asc')->findAll();
    }

    public function getTotalSales($tahun)
    {
        if (!$tahun) {
            $tahun = date('Y');
        }

        $result = $this->db->table('datasales as ds')
            ->select('COUNT(*) as total')
            ->where('YEAR(tanggal_order)', $tahun)
            ->get()
            ->getRow();

        if ($result) {
            return $result->total;
        } else {
            return 0;
        }
    }

    public function getTotalRE($tahun)
    {
        if (!$tahun) {
            $tahun = date('Y');
        }

        $result = $this->db->table('datasales as ds')
            ->select('COUNT(*) as total')
            ->where('status', 'RE')
            ->where('YEAR(tanggal_order)', $tahun)
            ->get()
            ->getRow();

        if ($result) {
            return $result->total;
        } else {
            return 0;
        }
    }
    public function getTotalPI($tahun)
    {
        if (!$tahun) {
            $tahun = date('Y');
        }

        $result = $this->db->table('datasales as ds')
            ->select('COUNT(*) as total')
            ->where('status', 'PI')
            ->where('YEAR(tanggal_order)', $tahun)
            ->get()
            ->getRow();

        if ($result) {
            return $result->total;
        } else {
            return 0;
        }
    }
    public function getTotalPS($tahun)
    {
        if (!$tahun) {
            $tahun = date('Y');
        }

        $result = $this->db->table('datasales as ds')
            ->select('COUNT(*) as total')
            ->where('status', 'PS')
            ->where('YEAR(tanggal_order)', $tahun)
            ->get()
            ->getRow();

        if ($result) {
            return $result->total;
        } else {
            return 0;
        }
    }

    public function getSalesChart($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_update) as bulan, COUNT(*) as total')
            ->where('YEAR(tanggal_update)', $tahun)
            ->groupBy('MONTH(tanggal_update)')
            ->orderBy('MONTH(tanggal_update)')
            ->get()
            ->getResultArray();
    }

    public function dataPieSales($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('status, COUNT(*) as total')
            ->where('YEAR(tanggal_order)', $tahun)
            ->whereIn('status', ['RE', 'FCC', 'PI', 'PS'])
            ->groupBy('status')
            ->get()
            ->getResultArray();
    }


    public function getPI()
    {
        return $this->where('status', 'PI')->orderBy('tanggal_order', 'asc')->findAll();
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
        return $this->where('status', 'PS')->orderBy('tanggal_order', 'asc')->findAll();
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
        return $this->where('status', 'RE')->orderBy('tanggal_order', 'asc')->findAll();
    }

    public function getREChart($tahun)
    {
        return $this->db->table('datasales as ds')
            ->select('MONTH(tanggal_order) as bulan, COUNT(*) as total, tanggal_update')
            ->where('status', 'RE')
            ->where('YEAR(tanggal_order)', $tahun)
            ->groupBy('MONTH(tanggal_order)')
            ->orderBy('MONTH(tanggal_order)')
            ->get()
            ->getResultArray();
    }

    public function getFCC()
    {
        return $this->where('status', 'FCC')->orderBy('tanggal_order', 'asc')->findAll();
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
            // Update status and tanggal_update in datasales table
            $this->db->table('datasales')
                ->where('id_sales', $id_sales)
                ->update([
                    'status' => $newStatus,
                    'tanggal_update' => date('Y-m-d H:i:s') // Update tanggal_update
                ]);

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
