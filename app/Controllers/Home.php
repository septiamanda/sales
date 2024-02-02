<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function re(): string
    {
        return view('Pages/RE');
    }
    public function fcc(): string
    {
        return view('Pages/FCC');
    }
    public function pi(): string
    {
        return view('Pages/PI');
    }
    public function ps(): string
    {
        return view('Pages/PS');
    }
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
    public function laporan(): string
    {
        return view('Pages/laporan');
    }
    public function listA(): string
    {
        return view('Pages/listAdmin');
    }
    public function listK(): string
    {
        return view('Pages/listKaryawan');
    }
}
