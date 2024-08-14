<?php

namespace App\Controllers;

use App\Models\JabatanModel;

class Jabatan extends BaseController
{
    var $JabatanModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->JabatanModel = new JabatanModel();
    }

    public function index()
    {
        $data = ['Jabatan' => $this->JabatanModel->where('Aktif', 1)->orderBy('id', 'desc')->findAll(),];
        return view('menu/JabatanList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['Jabatan' => $this->JabatanModel->where('id', $id)->first()];
        return view('modal/JabatanModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'KdJabatan' =>  $this->request->getPost('KdJabatan'),
            'KdJabatan2' =>  $this->request->getPost('KdJabatan2'),
            'NamaJabatan2' =>  $this->request->getPost('NamaJabatan2'),
            'KdBagian' =>  $this->request->getPost('KdBagian'),
            'KdSeksi' =>  $this->request->getPost('KdSeksi'),
            'LevelA' =>  $this->request->getPost('LevelA'),
        ];
        $add = $this->JabatanModel->insert($data);
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
            'KdJabatan' =>  $this->request->getPost('KdJabatan'),
            'KdJabatan2' =>  $this->request->getPost('KdJabatan2'),
            'NamaJabatan2' =>  $this->request->getPost('NamaJabatan2'),
            'KdBagian' =>  $this->request->getPost('KdBagian'),
            'KdSeksi' =>  $this->request->getPost('KdSeksi'),
            'LevelA' =>  $this->request->getPost('LevelA'),
        ];
        $edit = $this->JabatanModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->JabatanModel->where('id', $id)->set('Aktif', 0)->update();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
