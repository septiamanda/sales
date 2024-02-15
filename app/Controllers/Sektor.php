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
    public function sektor()
    {
        $data ['sektor'] = $this->modelSektor->getSektor();
        return view('Pages/sektor', $data);
    }

    public function tambahDataSektor()
    {
        return view('Pages/tambahDataSektor');
    }

    public function simpan()
    {
        $nama_datel = $this->request->getVar('nama_datel');
        $nama_sektor = $this->request->getVar('nama_sektor');
        $hero_sektor = $this->request->getVar('hero_sektor');

        $data = [
            'nama_datel'=>$nama_datel,
            'nama_sektor'=>$nama_sektor,
            'hero_sektor'=>$hero_sektor
        ];

        $this->modelSektor->save($data);
        return redirect()->to('sektor');
    }
    public function editSektor ($id_sektor)
    {
        $data['modelSektor'] = $this->modelSektor->getSektor($id_sektor);
        return view('Pages/editSektor', $data);
    }

    public function updateSektor()
    {
        $id_sektor = $this->request->getVar('kode_sektor');
        $nama_datel = $this->request->getVar('nama_datel');
        $nama_sektor = $this->request->getVar('nama_sektor');
        $hero_sektor = $this->request->getVar('hero_sektor');

        $data = [
            'id_sektor'=>$id_sektor,
            'nama_datel'=>$nama_datel,
            'nama_sektor'=>$nama_sektor,
            'hero_sektor'=>$hero_sektor
        ];

        $this->modelSektor->save($data);
        return redirect()->to('/Sektor'); 
    }

    public function deleteSektor($id_sektor)
    {
        $this->modelSektor->deleteSektor($id_sektor);
        return redirect()->to('sektor');
    }

}