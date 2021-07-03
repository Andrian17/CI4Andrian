<?php


use App\Controllers\BaseController;

namespace App\Controllers;

use App\Models\M_orang;
use CodeIgniter\I18n\Time;
use App\Helpers;
use CodeIgniter\HTTP\Files\UploadedFile;

class C_Orang extends BaseController
{

    protected $orgModel;
    protected $zoneInd;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->orgModel = new M_orang();
    }

    public function index()
    {
        // //faker
        // $faker = \Faker\Factory::create();
        // dd($faker->name);
        $myPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;
        $m = "";
        $key = $this->request->getVar('cari');
        if ($key) {
            $org =  $this->orgModel->search($key);
        } else {
            $org = $this->orgModel;
        }


        $data = [
            'tittle' => 'Orangan',
            'orgList' => $this->orgModel->paginate(6, 'orang'),
            'pager' => $this->orgModel->pager,
            'myPage' => $myPage,
            'm' => $m
            // '' => $this->orgModel->getOrg()
        ];

        return view('orang/index', $data);
    }
}
