<?php

namespace App\Controllers;

use App\Models\TingkatDidikModel;

class TingkatDidik extends BaseController
{
    var $TingkatDidikModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->TingkatDidikModel = new TingkatDidikModel();
    }

    public function index()
    {
        $data = ['TingkatDidik' => $this->TingkatDidikModel->findAll(),];
        return view('menu/TingkatDidikList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['TingkatDidik' => $this->TingkatDidikModel->where('id', $id)->first()];
        return view('modal/TingkatDidikModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'kdtingkatdidik' =>  $this->request->getPost('KdTingkatDidik'),
            'tingkatpendidikan' => $this->request->getPost('TingkatDidik'),
        ];
        $add = $this->TingkatDidikModel->insert($data);
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
            'kdtingkatdidik' => $this->request->getPost('KdTingkatDidik'),
            'tingkatpendidikan' => $this->request->getPost('TingkatDidik'),
        ];
        $edit = $this->TingkatDidikModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->TingkatDidikModel->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
