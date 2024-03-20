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
        
        $datel = $this->request->getVar('Datel');
        $sektor = $this->request->getVar('Sektor');
        $sto = $this->request->getVar('STO');

        $data = [
            'Datel' => $datel,
            'Sektor' => $sektor,
            'STO' => $sto
        ];

        session()->setFlashdata('Pesan', 'Data Berhasil Ditambahkan.');

        $this->stoModel->save($data);
        return redirect()->to('sto');
    }

    public function editSTO($id)
    {
        $data['stoModel'] = $this->stoModel->getsto($id);
        return view('Pages/editSTO', $data);
    }

    public function deleteSTO($id)
    {
        $this->stoModel->deleteSTO($id);
        session()->setFlashdata('Pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('sto');
    }

    public function updateSTO()
    {
        $id = $this->request->getVar('kode');
        $datel = $this->request->getVar('Datel');
        $sektor = $this->request->getVar('Sektor');
        $sto = $this->request->getVar('STO');

        $data = [
            'id' => $id,
            'Datel' => $datel,
            'Sektor' => $sektor,
            'STO' => $sto
        ];

        session()->setFlashdata('Pesan', 'Data Berhasil Di Update.');

        $this->stoModel->save($data);
        return redirect()->to('sto');
    }
}
