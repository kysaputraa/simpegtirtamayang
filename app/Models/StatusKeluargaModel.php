<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusKeluargaModel extends Model
{
    protected $table = 'mstatuskeluarga';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'kdstatuskeluarga',
        'statuskeluarga',
    ];
}
