<?php

namespace App\Controllers;

use App\Models\GlobalModel;
use App\Models\PelatihanModel;
use App\Models\PegawaiModel;
use App\Models\TingkatDidikModel;

class Pelatihan extends BaseController
{
    var $PelatihanModel;
    var $GlobalModel;
    var $PegawaiModel;

    public function __construct()
    {
        $this->PelatihanModel = new PelatihanModel();
        $this->GlobalModel = new GlobalModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'Pelatihan' => $this->PelatihanModel->getPelatihanAll()->getResult(),
            'jenispelatihan' => $this->GlobalModel->getJenisPelatihan()->getResult(),
        ];
        return view('menu/PelatihanList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $Pelatihan = $this->PelatihanModel->where('id', $id)->first();
        $jenispelatihan = $this->GlobalModel->getJenisPelatihan()->getResult();
        $data = ['Pelatihan' => $Pelatihan, 'jenispelatihan' => $jenispelatihan];
        return view('modal/pelatihan_modal_edit', $data);
    }

    public function add()
    {
        $NIK = $this->request->getPost('NIK');
        $data = [
            'NIK' => $NIK,
            'NamaPelatihan' => $this->request->getPost('NamaPelatihan'),
            'KdJenisPelatihan' => $this->request->getPost('KdJenisPelatihan'),
            'TempatPelatihan' => $this->request->getPost('TempatPelatihan'),
            'TglMulai' => $this->request->getPost('TglMulai'),
            'TglSelesai' => $this->request->getPost('TglSelesai'),
            'Penyelenggara' => $this->request->getPost('Penyelenggara'),
            'Keterangan' => $this->request->getPost('Keterangan'),
            'status' => 'aktif'
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        $insert = $this->PelatihanModel->insert($data);
        if ($insert) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penambahan Data Pelatihan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $NIK . '/pelatihan/', $filename);
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
        $Pelatihan = $this->PelatihanModel->where('id', $id)->first();
        $data = [
            'NamaPelatihan' => $this->request->getPost('NamaPelatihan'),
            'KdJenisPelatihan' => $this->request->getPost('KdJenisPelatihan'),
            'TempatPelatihan' => $this->request->getPost('TempatPelatihan'),
            'TglMulai' => $this->request->getPost('TglMulai'),
            'TglSelesai' => $this->request->getPost('TglSelesai'),
            'Penyelenggara' => $this->request->getPost('Penyelenggara'),
            'Keterangan' => $this->request->getPost('Keterangan'),
        ];

        $file = $this->request->getFile('file');
        if ($file->getName() != '') {
            $filename = $file->getRandomName();
            $data['file'] = $filename;
        }

        $update = $this->PelatihanModel->set($data)->where('id', $id)->update();
        if ($update) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Edit Data Pelatihan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if ($file->getName() != '') {
                $file->move(ROOTPATH . 'public/uploads/' . $Pelatihan->NIK . '/pelatihan/', $filename);
                if (file_exists(ROOTPATH . 'public/uploads/' . $Pelatihan->NIK . '/pelatihan/' . $Pelatihan->file)) {
                    unlink(ROOTPATH . 'public/uploads/' . $Pelatihan->NIK . '/pelatihan/' . $Pelatihan->file);
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
        $Pelatihan = $this->PelatihanModel->where('id', $id)->first();
        $query = $this->PelatihanModel->where('id', $id)->delete();
        if ($query) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penghapusan Data Pelatihan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if (file_exists(ROOTPATH . 'public/uploads/' . $Pelatihan->NIK . '/pelatihan/' . $Pelatihan->file)) {
                unlink(ROOTPATH . 'public/uploads/' . $Pelatihan->NIK . '/pelatihan/' . $Pelatihan->file);
            }
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
