<?php

namespace App\Models;

use CodeIgniter\Model;

class KenaikanPangkatModel extends Model
{
    protected $table = 'mkenaikanpangkat';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'KdKenaikanPangkat',
        'KenaikanPangkat',
    ];
}
