<?php

namespace App\Controllers;

use App\Models\SektorModel;
use CodeIgniter\Controller;

class Sektor extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new SektorModel();
    }

    public function index()
    {
        $data = [];
        if ($this->request->getPost('keyword')) {
            $data['sektor'] = $this->model->cariDataSektor();
        }
        return view('Pages/sektor', $data);
    }

    public function tambahDataSektor()
    {
        return view('Pages/tambahDataSektor');
    }

    public function editSektor($id_sektor)
    {
        $data['sektor'] = $this->model->find($id_sektor);
        return view('Pages/editSektor', $data);
    }

    public function deleteSektor($id_sektor)
    {
        $this->model->delete($id_sektor);
        return redirect()->to(base_url('sektor'));
    }
}
