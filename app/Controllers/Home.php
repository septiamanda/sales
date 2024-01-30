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
}
