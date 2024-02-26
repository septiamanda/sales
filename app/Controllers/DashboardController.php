<?php

namespace App\Controllers;

use App\Models\ModelSales;

class DashboardController extends BaseController
{

    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function index(): string
    {
        return view('Pages/dashboard');
    }

    public function tampilChartSales()
    {
        $tahun = date('Y');
        $dataChart = $this->modelSales->getSalesChart($tahun);
        $response = [
            'status' => true,
            'data' => $dataChart
        ];
        echo json_encode($response);
    }

    public function tampilPieSales()
    {
        $tahun = date('Y');
        $dataChart = $this->modelSales->dataPieSales($tahun);
        $response = [
            'status' => true,
            'data' => $dataChart
        ];
        echo json_encode($response);
    }
}
