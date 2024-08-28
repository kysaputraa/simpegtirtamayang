<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluargaModel extends Model
{
    protected $table = 'tkeluarga';
    protected $primaryKey = 'id_keluarga';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_keluarga',
        'NIK',
        'NoKeluarga',
        'Nama',
        'KdStatusKeluarga',
        'KdKelamin',
        'TempatLahir',
        'TglLahir',
        'TanggalLahir',
        'KdTingkatDidik',
        'KdPekerjaan',
        'AnakKe',
        'NoAkte',
        'DptAskes',
        'DptAsuransiBerobat',
        'Keterangan',
        'status'
    ];

    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    public function getKeluargaAll()
    {
        $builder = $this->db->table('tkeluarga a');
        return $builder->select('a.*, b.statuskeluarga, c.Nama as keluargadari, d.TingkatPendidikan')
            ->where('status', 'aktif')
            ->join('mstatuskeluarga b', 'b.kdstatuskeluarga = a.kdstatuskeluarga')
            ->join('tpegawai c', 'c.NIK = a.NIK')
            ->join('mtingkatdidik d', 'd.kdtingkatdidik = a.KdTingkatDidik')
            ->orderBy('id_keluarga', 'desc')
            ->get();
    }

    public function getKeluarga($NIK)
    {
        $builder = $this->db->table('tkeluarga a');
        return $builder->select('a.*')
            ->where('NIK', $NIK)
            ->where('status', 'aktif')
            ->orderBy('Nama', 'asc')
            ->get();
    }

    public function getPasagan($NIK)
    {
        $builder = $this->db->table('tkeluarga a');
        return $builder->select('a.*')
            ->where('NIK', $NIK)
            ->where('status', 'aktif')
            ->groupStart()
            ->like('KdStatusKeluarga', 'SU', 'both')
            ->orLike('KdStatusKeluarga', 'IST', 'both')
            ->groupEnd()
            ->orderBy('Nama', 'asc')
            ->get();
    }

    public function getAnak($NIK)
    {
        $builder = $this->db->table('tkeluarga a');
        return $builder->select('a.*')
            ->where('NIK', $NIK)
            ->where('status', 'aktif')
            ->groupStart()
            ->like('KdStatusKeluarga', 'AK', 'both')
            ->orLike('KdStatusKeluarga', 'AT', 'both')
            ->orderBy('Nama', 'asc')
            ->groupEnd()
            ->get();
    }
}
