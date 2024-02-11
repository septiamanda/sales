<?php

namespace App\Controllers;

use App\Models\STOModel;

class STOController extends BaseController
{
    protected $stoModel;
    public function __construct()
    {
        $this->stoModel = new STOModel();
    }
    public function sto(): string
    {
        $data['dataSTO'] = $this->stoModel->getsto();

        return view('Pages/sto', $data);
    }

    public function TambahSTO(): string
    {
        return view('Pages/TambahSTO');
    }

    public function save()
    {
        if (!$this->validate([
            'NamaSTO' => 'required'
        ])) {
            return redirect()->to('TambahSTO');
        }
        $name = $this->request->getVar('NamaSTO');
        $sto = $this->request->getVar('STO');
        $hero = $this->request->getVar('Hero');
        $sektor = $this->request->getVar('Sektor');

        $data = [
            'Nama_STO' => $name,
            'STO' => $sto,
            'Hero' => $hero,
            'Sektor' => $sektor
        ];

        session()->setFlashdata('Pesan', 'Data Berhasil Ditambahkan.');

        $this->stoModel->save($data);
        return redirect()->to('sto');
    }

    public function edit(): string
    {
        return view('Pages/editSTO');
    }

    public function deleteSTO($id)
    {
        $this->stoModel->deleteSTO($id);
        return redirect()->to('sto');
    }
}
