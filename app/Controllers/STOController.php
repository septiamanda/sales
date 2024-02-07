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
        $name = $this->request->getVar('NamaSTO');
        $sto = $this->request->getVar('STO');
        $hero = $this->request->getVar('Hero');
        $sektor = $this->request->getVar('Sektor');

        $data=[
            'Nama_STO' => $name, 
            'STO'=> $sto, 
            'Hero'=> $hero, 
            'Sektor' => $sektor
        ];

        $this->stoModel->save($data);
        return redirect()->to(base_url('sto'));

    }
}
