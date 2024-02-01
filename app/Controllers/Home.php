<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function sto(): string
    {
        return view('Pages/STO');
    }
    public function index(): string
    {
        return view('Pages/dashboard');
    }
    public function regis(): string
    {
        return view('auth/register');
    }
    public function login(): string
    {
        return view('auth/login');
    }
    public function sektor(): string
    {
        return view('Pages/sektor');
    }
}
