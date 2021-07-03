<?php

namespace App\Models;

use CodeIgniter\Model;

class M_orang extends Model
{
    protected $table = 'orang';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat'];

    public function getOrg()
    {

        return $this->findAll();
    }

    public function search($key)
    {
        return $this->table('orang')->like('nama', $key);
    }
}
