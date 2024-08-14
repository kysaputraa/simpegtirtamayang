<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusPegawaiModel extends Model
{
    protected $table = 'mstatuspegawai';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'KdStatusPegawai',
        'StatusPegawai',
        'BuatGaji',
        'Persentase',
    ];
}
