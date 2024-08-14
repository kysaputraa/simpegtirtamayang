<?php

namespace App\Controllers;

use App\Models\StatusKeluargaModel;

class StatusKeluarga extends BaseController
{
    var $StatusKeluargaModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->StatusKeluargaModel = new StatusKeluargaModel();
    }

    public function index()
    {
        $data = ['StatusKeluarga' => $this->StatusKeluargaModel->findAll(),];
        return view('menu/StatusKeluargaList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['StatusKeluarga' => $this->StatusKeluargaModel->where('id', $id)->first()];
        return view('modal/StatusKeluargaModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'kdstatuskeluarga' =>  $this->request->getPost('KdStatusKeluarga'),
            'statuskeluarga' => $this->request->getPost('StatusKeluarga'),
        ];
        $add = $this->StatusKeluargaModel->insert($data);
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
            'kdStatusKeluarga' => $this->request->getPost('KdStatusKeluarga'),
            'statuskeluarga' => $this->request->getPost('StatusKeluarga'),
        ];
        $edit = $this->StatusKeluargaModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->StatusKeluargaModel->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
