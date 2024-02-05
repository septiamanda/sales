<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterKaryawan implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->levelId == '') {
            return redirect()->to(site_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->levelId == 2) {
            return redirect()->to(site_url('dashboard'));
        }
    }
}