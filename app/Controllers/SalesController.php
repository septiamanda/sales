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
        // var_dump($this->request->getPost()); // Check if form data is received

        $validationRules = [
            'inputNomorSC' => 'required',
            'namaPel' => 'required',
            'alamatInt' => 'required',
            'tanggal_sales' => 'required',
            'sektorsales' => 'required',
            'stosales' => 'required',
            'status' => 'required'
        ];

        // Set custom error messages
        $validationMessages = [
            'inputNomorSC' => [
                'required' => 'Kolom Nomor SC harus diisi'
            ],
            'namaPel' => [
                'required' => 'Kolom Nama Pelanggan harus diisi'
            ],
            'alamatInt' => [
                'required' => 'Kolom Alamat Instalasi harus diisi'
            ],
            'tanggal_sales' => [
                'required' => 'Kolom Tanggal Order harus diisi'
            ],
            'sektorsales' => [
                'required' => 'Kolom Sektor harus diisi'
            ],
            'stosales' => [
                'required' => 'Kolom STO harus diisi'
            ],
            'status' => [
                'required' => 'Kolom Status harus diisi'
            ]
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            // Simpan pesan-pesan kesalahan dalam session flashdata
            session()->setFlashdata('errors', $this->validator->getErrors());

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
        $id_sales = $this->request->getVar('id_sales');

        $data = [
            'id_sales' => $id_sales,
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

    public function editSales()
    {

        # code...
        $id = $this->request->getVar('id_sales');

        $nosc = $this->request->getVar('inputNomorSC');
        $namapel = $this->request->getVar('namaPel');
        $almatint = $this->request->getVar('alamatInt');
        $tanggalder = $this->request->getVar('tanggal_sales');
        $sektorles = $this->request->getVar('sektorsales');
        $stoles = $this->request->getVar('stosales');
        $status = $this->request->getVar('status');

        $data = [
            'id_sales' => $id,
            'noSC' => $nosc,
            'nama_pengguna' => $namapel,
            'alamat_instl' => $almatint,
            'tanggal_order' => $tanggalder,
            'sektor' => $sektorles,
            'sto' => $stoles,
            'status' => $status
        ];


        $successs = $this->modelSales->save($data);

        if ($successs) {
            session()->setFlashdata('success', 'Data Berhasil Diubah.');
            return redirect()->to('listSales');
        } else {
            session()->setFlashdata('gagal', 'Data tidak diubah');
            return redirect()->back()->withInput();
        }
    }
}
