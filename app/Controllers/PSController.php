<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;

class PSController extends BaseController
{
    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function listPS(): string
    {
        $data['dataPS'] = $this->modelSales->getPS();
        return view('Pages/PS', $data);
    }

    public function tampilChartPS()
    {
        $tahun = $this->request->getVar('tahun');
        $dataChart = $this->modelSales->dataChartPS($tahun);
        $response = [
            'status' => true,
            'data' => $dataChart
        ];
        echo json_encode($response);
    }
}
