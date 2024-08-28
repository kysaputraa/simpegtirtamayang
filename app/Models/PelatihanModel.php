<?php

namespace App\Models;

use CodeIgniter\Model;

class PelatihanModel extends Model
{
    protected $table = 'trpelatihan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'NoPelatihan',
        'NIK',
        'KdJenisPelatihan',
        'NamaPelatihan',
        'TempatPelatihan',
        'TglPelatihan',
        'TglMulai',
        'TglSelesai',
        'Penyelenggara',
        'file',
        'Keterangan',
        'status'
    ];

    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getPelatihanAll()
    {
        $builder = $this->db->table('trpelatihan a');
        return $builder->select('a.*, b.JenisPelatihan, c.Nama')
            ->join('mpelatihan b', 'b.KdJenisPelatihan = a.KdJenisPelatihan')
            ->join('tpegawai c', 'c.NIK = a.NIK')
            ->where('a.status', 'aktif')
            ->orderBy('id', 'desc')
            ->get();
    }
}
