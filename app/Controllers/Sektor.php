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

    public function cari()
    {
        $cari = $this->request->getVar('cari');

        if ($cari) {
            $data['sektor'] = $this->modelSektor->search($cari);
        } else {
            $data['sektor'] = $this->modelSektor->getSektor();
        }

        return view('Pages/sektor', $data);
    }

    public function tambahDataSektor()
    {
        return view('Pages/tambahDataSektor');
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama_datel' => 'required'
        ])) {
            return redirect()->to('tambahDataSektor');
        }

        $nama_datel = $this->request->getVar('nama_datel');
        $nama_sektor = $this->request->getVar('nama_sektor');

        $data = [
            'nama_datel'=>$nama_datel,
            'nama_sektor'=>$nama_sektor
        ];

        session()->setFlashdata('Pesan', 'Data Berhasil Ditambahkan');
    
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

        $data = [
            'nama_datel'=>$nama_datel,
            'nama_sektor'=>$nama_sektor
        ];

        $this->modelSektor->update($id_sektor, $data);

        session()->setFlashdata('Pesan', 'Data Berhasil Diperbarui');

        return redirect()->to('sektor');
    }

    public function deleteSektor($id_sektor)
    {
        $this->modelSektor->deleteSektor($id_sektor);

        session()->setFlashdata('Pesan', 'Data Berhasil Dihapus');

        return redirect()->to('sektor');
    }

}