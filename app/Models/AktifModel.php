<?php

namespace App\Models;

use CodeIgniter\Model;

class AktifModel extends Model
{
    protected $table = 'maktif';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'KdAktif',
        'Aktif',
    ];
}
