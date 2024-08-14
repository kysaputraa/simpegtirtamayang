<?php

namespace App\Models;

use CodeIgniter\Model;

class GolDarahModel extends Model
{
    protected $table = 'mgoldarah';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'KdGolDarah',
        'GolDarah',
    ];
}
