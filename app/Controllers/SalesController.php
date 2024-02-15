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

    public function simpanSales()
    {
        var_dump($this->request->getPost()); // Check if form data is received

        $validationRules = [
            'inputNomorSC' => 'required',
            'namaPel' => 'required',
            'alamatInt' => 'required',
            'tanggal_sales'=>'required',
            'sektorsales' => 'required',
            'stosales' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($validationRules)) {

            $validationErrors = $this->validator->getErrors();
            // Simpan pesan-pesan kesalahan dalam session flashdata
            session()->setFlashdata('errors', $validationErrors);

            // Kembali ke halaman sebelumnya dengan data input yang dikirim
            return redirect()->back()->withInput();
        }

        $nosc = $this->request->getVar('inputNomorSC');
        $namapel = $this->request->getVar('namaPel');
        $almatint = $this->request->getVar('alamatInt');
        $tanggalder = $this->request->getVar('tanggal_sales');
        $sektorles = $this->request->getVar('sektorsales');
        $stoles = $this->request->getVar('stosales');
        $status = $this->request->getVar('status');

        $data = [
            'noSC' => $nosc,
            'nama_pengguna' => $namapel,
            'alamat_instl' => $almatint,
            'tanggal_order' => $tanggalder,
            'sektor' => $sektorles,
            'sto' => $stoles,
            'status' => $status
        ];

        $this->modelSales->save($data);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan.');

        return redirect()->to('listSales');
    }
}
