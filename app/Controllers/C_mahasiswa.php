<?php

use App\Controllers\BaseController;

namespace App\Controllers;

use App\Models\M_mahasiswa;

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
        // if (empty($data['komik'])) {
        //     throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        // }
        return view('mahasiswa/detail', $data);
    }

    public function tambahData($data = '')
    {
        $data = [
            'tittle' => 'Form Tambah Data',
            'validation' => \config\Services::validation()
        ];
        return view('mahasiswa/tambahData', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_Unique[tbl_mhs.nama]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_Unique' => '{field} Sudah Terdaftar'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ]
        ])) {
            $validation = \config\Services::validation();
            return redirect()->to('C_mahasiswa/tambahData')->withInput()->with('validation', $validation);
        }


        $this->mhsModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $this->request->getVar('foto')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/C_mahasiswa');
    }

    public function edit($id)
    {
    }

    public function hapus($id)
    {
    }
}
