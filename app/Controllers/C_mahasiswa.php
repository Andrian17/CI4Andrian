<?php

use App\Controllers\BaseController;

namespace App\Controllers;

use App\Models\M_mahasiswa;
use CodeIgniter\Database\Query;

class C_mahasiswa extends BaseController
{

    protected $mhsModel;

    public function __construct()
    {
        $this->mhsModel = new M_mahasiswa();
    }

    public function index()
    {
        // $mhs =  $this->mhsModel->findAll();

        $data = [
            'tittle' => 'Andrian',
            'mhsList' => $this->mhsModel->getMhs()
        ];

        // $mhsModel = new  \App\Models\M_mahasiswa();
        // $mhs =  $mhsModel->findAll();
        // dd($mhs);
        // $db = \config\Database::connect();
        // $mhs = $db->query("SELECT * FROM tbl_mhs");
        // //dd($mhs);
        // foreach ($mhs->getResultArray() as $row) {
        //     d($row);
        // } 

        return view('mahasiswa/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'tittle' => 'Detail Mahasiswa',
            'detail' => $this->mhsModel->getMhs($id)
        ];
        return view('mahasiswa/detail', $data);
    }

    public function edit($id)
    {
    }

    public function hapus($id)
    {
    }
}
