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
    public function tambahA()
    {
        return view('auth/register');
    }
    public function simpanA()
    {
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $levelId = 1;

        $data=[
            'userEmail'=> $email,
            'username'=> $username,
            'levelId'=> $levelId,
            'userPass'=> $password
        ];

        $this->modelLogin->save($data);
        return redirect()->to('listA');
    }
}