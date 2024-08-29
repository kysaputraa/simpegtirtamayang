<?php

namespace App\Controllers;

use App\Models\BagianModel;
use App\Models\PegawaiModel;

class Home extends BaseController
{

    var $PegawaiModel;
    var $BagianModel;

    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
        $this->BagianModel = new BagianModel();
    }

    public function index()
    {
        $pegawaiByDepartment = $this->PegawaiModel->getDepartmentJumlahPegawai()->getResult();
        $pegawaiByGol = $this->PegawaiModel->getGolonnganJumlahPegawai()->getResult();
        $pegawaiByStatus = $this->PegawaiModel->getStatusJumlahPegawai()->getResult();
        $pegawaiByPendidikan = $this->PegawaiModel->getPendidikanJumlahPegawai()->getResult();
        $BagianAktif = $this->BagianModel->JumlahAktif();
        $pegawai_aktif = $this->PegawaiModel->JumlahAktif();
        $pegawaipensiun = $this->PegawaiModel->getPegawaiPensiun()->getResult();
        $pegawaiByJK = $this->PegawaiModel->getPegawaiByJK()->getResult();
        $berkala = $this->PegawaiModel->getBekalaMoreThan2()->getResult();
        $data = [
            'pegawai_aktif' => $pegawai_aktif,
            'bagian_aktif' => $BagianAktif,
            'pegawaiByDepartment' => $pegawaiByDepartment,
            'pegawaiByPendidikan' => $pegawaiByPendidikan,
            'pegawaiByGol' => $pegawaiByGol,
            'pegawaiByStatus' => $pegawaiByStatus,
            'pegawaiByJK' => $pegawaiByJK,
            'pegawaipensiun' => $pegawaipensiun,
            'berkala' => $berkala,
        ];
        return view('menu/dashboard', $data);
    }

    public function json()
    {
        // $this->load->library('output');
        // $this->output->set_content_type('application/json');

        $pegawai = $this->PegawaiModel->where('NIK', '157107090896')->first();
        return $this->response->setJSON($pegawai);
    }
}
