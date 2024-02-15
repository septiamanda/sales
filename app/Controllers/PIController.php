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
        $data['dataPI'] = $this->modelSales->getPI();
        return view('Pages/PI', $data);
    }
}
