<?php

namespace App\Controllers;

use App\Models\DepartemenModel;

class Departemen extends BaseController
{
    var $DepartemenModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->DepartemenModel = new DepartemenModel();
    }

    public function index()
    {
        $data = ['Departemen' => $this->DepartemenModel->where('Aktif', 1)->orderBy('id', 'desc')->findAll(),];
        return view('menu/DepartemenList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['Departemen' => $this->DepartemenModel->where('id', $id)->first()];
        return view('modal/DepartemenModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'KdBagian' =>  $this->request->getPost('KdBagian'),
            'Bagian' =>  $this->request->getPost('Bagian'),
            'Aktif' =>  1,
        ];
        $add = $this->DepartemenModel->insert($data);
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
            'KdBagian' =>  $this->request->getPost('KdBagian'),
            'Bagian' =>  $this->request->getPost('Bagian'),
        ];
        $edit = $this->DepartemenModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->DepartemenModel->where('id', $id)->set('Aktif', 0)->update();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
