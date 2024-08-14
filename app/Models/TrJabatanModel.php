<?php

namespace App\Models;

use CodeIgniter\Model;

class TrJabatanModel extends Model
{
    protected $table = 'trjabatan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'NoJabatan',
        'NIK',
        'TMT',
        'NoSK',
        'TglSK',
        'Keterangan',
        'KdJabatanBaru',
        'KdJabatanBaru2',
        'file'
    ];

    public function getJabatan($nik = 0)
    {
        $builder = $this->db->table('trjabatan a');
        $builder->select('a.*, b.NamaJabatan2')
            ->join('mbjabatan b', 'b.KdJabatan = a.KdJabatanBaru AND b.KdJabatan2 = a.KdJabatanBaru2', 'both')
            ->where('a.KdJabatanBaru !=', '')
            ->where('a.KdJabatanBaru2 !=', '')
            ->orderBy('a.id', 'desc');
        if ($nik != 0) $builder->where('NIK', $nik);
        return $builder->get();
    }
}
