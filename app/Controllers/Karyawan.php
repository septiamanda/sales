<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Karyawan extends BaseController
{   
    protected $modelLogin;
    public function __construct()
    {
        $this->modelLogin = new ModelLogin();
    }

    public function listK(): string
    {
        $data['karyawanData'] = $this->modelLogin->getKaryawan();
        return view('Pages/listKaryawan', $data);
    }
}