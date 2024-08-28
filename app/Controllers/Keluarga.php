<?php

namespace App\Controllers;

use App\Models\GlobalModel;
use App\Models\KeluargaModel;
use App\Models\PegawaiModel;
use App\Models\TingkatDidikModel;

class Keluarga extends BaseController
{
    var $KeluargaModel;
    var $GlobalModel;
    var $PegawaiModel;
    var $TingkatDidik;

    public function __construct()
    {
        $this->KeluargaModel = new KeluargaModel();
        $this->GlobalModel = new GlobalModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->TingkatDidik = new TingkatDidikModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'Keluarga' => $this->KeluargaModel->getKeluargaAll()->getResult(),
            'statuskeluarga' => $this->GlobalModel->getStatusKeluarga()->getResult(),
            'tingkatdidik' => $this->TingkatDidik->findAll(),
            'pekerjaan' => $this->GlobalModel->getPekerjaan()->getResult(),
        ];
        return view('menu/KeluargaList', $data);
    }

    public function modaledit()
    {
        $id = $this->request->getPost('id');
        $statuskeluarga = $this->GlobalModel->getStatusKeluarga()->getResult();
        $data = [
            'statuskeluarga' => $statuskeluarga,
            'keluarga' => $this->KeluargaModel->where('id_keluarga', $id)->first(),
            'tingkatdidik' => $this->TingkatDidik->findAll(),
            'pekerjaan' => $this->GlobalModel->getPekerjaan()->getResult(),
        ];
        return view('modal/keluarga_modal_edit', $data);
    }

    public function add()
    {
        $NIK = $this->request->getPost('NIK');
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'NoKeluarga' => $this->request->getPost('NoKeluarga'),
            'NIK' => $NIK,
            'KdStatusKeluarga' => $this->request->getPost('KdStatusKeluarga'),
            'KdKelamin' => $this->request->getPost('KdKelamin'),
            'TempatLahir' => $this->request->getPost('TempatLahir'),
            'TglLahir' => $this->request->getPost('TglLahir'),
            'KdTingkatDidik' => $this->request->getPost('KdTingkatDidik'),
            'DptAskes' => $this->request->getPost('DptAskes'),
            'DptAsuransiBerobat' => $this->request->getPost('DptAsuransiBerobat'),
            'Keterangan' => $this->request->getPost('Keterangan'),
            'KdPekerjaan' => $this->request->getPost('KdPekerjaan'),
        ];
        $add = $this->KeluargaModel->insert($data);
        if ($add) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penambahan data pasangan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function edit()
    {
        $id = $this->request->getPost('id_keluarga');
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'NoKeluarga' => $this->request->getPost('NoKeluarga'),
            'KdStatusKeluarga' => $this->request->getPost('KdStatusKeluarga'),
            'KdKelamin' => $this->request->getPost('KdKelamin'),
            'TempatLahir' => $this->request->getPost('TempatLahir'),
            'TglLahir' => $this->request->getPost('TglLahir'),
            'KdTingkatDidik' => $this->request->getPost('KdTingkatDidik'),
            'DptAskes' => $this->request->getPost('DptAskes'),
            'DptAsuransiBerobat' => $this->request->getPost('DptAsuransiBerobat'),
            'Keterangan' => $this->request->getPost('Keterangan'),
            'KdPekerjaan' => $this->request->getPost('KdPekerjaan'),
        ];

        $add = $this->KeluargaModel->where('id_keluarga', $id)->set($data)->update();
        if ($add) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Edit Data Pasangan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id_keluarga)
    {
        $query = $this->KeluargaModel->set('status', 'tidak_aktif')->where('id_keluarga', $id_keluarga)->update();
        if ($query) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penghapusan Data Keluarga', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
