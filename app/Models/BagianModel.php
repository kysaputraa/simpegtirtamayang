<?php

namespace App\Models;

use CodeIgniter\Model;

class BagianModel extends Model
{
    protected $table = 'mbagian';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'KdBagian',
        'Bagian',
        'KdAkun',
        'Aktif',
    ];

    public function JumlahAktif()
    {
        $builder = $this->db->table('mbagian');
        return $builder->where('Aktif', '1')->get()->getNumRows();
    }
}
