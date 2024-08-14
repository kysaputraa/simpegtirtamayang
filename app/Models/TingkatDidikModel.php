<?php

namespace App\Models;

use CodeIgniter\Model;

class TingkatDidikModel extends Model
{
    protected $table = 'mtingkatdidik';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'kdtingkatdidik',
        'tingkatpendidikan',
        'kdlama',
    ];
}
