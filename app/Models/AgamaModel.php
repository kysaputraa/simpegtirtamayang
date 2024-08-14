<?php

namespace App\Models;

use CodeIgniter\Model;

class AgamaModel extends Model
{
    protected $table = 'magama';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'KdAgama',
        'Agama',
    ];
}
