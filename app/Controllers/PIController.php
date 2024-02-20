<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;

class PIController extends BaseController
{
    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function listPI(): string
    {
        $dataPI = $this->modelSales->getPI();
        $formattedDataPI = [];

        foreach ($dataPI as $sales) {
            $sales['tanggal_order'] = date('d/m/Y', strtotime($sales['tanggal_order']));
            $formattedDataPI[] = $sales;
        }

        $data['dataPI'] = $formattedDataPI;
        return view('Pages/PI', $data);
    }
}
