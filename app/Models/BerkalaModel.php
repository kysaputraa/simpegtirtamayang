<?php

namespace App\Models;

use CodeIgniter\Model;

class BerkalaModel extends Model
{
    protected $table = 'trkepangkatan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'NIK',
        'NoIDKepangkatan',
        'KdKenaikanPangkat',
        'KdGolBaru',
        'NoSKBaru',
        'TglSKBaru',
        'TMTBaru',
        'Keterangan',
    ];

    public function getBerkala()
    {
        $builder = $this->db->table('trkepangkatan a');
        return $builder->select('a.*, b.pangkat, c.KenaikanPangkat, d.Nama')
            ->join('mgol b', 'b.kdgol = a.KdGolBaru', 'both')
            ->join('mkenaikanpangkat c', 'c.KdKenaikanPangkat = a.KdKenaikanPangkat', 'both')
            ->join('tpegawai d', 'd.NIK = a.NIK', 'both')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getBerkalaByNIK($NIK)
    {
        $builder = $this->db->table('trkepangkatan a');
        return $builder->select('a.*')
            ->where('a.NIK', $NIK)
            ->join('mkenaikanpangkat b', 'b.KdKenaikanPangkat = a.KdKenaikanPangkat', 'both')
            ->get();
    }
}
