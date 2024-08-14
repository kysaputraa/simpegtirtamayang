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
