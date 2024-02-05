<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Admin extends BaseController
{   
    protected $modelLogin;
    public function __construct()
    {
        $this->modelLogin = new ModelLogin();
    }

    public function listA(): string
    {
        $data['adminData'] = $this->modelLogin->getAdmin();
        return view('Pages/listAdmin', $data);
    }
}