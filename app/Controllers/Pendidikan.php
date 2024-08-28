<?php

namespace App\Controllers;

use App\Models\GlobalModel;
use App\Models\PendidikanModel;
use App\Models\PegawaiModel;
use App\Models\TingkatDidikModel;

class Pendidikan extends BaseController
{
    var $PendidikanModel;
    var $GlobalModel;
    var $PegawaiModel;
    var $TingkatDidik;

    public function __construct()
    {
        $this->PendidikanModel = new PendidikanModel();
        $this->GlobalModel = new GlobalModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->TingkatDidik = new TingkatDidikModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'Pendidikan' => $this->PendidikanModel->getPendidikanAll()->getResult(),
            'tingkatdidik' => $this->TingkatDidik->findAll(),
        ];
        return view('menu/PendidikanList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $pendidikan = $this->PendidikanModel->where('id', $id)->first();
        $tingkatdidik = $this->GlobalModel->getTingkatDidik()->getResult();
        $data = ['pendidikan' => $pendidikan, 'tingkatdidik' => $tingkatdidik];
        return view('modal/pendidikan_modal_edit', $data);
    }

    public function add()
    {
        $NIK = $this->request->getPost('NIK');
        $data = [
            'NIK' => $NIK,
            'NoPendidikan' => $this->request->getPost('NoPendidikan'),
            'NamaSekolah' => $this->request->getPost('NamaSekolah'),
            'KdTingkatDidik' => $this->request->getPost('KdTingkatDidik'),
            'TempatLulus' => $this->request->getPost('TempatLulus'),
            'TahunLulus' => $this->request->getPost('TahunLulus'),
            'NoIjazah' => $this->request->getPost('NoIjazah'),
            'Keterangan' => $this->request->getPost('Keterangan'),
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        $insert = $this->PendidikanModel->insert($data);
        if ($insert) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penambahan Data Pendidikan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $NIK . '/pendidikan/', $filename);
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
        $pendidikan = $this->PendidikanModel->where('id', $id)->first();
        $data = [
            'NoPendidikan' => $this->request->getPost('NoPendidikan'),
            'NamaSekolah' => $this->request->getPost('NamaSekolah'),
            'KdTingkatDidik' => $this->request->getPost('KdTingkatDidik'),
            'TempatLulus' => $this->request->getPost('TempatLulus'),
            'TahunLulus' => $this->request->getPost('TahunLulus'),
            'NoIjazah' => $this->request->getPost('NoIjazah'),
            'Keterangan' => $this->request->getPost('Keterangan'),
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        $update = $this->PendidikanModel->set($data)->where('id', $id)->update();
        if ($update) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Edit Data Pendidikan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $pendidikan->NIK . '/pendidikan/', $filename);
                if (file_exists(ROOTPATH . 'public/uploads/' . $pendidikan->NIK . '/pendidikan/' . $pendidikan->file)) {
                    unlink(ROOTPATH . 'public/uploads/' . $pendidikan->NIK . '/pendidikan/' . $pendidikan->file);
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
        $pendidikan = $this->PendidikanModel->where('id', $id)->first();
        $query = $this->PendidikanModel->where('id', $id)->delete();
        if ($query) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penghapusan Data Pendidikan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if (file_exists(ROOTPATH . 'public/uploads/' . $pendidikan->NIK . '/pendidikan/' . $pendidikan->file)) {
                unlink(ROOTPATH . 'public/uploads/' . $pendidikan->NIK . '/pendidikan/' . $pendidikan->file);
            }
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function setpendidikanakhir()
    {
        $KdTingkatPendidikan = $this->request->getPost('KdTingkatPendidikan');
        $NIK = $this->request->getPost('NIK');
        $update = $this->PegawaiModel->set('KdPendidikan', $KdTingkatPendidikan)->where('NIK', $NIK)->update();
        if ($update) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Pergantian data pendidikan terakhir', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            return "1";
        } else {
            return "0";
        }
    }
}
