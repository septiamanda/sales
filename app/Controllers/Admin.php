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

        $existingUser = $this->modelLogin->where('userEmail', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar.');
        }

        $levelId = 1;

        $data = [
            'userEmail' => $email,
            'username' => $username,
            'levelId' => $levelId,
            'userPass' => $password
        ];

        $this->modelLogin->save($data);
        return redirect()->to('listA');
    }


    public function editA($id)
    {
        $data['adminData'] = $this->modelLogin->getAdmin($id);
        return view('auth/edit', $data);
    }

    public function updateA()
    {
        $id = $this->request->getVar('kode');
        $email = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $userData = $this->modelLogin->find($id);

        if (!empty($password)) {
            $data = [
                'userId' => $id,
                'userEmail' => $email,
                'username' => $username,
                'userPass' => $password
            ];
        } else {
            $data = [
                'userId' => $id,
                'userEmail' => $email,
                'username' => $username,
                'userPass' => $userData['userPass']
            ];
        }

        $this->modelLogin->save($data);
        return redirect()->to('listA');
    }
}
