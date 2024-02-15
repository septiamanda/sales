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

        $existingUser = $this->modelLogin->where('userEmail', $email)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->with('error', 'Email sudah terdaftar.');
        }

        $levelId = 2;

        $data = [
            'userEmail' => $email,
            'username' => $username,
            'levelId' => $levelId,
            'userPass' => $password
        ];

        session()->setFlashdata('Pesan', 'Akun Berhasil Ditambahkan.');

        $this->modelLogin->save($data);
        return redirect()->to('listK');
    }

    public function editK($id)
    {
        $data['karyawanData'] = $this->modelLogin->getKaryawan($id);
        return view('auth/edit', $data);
    }

    public function updateK()
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

        session()->setFlashdata('Pesan', ' Akun Berhasil Di Update.');

        $this->modelLogin->save($data);
        return redirect()->to('listK');
    }

    public function deleteKaryawan($id)
    {
        $this->modelLogin->deleteKaryawan($id);
        session()->setFlashdata('Pesan', 'Akun Berhasil Dihapus.');
        return redirect()->to('listK');
    }
}
