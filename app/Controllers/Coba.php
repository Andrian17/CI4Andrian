<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index()
    {
        echo "Andrian";
    }

    public function about( $nama = "-", $umur= "0" )
    {
        echo "Nama Kamu $nama, Umur Saya $umur tahun.";
    }

    public function suka()
    {
        echo ('AKu adalah');
    }
}
