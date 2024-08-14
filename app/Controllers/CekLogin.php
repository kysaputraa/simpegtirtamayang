<?php

namespace App\Controllers;

use App\Models\GlobalModel;

class CekLogin extends BaseController
{
    var $globalModel;

    public function __construct()
    {
        $this->globalModel = new GlobalModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('menu/login',);
    }

    public function cek()
    {
        // $encrypter = \Config\Services::encrypter();
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password') ?? '';

        $md5password = md5($p);

        $cek = $this->globalModel->cek_login($u, $md5password)->getRow();

        if ($cek) {
            $this->session->set('username', $cek->username);
            $this->session->set('level', $cek->level);
            $this->session->set('login', TRUE);
            $this->session->setFlashdata('sukses', 'Username atau Password benar');
            return redirect()->to('/');
        } else {
            $this->session->setFlashdata('gagal', 'Username atau Password Salah');
            return redirect()->to('/aksespintu');
        }
        $this->session->setFlashdata('gagal', 'Username atau Password Salah');
    }

    public function enc()
    {
        $encrypter = \Config\Services::encrypter();

        $plainText  = 'adsa';
        $ciphertext = $encrypter->encrypt($plainText);

        // Outputs: This is a plain-text message!
        // echo $encrypter->decrypt($ciphertext);
        echo base64_encode($ciphertext);
        // echo $ciphertext;
    }

    public function dec()
    {
        $encrypter = \Config\Services::encrypter();

        $plainText  = 'lNe+prXi6w/Lc+Kp9oTzuAeGhVF37BeeFi/GI4CiQAUyGqa6XIUvWi0ThOwOH9JO/Lx/OJjauMj3H3Z2+43A/0vFwdvXk7wghe3db6qXodg10mdtyHe4QtU=';
        $md5 = base64_decode($plainText);
        $ciphertext = $encrypter->decrypt($md5);

        // Outputs: This is a plain-text message!
        // echo $encrypter->decrypt($ciphertext);
        echo $ciphertext;
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('aksespintu');
    }

    public function tes()
    {
        echo md5("perumdaadmin");
    }
}
