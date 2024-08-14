<?php

namespace App\Controllers;

use App\Models\AgamaModel;

class Agama extends BaseController
{
    var $AgamaModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->AgamaModel = new AgamaModel();
    }

    public function index()
    {
        $data = ['agama' => $this->AgamaModel->findAll(),];
        return view('menu/agama_list', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['agama' => $this->AgamaModel->where('id', $id)->first()];
        return view('modal/agama_modal_edit', $data);
    }

    public function add()
    {
        $data = [
            'KdAgama' =>  $this->request->getPost('KdAgama'),
            'Agama' => $this->request->getPost('Agama'),
        ];
        $add = $this->AgamaModel->insert($data);
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
            'Agama' => $this->request->getPost('Agama'),
            'KdAgama' => $this->request->getPost('KdAgama'),
        ];
        $edit = $this->AgamaModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->AgamaModel->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
