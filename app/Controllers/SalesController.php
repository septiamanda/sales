<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;
use App\Models\SektorModel;
use App\Models\STOModel;

class SalesController extends BaseController
{
    protected $modelSales;
    protected $modelSTO;
    protected $modelSektor;

    public function __construct()
    {
        $this->modelSales = new ModelSales();
        $this->modelSTO = new STOModel();
        $this->modelSektor = new SektorModel();
    }

    public function listSales(): string
    {
        $data['salesData'] = $this->modelSales->getSales();
        $data['sd'] = ['id_sales' => 0];

        $data['stos'] = $this->modelSTO->getformSTO();
        $data['sektors'] = $this->modelSektor->getformSektor();

        $date = $this->request->getGet('tanggal_order');

        if (!empty($date)) {
            $data = $this->modelSales->where('tanggal_order', $date)->findAll();
            return view('Pages/SALES', ['salesData' => $data]);
        }
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

        if ($status == 'RE') {
            $tanggal_order = $tanggalder;
            $tanggal_update = $tanggal_order;
        } else {
            $tanggal_order = $tanggalder;
            $tanggal_update = date('Y-m-d');
        }

        $data = [
            'id_sales' => $id_sales,
            'noSC' => $nosc,
            'nama_pengguna' => $namapel,
            'alamat_instl' => $almatint,
            'tanggal_order' => $tanggal_order,
            'tanggal_update' => $tanggal_update,
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
        // $status = $this->request->getVar('status');

        $data = [
            'id_sales' => $id,
            'noSC' => $nosc,
            'nama_pengguna' => $namapel,
            'alamat_instl' => $almatint,
            'tanggal_order' => $tanggalder,
            'sektor' => $sektorles,
            'sto' => $stoles,
            // 'status' => $status
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

    public function deleteSales($id_sales)
    {

        $successs = $this->modelSales->deleteSales($id_sales);

        if ($successs) {
            session()->setFlashdata('success', 'Data Berhasil Dihapus.');
            return redirect()->to('listSales');
        } else {
            session()->setFlashdata('gagal', 'Terdapat kesalahan dalam penghapusan data');
            return redirect()->back()->withInput();
        }
    }

    public function updateStatus($id_sales)
    {
        $newStatus = $this->request->getVar('status');

        // Update the status of the sales data
        $success = $this->modelSales->updateStatus($id_sales, $newStatus);

        if ($success) {
            // Tampilkan pesan sukses
            session()->setFlashdata('success', 'Status Data Berhasil Diperbarui.');
            return redirect()->to('listSales');
        } else {
            // Tampilkan pesan gagal
            session()->setFlashdata('gagal', 'Gagal Memperbarui Status Data.');
            return redirect()->back()->withInput();
        }
    }
    public function search()
    {
        $keyword = $this->request->getPost('carisales'); // Mengambil data dari POST

        $data['salesData'] = $this->modelSales->searchSales($keyword);

        return view('Pages/SALES', $data); // Menampilkan view dengan data hasil pencarian
    }
}
