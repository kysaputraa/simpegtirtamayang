<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use App\Models\BerkalaModel;
use App\Models\GlobalModel;
use App\Models\GolDarahModel;
use App\Models\KeluargaModel;
use App\Models\PegawaiModel;
use App\Models\PendidikanModel;

class Pegawai extends BaseController
{
    var $PegawaiModel;
    var $GlobalModel;
    var $KeluargaModel;
    var $PendidikanModel;
    var $GolDarahModel;
    var $BerkalaModel;
    var $ArsipModel;

    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
        $this->KeluargaModel = new KeluargaModel();
        $this->PendidikanModel = new PendidikanModel();
        $this->GlobalModel = new GlobalModel();
        $this->GolDarahModel = new GolDarahModel();
        $this->BerkalaModel = new BerkalaModel();
        $this->session = \Config\Services::session();
        $this->ArsipModel = new ArsipModel();
    }

    public function index(): string
    {
        $pegawai = $this->PegawaiModel->getPegawai()->getResult();
        $agama = $this->GlobalModel->getAgama()->getResult();
        $statuspegawai = $this->GlobalModel->getStatusPegawai()->getResult();

        $data = [
            'pegawai' => $pegawai,
            'agama' => $agama,
            'statuspegawai' => $statuspegawai,
        ];
        return view('menu/pegawai_list', $data);
    }

    public function search($search)
    {
        $pegawai = $this->PegawaiModel->searchPegawai($search)->getResult();
        $agama = $this->GlobalModel->getAgama()->getResult();
        $statuspegawai = $this->GlobalModel->getStatusPegawai()->getResult();

        $data = [
            'pegawai' => $pegawai,
            'agama' => $agama,
            'statuspegawai' => $statuspegawai,
        ];
        return view('menu/pegawai_list', $data);
    }

    public function update($NIK)
    {
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'GelarDepan' => $this->request->getPost('GelarDepan'),
            'GelarBelakang' => $this->request->getPost('GelarBelakang'),
            'KdGolDarah' => $this->request->getPost('KdGolDarah'),
            'NIK' => $this->request->getPost('NIK'),
            'TglLahir' => $this->request->getPost('TglLahir'),
            'KdAgama' => $this->request->getPost('KdAgama'),
            'KdKawin' => $this->request->getPost('KdKawin'),
            'KdKelamin' => $this->request->getPost('KdKelamin'),
            'Alamat' => $this->request->getPost('Alamat'),
            'HP' => $this->request->getPost('HP'),
            'NPWP' => $this->request->getPost('NPWP'),
        ];

        $update = $this->PegawaiModel->set($data)->where('NIK', $NIK)->update();
        if ($update) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'update data pegawai', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->to('pegawai/detail/' . $NIK);
    }

    public function add()
    {
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'GelarDepan' => $this->request->getPost('GelarDepan'),
            'GelarBelakang' => $this->request->getPost('GelarBelakang'),
            'NIK' => $this->request->getPost('NIK'),
            'TempatLahir' => $this->request->getPost('TempatLahir'),
            'Alamat' => $this->request->getPost('Alamat'),
            'KdKelamin' => $this->request->getPost('KdKelamin'),
            'KdAgama' => $this->request->getPost('KdAgama'),
            'KdStatusPegawai' => $this->request->getPost('KdStatusPegawai'),
            'KdAktif' => 'A01',
        ];

        $add = $this->PegawaiModel->insert($data);
        if ($add) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'penambahan data pegawai', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->to('pegawai');
    }

    public function changefoto()
    {
        $NIK = $this->request->getPost('NIK');
        $pegawai = $this->PegawaiModel->where('NIK', $NIK)->first();
        $image = $this->request->getFile('foto');
        $filename = $image->getRandomName();
        $image->move(ROOTPATH . 'public/uploads/' . $NIK . '/fotoprofil/', $filename);

        $data = [
            'Foto' =>  $image->getName(),
        ];

        if ($this->PegawaiModel->set($data)->where('NIK', $NIK)->update()) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Pegantian foto pegawai', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            if (file_exists(ROOTPATH . 'public/uploads/fotoprofil/' . $pegawai->Foto)) {
                unlink(ROOTPATH . 'public/uploads/fotoprofil/' . $pegawai->Foto);
            }
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }

        return redirect()->to('pegawai/detail/' . $NIK);
    }

    public function addpasangan($NIK)
    {
        $jk = $this->request->getPost('hubungan') == 'IST' ? 'P' : 'L';
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'NoKeluarga' => $this->request->getPost('NoKeluarga'),
            'NIK' => $NIK,
            'KdStatusKeluarga' => $this->request->getPost('KdStatusKeluarga'),
            'KdKelamin' => $jk,
            'TempatLahir' => $this->request->getPost('TempatLahir'),
            'TanggalLahir' => $this->request->getPost('TanggalLahir'),
        ];
        $add = $this->KeluargaModel->insert($data);
        if ($add) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Penambahan data pasangan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->to('pegawai/detail/' . $NIK);
    }

    public function editpasangan()
    {
        $id = $this->request->getPost('id');
        $statuskeluarga = $this->GlobalModel->getStatusKeluarga()->getResult();
        $data = [
            'statuskeluarga' => $statuskeluarga,
            'pasangan' => $this->KeluargaModel->where('id_keluarga', $id)->first()
        ];
        return view('modal/pasangan_modal_edit', $data);
    }

    public function pros_editpasangan()
    {
        $id = $this->request->getPost('id_keluarga');
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'NoKeluarga' => $this->request->getPost('NoKeluarga'),
            'TempatLahir' => $this->request->getPost('TempatLahir'),
            'TglLahir' => $this->request->getPost('TglLahir'),
            'KdStatusKeluarga' => $this->request->getPost('KdStatusKeluarga'),
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

    public function deletekeluarga($id_keluarga)
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

    public function detail($nik)
    {
        if (session()->get('level') == 3 and session()->get('username') != $nik) {
            $this->session->setFlashdata('gagal', 'You Are UnAuthorized to look this page !');
            return redirect()->to('/');
        }

        $agama = $this->GlobalModel->getAgama()->getResult();
        $pegawai = $this->PegawaiModel->getPegawaiDetail($nik)->getRow();
        $pasangan = $this->KeluargaModel->getPasagan($nik)->getResult();
        $anak = $this->KeluargaModel->getAnak($nik)->getResult();
        $pendidikan = $this->PendidikanModel->getPendidikan($nik)->getResult();
        $tingkatdidik = $this->GlobalModel->getTingkatDidik()->getResult();
        $goldarah = $this->GolDarahModel->findAll();
        $arsip = $this->ArsipModel->where('NIK', $nik)->where('status', 'aktif')->findAll();
        $statuskeluarga = $this->GlobalModel->getStatusKeluarga()->getResult();
        $data = [
            'pegawai' => $pegawai,
            'agama' => $agama,
            'pasangan' => $pasangan,
            'anak' => $anak,
            'pendidikan' => $pendidikan,
            'statuskeluarga' => $statuskeluarga,
            'tingkatdidik' => $tingkatdidik,
            'goldarah' => $goldarah,
            'arsip' => $arsip,
        ];
        return view('menu/pegawai_detail', $data);
    }

    public function addPendidikan($NIK)
    {
        $data = [
            'NIK' => $NIK,
            'NamaSekolah' => $this->request->getPost('NamaSekolah'),
            'KdTingkatDidik' => $this->request->getPost('KdTingkatDidik'),
            'TempatLulus' => $this->request->getPost('TempatLulus'),
            'TahunLulus' => $this->request->getPost('TahunLulus'),
            'NoIjazah' => $this->request->getPost('NoIjazah'),
            'Keterangan' => $this->request->getPost('Keterangan'),
        ];

        $file = $this->request->getFile('file');
        $filename = $file->getRandomName();
        if ($file->getName() != '') {
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

    public function editpendidikan()
    {
        $id = $this->request->getPost('id');
        $pendidikan = $this->PendidikanModel->where('id', $id)->first();
        $tingkatdidik = $this->GlobalModel->getTingkatDidik()->getResult();
        $data = ['pendidikan' => $pendidikan, 'tingkatdidik' => $tingkatdidik];
        return view('modal/pendidikan_modal_edit', $data);
    }

    public function proseditpendidikan()
    {
        $id = $this->request->getPost('id');
        $pendidikan = $this->PendidikanModel->where('id', $id)->first();
        $data = [
            'NamaSekolah' => $this->request->getPost('NamaSekolah'),
            'KdTingkatDidik' => $this->request->getPost('KdTingkatDidik'),
            'TempatLulus' => $this->request->getPost('TempatLulus'),
            'TahunLulus' => $this->request->getPost('TahunLulus'),
            'NoIjazah' => $this->request->getPost('NoIjazah'),
            'Keterangan' => $this->request->getPost('Keterangan'),
        ];

        $file = $this->request->getFile('file');
        $filename = $file->getRandomName();
        if ($file->getName() != '') {
            $data['file'] = $filename;
        }

        $update = $this->PendidikanModel->set($data)->where('id', $id)->update();
        if ($update) {
            $datalog = ['NIK' => session()->get('username'), 'transaksi' => 'Edit Data Pendidikan', 'createdAt' => date('Y-m-d H:i:s')];
            $this->GlobalModel->insetLog($datalog);
            $file->move(ROOTPATH . 'public/uploads/' . $pendidikan->NIK . '/pendidikan/', $filename);
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

    public function deletependidikan($id)
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

    public function pencarian()
    {
        $nama = $this->request->getPost('nama');
        $func = $this->request->getPost('func');
        $pegawai = $this->PegawaiModel->like('Nama', $nama, 'both')->limit(25)->findAll();
        $data = ['pegawai' => $pegawai, 'func' => $func];
        return view('autocomplete/autocompletePegawai', $data);
    }
}
