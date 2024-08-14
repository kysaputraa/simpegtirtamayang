<?php

namespace App\Controllers;

use App\Models\BerkalaModel;
use App\Models\GolonganModel;
use App\Models\KenaikanPangkatModel;

class Berkala extends BaseController
{

    var $BerkalaModel;
    var $GolonganModel;
    var $KenaikanPangkatModel;

    public function __construct()
    {

        $this->BerkalaModel = new BerkalaModel();
        $this->GolonganModel = new GolonganModel();
        $this->KenaikanPangkatModel = new KenaikanPangkatModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $KenaikanPangkat = $this->KenaikanPangkatModel->findAll();
        $Golongan = $this->GolonganModel->findAll();
        $data = [
            'Berkala' => $this->BerkalaModel->getBerkala()->getResult(),
            'KenaikanPangkat' => $KenaikanPangkat,
            'Golongan' => $Golongan,
        ];
        return view('menu/BerkalaList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['Berkala' => $this->BerkalaModel->where('id', $id)->first()];
        return view('modal/BerkalaModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'NIK' =>  $this->request->getPost('NIK'),
            'NoIDKepangkatan' =>  $this->request->getPost('NoIDKepangkatan'),
            'KdKenaikanPangkat' =>  $this->request->getPost('KdKenaikanPangkat'),
            'KdGolBaru' =>  $this->request->getPost('KdGolBaru'),
            'NoSKBaru' =>  $this->request->getPost('NoSKBaru'),
            'TglSKBaru' =>  $this->request->getPost('TglSKBaru'),
            'TMTBaru' =>  $this->request->getPost('TMTBaru'),
            'Keterangan' =>  $this->request->getPost('Keterangan'),
        ];
        $add = $this->BerkalaModel->insert($data);
        if ($add) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function edit()
    {
        $id = $this->request->getPost('id');
        $data = [
            'NIK' =>  $this->request->getPost('NIK'),
            'NoIDKepangkatan' =>  $this->request->getPost('NoIDKepangkatan'),
            'KdKenaikanPangkat' =>  $this->request->getPost('KdKenaikanPangkat'),
            'KdGolBaru' =>  $this->request->getPost('KdGolBaru'),
            'NoSKBaru' =>  $this->request->getPost('NoSKBaru'),
            'TglSKBaru' =>  $this->request->getPost('TglSKBaru'),
            'TMTBaru' =>  $this->request->getPost('TMTBaru'),
            'Keterangan' =>  $this->request->getPost('Keterangan'),
        ];
        $edit = $this->BerkalaModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->BerkalaModel->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function modal()
    {
        $NIK = $this->request->getPost('NIK');
        $berkala = $this->BerkalaModel->where('NIK', $NIK)->findAll();
        $data = [
            'berkala' => $berkala,
        ];
        return view('modal/berkala_modal_list', $data);
    }
}
