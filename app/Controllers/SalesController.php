<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;

class SalesController extends BaseController
{
    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function listSales(): string
    {
        $data['salesData'] = $this->modelSales->getSales();
        return view('Pages/SALES', $data);
    }
    public function tambahSales()
    {
        return view('Pages/SALES');
    }
    public function simpanSales()
    {
        $validationRules = [
            'noSC' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'noSC' => $this->request->getPost('noSC'),
            'nama_pengguna' => $this->request->getPost('namaPel'),
            'alamat_instl' => $this->request->getPost('alamatInt'),
            'sektor' => $this->request->getPost('sektorsales'),
            'sto' => $this->request->getPost('stosales'),
            'status' => $this->request->getPost('status')
        ];

        $this->modelSales->save($data);

        session()->setFlashdata('Pesan', 'Data Berhasil Ditambahkan.');

        return redirect()->to('listSales');
    }
}
