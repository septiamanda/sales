<?php

namespace App\Controllers;

use App\Models\SektorModel;

class Sektor extends BaseController
{
    protected $modelSektor;

    public function __construct()
    {
        $this->modelSektor = new SektorModel();
    }

    public function sektor(): string
    {
        $data['dataSektor'] = $this->modelSektor->getsektor();

        return view('Pages/sektor', $data);
    }

    public function index()
    {
        $data = [];
        if ($keyword = $this->request->getPost('keyword')) {
            $data['sektor'] = $this->modelSektor->searchByKeyword($keyword);
        } else {
            $data['sektor'] = $this->modelSektor->findAllWithDatel();
        }
        return view('Pages/sektor', $data);
    }

    public function tambahDataSektor()
    {
        $data['datelOptions'] = $this->modelSektor->getDatelOptions();
        return view('Pages/tambahDataSektor', $data);
    }

    public function editSektor($id_sektor)
    {
        $data['sektor'] = $this->modelSektor->find($id_sektor);
        return view('Pages/editSektor', $data);
    }

    public function deleteSektor($id_sektor)
    {
        $this->modelSektor->deleteSektor($id_sektor);
        session()->setFlashdata('Pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('sektor'));
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
            $this->modelSektor->save($data);
            session()->setFlashdata('Pesan', 'Data Berhasil Ditambahkan.');
            return redirect()->to(base_url('sektor'))->with('success', 'Data Berhasil Ditambahkan.');
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data Sektor');
        }
    }
}
