<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\GlobalModel;

class Arsip extends BaseController
{

    var $ArsipModel;
    var $GlobalModel;

    public function __construct()
    {

        $this->ArsipModel = new ArsipModel();
        $this->GlobalModel = new GlobalModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'Arsip' => $this->ArsipModel->getArsip()->getResult(),
        ];
        return view('menu/ArsipList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = ['Arsip' => $this->ArsipModel->where('id', $id)->first()];
        return view('modal/ArsipModalEdit', $data);
    }

    public function add()
    {
        $NIK = $this->request->getPost('NIK');
        $data = [
            'NIK' => $NIK,
            'nama' => $this->request->getPost('nama'),
            'createdAt' => date('Y-m-d H:i:s'),
            'createdBy' => session()->get('username'),
            'status' => 'aktif'
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        $insert = $this->ArsipModel->insert($data);
        if ($insert) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penambahan Data Pendidikan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $NIK . '/arsip/', $filename);
            }
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function edit()
    {
        $id = $this->request->getPost('id');
        $arsip = $this->ArsipModel->where('id', $id)->first();
        $data = [
            'nama' =>  $this->request->getPost('nama'),
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        $edit = $this->ArsipModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Edit Data Arsip', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $arsip->NIK . '/arsip/', $filename);
                if (file_exists(ROOTPATH . 'public/uploads/' . $arsip->NIK . '/arsip/' . $arsip->file)) {
                    unlink(ROOTPATH . 'public/uploads/' . $arsip->NIK . '/arsip/' . $arsip->file);
                }
            }
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $arsip = $this->ArsipModel->where('id', $id)->first();
        $delete = $this->ArsipModel->where('id', $id)->delete();
        if ($delete) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penghapusan Data Arsip', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if (file_exists(ROOTPATH . 'public/uploads/' . $arsip->NIK . '/arsip/' . $arsip->file)) {
                unlink(ROOTPATH . 'public/uploads/' . $arsip->NIK . '/arsip/' . $arsip->file);
            }
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function modal()
    {
        $NIK = $this->request->getPost('NIK');
        $Arsip = $this->ArsipModel->where('NIK', $NIK)->findAll();
        $data = [
            'Arsip' => $Arsip,
        ];
        return view('modal/Arsip_modal_list', $data);
    }
}
