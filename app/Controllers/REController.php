<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;

class REController extends BaseController
{
    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function listRE(): string
    {
        $data['dataRE'] = $this->modelSales->getRE();
        return view('Pages/RE', $data);
    }
}
