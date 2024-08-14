<?php

namespace App\Controllers;

use App\Models\StatusPegawaiModel;

class StatusPegawai extends BaseController
{
    var $StatusPegawaiModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->StatusPegawaiModel = new StatusPegawaiModel();
    }

    public function index()
    {
        $data = ['StatusPegawai' => $this->StatusPegawaiModel->findAll(),];
        return view('menu/StatusPegawaiList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['StatusPegawai' => $this->StatusPegawaiModel->where('id', $id)->first()];
        return view('modal/StatusPegawaiModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'KdStatusPegawai' =>  $this->request->getPost('KdStatusPegawai'),
            'StatusPegawai' => $this->request->getPost('StatusPegawai'),
            'BuatGaji' => $this->request->getPost('BuatGaji'),
            'Persentase' => $this->request->getPost('Persentase'),
        ];
        $add = $this->StatusPegawaiModel->insert($data);
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
            'KdStatusPegawai' => $this->request->getPost('KdStatusPegawai'),
            'StatusPegawai' => $this->request->getPost('StatusPegawai'),
            'BuatGaji' => $this->request->getPost('BuatGaji'),
            'Persentase' => $this->request->getPost('Persentase'),
        ];
        $edit = $this->StatusPegawaiModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->StatusPegawaiModel->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
