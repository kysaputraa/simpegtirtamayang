<?php

namespace App\Controllers;

use App\Models\AktifModel;

class Aktif extends BaseController
{
    var $AktifModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->AktifModel = new AktifModel();
    }

    public function index()
    {
        $data = ['Aktif' => $this->AktifModel->findAll(),];
        return view('menu/AktifList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['Aktif' => $this->AktifModel->where('id', $id)->first()];
        return view('modal/AktifModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'KdAktif' =>  $this->request->getPost('KdAktif'),
            'Aktif' => $this->request->getPost('Aktif'),
        ];
        $add = $this->AktifModel->insert($data);
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
            'KdAktif' => $this->request->getPost('KdAktif'),
            'Aktif' => $this->request->getPost('Aktif'),
        ];
        $edit = $this->AktifModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->AktifModel->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
