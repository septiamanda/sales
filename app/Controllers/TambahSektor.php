<?php

namespace App\Controllers;

use App\Models\SektorModel;
use CodeIgniter\Controller;

class TambahSektor extends BaseController
{
    protected $sektorModel;
    function __construct()
    {
        $this->sektorModel = new \App\Models\SektorModel();
    }
    public function simpanDataSektor()
    {

        // Ambil data input dari permintaan POST
        $datel = $this->request->getPost('datel');
        $namaSektor = $this->request->getPost('nama_sektor');
        $heroSektor = $this->request->getPost('hero_sektor');

        // Data yang akan disimpan ke database
        $data = [
            'datel' => $datel,
            'nama_sektor' => $namaSektor,
            'hero_sektor' => $heroSektor
        ];

        // Panggil metode pada model untuk menyimpan data
        $result = $this->sektorModel->insert($data);

        if ($result) {
            return redirect()->to('sektor')->with('success', 'Data sektor berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data sektor.');
        }

    }
}