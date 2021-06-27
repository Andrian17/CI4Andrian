<?php

use App\Controllers\BaseController;

namespace App\Controllers;

class C_mahasiswa extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Andrian',

        ];
        return view('mahasiswa/index', $data);
    }
}
