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
        $sto = $this->stoModel->findAll();

        $data = [
            'title' => 'Data Sentral Telephone Otomat',
            'sto' => $sto
        ];

        // $STOModel = new STOModel();
        

        return view('Pages/sto', $data);
    }

    public function TambahSTO(): string
    {
        return view('Pages/TambahSTO');
    }
}
