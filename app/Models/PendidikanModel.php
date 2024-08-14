<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table = 'trpendidikan';
    protected $primaryKey = 'id_keluarga';
    protected $returnType = 'object';
    protected $allowedFields = [
        'NIK',
        'NamaSekolah',
        'NoPendidikan',
        'KdTingkatDidik',
        'NamaSekolah',
        'TempatLulus',
        'TahunLulus',
        'NoIjazah',
        'file',
        'Keterangan',
    ];

    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getPendidikan($nik)
    {
        $builder = $this->db->table('trpendidikan a');
        return $builder->select('a.*')
            ->where('NIK', $nik)
            ->get();
    }
}
