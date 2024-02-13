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
        $idDatel = $this->request->getPost('id_datel');
        $namaSektor = $this->request->getPost('nama_sektor');
        $heroSektor = $this->request->getPost('hero_sektor');

        // Validasi input
        if (!$idDatel || !$namaSektor || !$heroSektor) {
            return redirect()->back()->withInput()->with('error', 'Semua field harus diisi.');
        }

        // Data yang akan disimpan ke database
        $data = [
            'id_datel' => $idDatel,
            'nama_sektor' => $namaSektor,
            'hero_sektor' => $heroSektor
        ];

        // Panggil metode pada model untuk menyimpan data
        try {
            $result = $this->sektorModel->insert($data);
            if ($result) {
                return redirect()->to('sektor')->with('success', 'Data sektor berhasil ditambahkan.');
            } else {
                return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data sektor.');
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data sektor.');
        }
    }
}