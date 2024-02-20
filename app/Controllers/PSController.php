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
        $dataPS = $this->modelSales->getPS();
        $formattedDataPS = [];

        foreach ($dataPS as $sales) {
            $sales['tanggal_order'] = date('d/m/Y', strtotime($sales['tanggal_order']));
            $formattedDataPS[] = $sales;
        }

        $data['dataPS'] = $formattedDataPS;
        return view('Pages/PS', $data);
    }
}
