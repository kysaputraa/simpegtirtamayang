<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    public function getMasterLevel()
    {
        $builder = $this->db->table('level a');
        return $builder->select('a.*')
            ->get();
    }

    public function getLevelBylevel($level)
    {
        $builder = $this->db->table('levelmanagement a');
        return $builder->select('a.*')
            ->where('a.level', $level)
            ->get();
    }

    public function deleteByLevel($level)
    {
        $builder = $this->db->table('levelmanagement');
        return $builder->where('level', $level)
            ->delete();
    }

    public function inserBatch($data)
    {
        $builder = $this->db->table('levelmanagement');
        return $builder->insertBatch($data);
    }
}
