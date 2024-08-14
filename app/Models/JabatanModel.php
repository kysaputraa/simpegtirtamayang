<?php

namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'mbjabatan';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'KdJabatan',
        'KdJabatan2',
        'NamaJabatan2',
        'KdBagian',
        'KdSeksi',
        'LevelA',
        'Aktif',
    ];
}
