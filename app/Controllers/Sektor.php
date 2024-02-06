<?php

namespace App\Controllers;

use App\Models\SektorModel;
use App\Controllers\BaseController;
use CodeIgniter\Controller;

class Sektor extends BaseController
{
    function __construct()
    {
        $this->model = new \App\Models\SektorModel();
    }
    public function index()
    {
        return view('Pages/sektor');
    }

    public function tambahDataSektor(): string
    {
        return view('Pages/tambahDataSektor');
    }
}