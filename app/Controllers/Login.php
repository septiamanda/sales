<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLogin;

class Login extends BaseController
{

    public function login(): string
    {
        return view('auth/login');
    }

    public function cekUser()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ]);

        if (!$valid) {
            $sessError = [
                'errEmail' => $validation->getError('email'),
                'errPassword' => $validation->getError('password')
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('login'));
        } else {
            $modelLogin = new ModelLogin();
            $cekUserLogin = $modelLogin->where('userEmail', $email)->first();

            if ($cekUserLogin == null) {
                $sessError = [
                    'errEmail' => 'Maaf email tidak terdaftar',
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login'));
            } else {
                $passwordUser = $cekUserLogin['userPass'];

                if ($password === $passwordUser) {
                    $idLevel = $cekUserLogin['levelId'];

                    $simpan_session = [
                        'email' => $email,
                        'username' => $cekUserLogin['username'],
                        'levelId' => $idLevel,
                    ];
                    session()->set($simpan_session);
                    return redirect()->to(site_url('dashboard'));
                } else {
                    $sessError = [
                        'errPassword' => 'Maaf password salah',
                    ];

                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('login'));
                }
            }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}
