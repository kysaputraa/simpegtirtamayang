<?php

namespace App\Controllers;

use App\Models\LevelModel;
use App\Models\GlobalModel;

class Level extends BaseController
{
    var $LevelModel;
    var $GlobalModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->LevelModel = new LevelModel();
        $this->GlobalModel = new GlobalModel();
    }

    public function index()
    {
        $data = ['Level' => $this->LevelModel->getMasterLevel()->getResult(),];
        return view('menu/LevelList', $data);
    }

    public function modaledit()
    {
        $levelid = $this->request->getPost('level');
        $level = $this->LevelModel->getLevelBylevel($levelid)->getResult();
        $levelarray =  array_column($level, 'menu');
        $data = ['Level' => $level, 'levelid' => $levelid];
        return view('modal/LevelModalEdit', $data);
    }

    public function add()
    {
        $data = [
            'KdBagian' =>  $this->request->getPost('KdBagian'),
            'Bagian' =>  $this->request->getPost('Bagian'),
            'Aktif' =>  1,
        ];
        $add = $this->LevelModel->insert($data);
        if ($add) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function edit()
    {
        $level = $this->request->getPost('level');
        $menus =  $this->request->getPost('menu');
        $i = 0;
        foreach ($menus as $menu) {
            $data_insert_menu[] = array(
                'menu' => $this->request->getPost('menu')[$i],
                'level' => $level
            );
            $i++;
        }
        $this->LevelModel->deleteByLevel($level);
        $insert = $this->LevelModel->inserBatch($data_insert_menu);
        if ($insert) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = $this->LevelModel->where('id', $id)->set('Aktif', 0)->update();
        if ($delete) {
            $this->session->setFlashdata('sukses', 'Berhasil !');
        } else {
            $this->session->setFlashdata('gagal', 'Gagal !');
        }
        return redirect()->back();
    }
}
