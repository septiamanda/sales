<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Pages/dashboard');
    }
    public function regis(): string
    {
        return view('auth/register');
    }
    public function dash(): string
    {
        return view('auth/login');
    }
}
