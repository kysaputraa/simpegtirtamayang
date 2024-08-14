<?php
// app/Controllers/AuthController.php
namespace App\Controllers;

use App\Models\GlobalModel;
use App\Models\PegawaiModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use App\Models\UserModel;

class AuthController extends ResourceController
{

    public function login()
    {
        $globalModel = new GlobalModel();

        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password') ?? '';

        $md5password = md5($p);

        $cek = $globalModel->cek_login($u, $md5password)->getRow();

        if (!$cek) {
            return $this->respond([
                'code' => 0,
                'message' => 'Username atau Password salah !',
            ], 401);
        }

        $issuedAt = time();
        $expirationTime = $issuedAt + (60 * 60); // 1 hour expiration
        $jwt = JWT::encode([
            'iss' => 'simpeg tirta mayang',
            'sub' => $cek->username,
            'iat' => $issuedAt,
            'exp' => $expirationTime
        ], getenv('JWT_SECRET'), 'HS256');

        return $this->respond([
            'code' => 1,
            'message' => 'Login Berhasil',
            'username' => $u,
            'token' => $jwt
        ], 200);
    }
}
