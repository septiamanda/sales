<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;
use App\Models\ModelSales;

class Admin extends BaseController
{   
    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function listSales(): string
    {
        $data['salesData'] = $this->modelSales->getSales();
        return view('Pages/SALES', $data);
    }
    public function tambahSales()
    {
        return view('Pages/SALES');
    }
    public function simpanSales()
    {
        
    }
}