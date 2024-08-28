<?php
// app/Controllers/AuthController.php
namespace App\Controllers\Api;

use App\Models\BerkalaModel;
use App\Models\KeluargaModel;
use App\Models\PegawaiModel;
use App\Models\PendidikanModel;
use App\Models\TrJabatanModel;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{

    var $PegawaiModel;
    var $KeluargaModel;
    var $PendidikanModel;
    var $TrJabatanModel;
    var $BerkalaModel;

    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
        $this->KeluargaModel = new KeluargaModel();
        $this->PendidikanModel = new PendidikanModel();
        $this->TrJabatanModel = new TrJabatanModel();
        $this->BerkalaModel = new BerkalaModel();
    }

    public function getDetail()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'NIK'  => 'required|min_length[3]|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors(), 400);
        }

        $NIK = $this->request->getPost('NIK');

        $pegawaidetail = $this->PegawaiModel->getPegawaiDetail($NIK)->getRow();

        return $this->respond([
            'code' => 1,
            'message' => 'Berhasil !',
            'data' => $pegawaidetail,
        ], 200);
    }

    public function getKeluarga()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'NIK'  => 'required|min_length[3]|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors(), 400);
        }

        $NIK = $this->request->getPost('NIK');

        $keluarga = $this->KeluargaModel->getKeluarga($NIK)->getResult();

        return $this->respond([
            'code' => 1,
            'message' => 'Berhasil !',
            'data' => $keluarga,
        ], 200);
    }

    public function getPendidikan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'NIK'  => 'required|min_length[3]|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors(), 400);
        }

        $NIK = $this->request->getPost('NIK');

        $pendidikan = $this->PendidikanModel->where('NIK', $NIK)->findAll();

        return $this->respond([
            'code' => 1,
            'message' => 'Berhasil !',
            'data' => $pendidikan,
        ], 200);
    }

    public function getTrJabatan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'NIK'  => 'required|min_length[3]|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors(), 400);
        }

        $NIK = $this->request->getPost('NIK');

        $TrJabatan = $this->TrJabatanModel->getJabatan($NIK)->getResult();

        return $this->respond([
            'code' => 1,
            'message' => 'Berhasil !',
            'data' => $TrJabatan,
        ], 200);
    }

    public function getBerkala()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'NIK'  => 'required|min_length[3]|max_length[255]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors(), 400);
        }

        $NIK = $this->request->getPost('NIK');

        $berkala = $this->BerkalaModel->getBerkalaByNIK($NIK)->getResult();

        return $this->respond([
            'code' => 1,
            'message' => 'Berhasil !',
            'data' => $berkala,
        ], 200);
    }
}
