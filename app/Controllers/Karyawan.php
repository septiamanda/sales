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

    public function tambahK()
    {
        return view('auth/register');
    }
    public function simpanK()
    {
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $levelId = 2;

        $data=[
            'userEmail'=> $email,
            'username'=> $username,
            'levelId'=> $levelId,
            'userPass'=> $password
        ];

        $this->modelLogin->save($data);
        return redirect()->to('listK');
    }
}