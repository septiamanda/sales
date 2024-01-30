<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('auth/login');
    }
    public function regis(): string
    {
        return view('auth/register');
    }
    public function dash(): string
    {
        return view('user/index');
    }
}
