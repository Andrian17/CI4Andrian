<?php

use App\Controllers\BaseController;

namespace App\Controllers;

class C_Pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Andrian',

        ];
        return view('pages/beranda', $data);
    }

    public function about()
    {
        $data = [
            'tittle' => 'About Me',
            'Me' => [
                [
                    'Nama' => 'Andrian',
                    'Alamat' => 'Bima'
                ],
                [
                    'Nama' => 'Cimen',
                    'Alamat' => 'Sapaga'
                ]
            ]
        ];
        echo view('pages/about', $data);
    }
}
