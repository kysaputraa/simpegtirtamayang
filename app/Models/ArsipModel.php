<?php

namespace App\Models;

use CodeIgniter\Model;

class ArsipModel extends Model
{
    protected $table = 't_arsip';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'NIK',
        'nama',
        'file',
        'createdAt',
        'createdBy',
        'status',
    ];
}
