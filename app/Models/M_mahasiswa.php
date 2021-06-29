<?php

namespace App\Models;

use CodeIgniter\Model;

class M_mahasiswa extends Model
{
    protected $table = 'tbl_mhs';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat', 'foto'];
    // protected $createdField = 'dibuat';
    // protected $updateField = 'diperbarui';

    public function getMhs($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
