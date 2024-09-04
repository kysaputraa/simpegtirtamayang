<?php

namespace App\Models;

use CodeIgniter\Model;

class GlobalModel extends Model
{
    var $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function cek_login($u, $p)
    {
        $builder = $this->db->table('t_admin a');
        return $builder->where('a.username', $u)
            ->where('password', $p)
            ->get();
    }

    public function getLevelManagement($level)
    {
        $builder = $this->db->table('levelmanagement a');
        return $builder->where('level', $level)->get();
    }

    public function getAgama()
    {
        $builder = $this->db->table('magama a');
        return $builder->orderBy('Agama', 'asc')->get();
    }

    public function getPekerjaan()
    {
        $builder = $this->db->table('mpekerjaan a');
        return $builder->orderBy('pekerjaan', 'asc')->get();
    }

    public function getJenisPelatihan()
    {
        $builder = $this->db->table('mpelatihan a');
        return $builder->orderBy('JenisPelatihan', 'asc')->get();
    }

    public function getStatusKeluarga()
    {
        $builder = $this->db->table('mstatuskeluarga a');
        return $builder->get();
    }

    public function getStatusPegawai()
    {
        $builder = $this->db->table('mstatuspegawai a');
        return $builder->get();
    }

    public function getTingkatDidik()
    {
        $builder = $this->db->table('mtingkatdidik a');
        return $builder->get();
    }

    public function insetLog($data)
    {
        $builder = $this->db->table('t_log a');
        return $builder->insert($data);
    }

    public function getAllArsip($NIK)
    {
        $builder = $this->db->table('trpendidikan a');
        $builder->select('a.nama,  a.file')
            ->where('NIK', $NIK)
            ->get();

        $query1 = $builder->getCompiledSelect();
    }
}
