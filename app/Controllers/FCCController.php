<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;

class FCCController extends BaseController
{
    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function listFCC(): string
    {
        $data['dataFCC'] = $this->modelSales->getFCC();
        return view('Pages/FCC', $data);
    }

    public function tampilChartFCC()
    {
        $tahun = $this->request->getVar('tahun');
        $dataChart = $this->modelSales->getFCCChart($tahun);
        $response = [
            'status' => true,
            'data' => $dataChart
        ];
        echo json_encode($response);
    }
}
