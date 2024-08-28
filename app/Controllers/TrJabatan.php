<?php

namespace App\Controllers;

use App\Models\GlobalModel;
use App\Models\TrJabatanModel;
use App\Models\GolonganModel;
use App\Models\JabatanModel;
use App\Models\KenaikanPangkatModel;
use App\Models\PegawaiModel;

class TrJabatan extends BaseController
{

    var $TrJabatanModel;
    var $JabatanModel;
    var $GlobalModel;
    var $PegawaiModel;

    public function __construct()
    {

        $this->TrJabatanModel = new TrJabatanModel();
        $this->JabatanModel = new JabatanModel();
        $this->GlobalModel = new GlobalModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $jabatan = $this->JabatanModel->findAll();
        $data = [
            'TrJabatan' => $this->TrJabatanModel->getJabatan()->getResult(),
            'jabatan' => $jabatan,
        ];
        return view('menu/TrJabatanList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $data = [
            'TrJabatan' => $this->TrJabatanModel->where('id', $id)->first(),
            'jabatan' => $this->JabatanModel->findAll(),
        ];
        return view('modal/TrJabatanModalEdit', $data);
    }

    public function add()
    {
        $NIK = $this->request->getPost('NIK');
        $idjabatan = $this->request->getPost('KdJabatanBaru');
        $jabatan = $this->JabatanModel->where('id', $idjabatan)->first();
        $data = [
            'NIK' => $NIK,
            'NoJabatan' =>  $this->request->getPost('NoJabatan'),
            'NoSK' =>  $this->request->getPost('NoSK'),
            'TglSK' =>  $this->request->getPost('TglSK'),
            'TMT' =>  $this->request->getPost('TMT'),
            'Keterangan' =>  $this->request->getPost('Keterangan'),
            'KdJabatanBaru' =>  $jabatan->KdJabatan,
            'KdJabatanBaru2' =>  $jabatan->KdJabatan2,
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        // print_r($data); die();
        $add = $this->TrJabatanModel->insert($data);
        if ($add) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penambahan Data transaksi Jabatan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $this->PegawaiModel->set(['KdJabatan' => $jabatan->KdJabatan, 'KdJabatan2' => $jabatan->KdJabatan2])->where('NIK', $NIK)->update();
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $NIK . '/jabatan/', $filename);
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
        $idjabatan = $this->request->getPost('KdJabatanBaru');
        $jabatan = $this->JabatanModel->where('id', $idjabatan)->first();
        $data = [
            'NoJabatan' =>  $this->request->getPost('NoJabatan'),
            'NoSK' =>  $this->request->getPost('NoSK'),
            'TglSK' =>  $this->request->getPost('TglSK'),
            'TMT' =>  $this->request->getPost('TMT'),
            'Keterangan' =>  $this->request->getPost('Keterangan'),
            'KdJabatanBaru' =>  $jabatan->KdJabatan,
            'KdJabatanBaru2' =>  $jabatan->KdJabatan2,
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        $edit = $this->TrJabatanModel->set($data)->where('id', $id)->update();
        if ($edit) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Edit Data transaksi Jabatan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $jabatan->NIK . '/jabatan/', $filename);
                if (file_exists(ROOTPATH . 'public/uploads/' . $jabatan->NIK . '/jabatan/' . $jabatan->file)) {
                    unlink(ROOTPATH . 'public/uploads/' . $jabatan->NIK . '/jabatan/' . $jabatan->file);
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
        $trjabatan = $this->TrJabatanModel->where('id', $id)->first();
        $delete = $this->TrJabatanModel->where('id', $id)->delete();
        if ($delete) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penghapusan data transaksi Jabatan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if (file_exists(ROOTPATH . 'public/uploads/' . $trjabatan->NIK . '/jabatan/' . $trjabatan->file)) {
                unlink(ROOTPATH . 'public/uploads/' . $trjabatan->NIK . '/jabatan/' . $trjabatan->file);
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
        $TrJabatan = $this->TrJabatanModel->getJabatan($NIK)->getResult();
        $data = [
            'TrJabatan' => $TrJabatan,
        ];
        return view('modal/TrJabatan_Modal_list', $data);
    }
}
