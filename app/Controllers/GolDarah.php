<?php

namespace App\Controllers;

use App\Models\GlobalModel;
use App\Models\GolDarahModel;

class GolDarah extends BaseController
{
    var $GolDarahModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->GolDarahModel = new GolDarahModel();
    }

    public function index()
    {
        $data = ['goldarah' => $this->GolDarahModel->findAll(),];
        return view('menu/goldarah_list', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['goldarah' => $this->GolDarahModel->where('id', $id)->first()];
        return view('modal/goldarah_modal_edit', $data);
    }

    public function add()
    {
        $data = [
            'KdGolDarah' =>  $this->request->getPost('KdGolDarah'),
            'GolDarah' => $this->request->getPost('GolDarah'),
        ];
        $add = $this->GolDarahModel->insert($data);
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
            'KdGolDarah' => $this->request->getPost('KdGolDarah'),
            'GolDarah' => $this->request->getPost('GolDarah'),
        ];
        $edit = $this->GolDarahModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->GolDarahModel->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
