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

    public function getPendidikanAll()
    {
        $builder = $this->db->table('trpendidikan a');
        return $builder->select('a.*, b.Nama, c.TingkatPendidikan')
            ->where('a.status', 'aktif')
            ->join('tpegawai b', 'b.NIK = a.NIK')
            ->join('mtingkatdidik c', 'c.KdTingkatDidik = a.KdTingkatDidik')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getPendidikan($nik)
    {
        $builder = $this->db->table('trpendidikan a');
        return $builder->select('a.*')
            ->where('NIK', $nik)
            ->where('a.status', 'aktif')
            ->get();
    }
}
