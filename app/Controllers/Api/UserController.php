<?php
// app/Controllers/AuthController.php
namespace App\Controllers\Api;

use App\Models\GlobalModel;
use App\Models\PegawaiModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use App\Models\UserModel;

class UserController extends ResourceController
{

    var $PegawaiModel;
    public function __construct()
    {
        $this->PegawaiModel = new PegawaiModel();
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
}
