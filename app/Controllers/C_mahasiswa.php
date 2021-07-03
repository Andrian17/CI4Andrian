<?php


use App\Controllers\BaseController;

namespace App\Controllers;

use App\Models\M_mahasiswa;
use CodeIgniter\I18n\Time;
use App\Helpers;
use CodeIgniter\HTTP\Files\UploadedFile;

class C_mahasiswa extends BaseController
{

    protected $mhsModel;
    protected $zoneInd;

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->mhsModel = new M_mahasiswa();
    }

    public function index()
    {
        // //faker
        // $faker = \Faker\Factory::create();
        // dd($faker->name);
        $data = [
            'tittle' => 'Andrian',
            'mhsList' => $this->mhsModel->getMhs()
        ];

        return view('mahasiswa/index', $data);
    }

    public function rincian($id)
    {
        $data = [
            'tittle' => 'Detail Mahasiswa',
            'detail' => $this->mhsModel->getWhere($id),
            'validation' => \config\Services::validation()
        ];
        if (empty($data['detail'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

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
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto'
                ]
            ]
        ])) {
            // $validation = \config\Services::validation();
            // return redirect()->to('C_mahasiswa/tambahData')->withInput()->with('validation', $validation);
            return redirect()->to('C_mahasiswa/tambahData')->withInput();
        }

        //ambil file upload
        $fileUpload = $this->request->getFile('foto');

        //jika gambar tidak diupload
        if ($fileUpload->getError() == 4) {
            $namaFile = 'guest.png';
        } else {
            //generate nama foto random
            $namaFile = $fileUpload->getRandomName();
            //pidahkan ke foleder img
            $fileUpload->move('img', $namaFile);
        }





        $this->mhsModel->save([
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFile
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/C_mahasiswa');
    }

    public function formEdit($id)
    {
        $data = [
            'tittle' => 'Edit Data Mahasiswa',
            'edit' => $this->mhsModel->getWhere($id),
            'validation' => \Config\Services::validation()
        ];
        return view('mahasiswa/editData', $data);
    }

    public function edit($id)
    {

        //cek data
        $dataLama = $this->mhsModel->getWhere($id);
        session()->setFlashdata('e', 'Cek Kembali data anda');
        if ($dataLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_Unique[tbl_mhs.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
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
            ],
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto'
                ]
            ]
        ])) {
            return redirect()->to('C_mahasiswa/formEdit/' . $this->request->getVar('id'))->withInput();
        }

        //ambil file upload
        $fileUpload = $this->request->getFile('foto');
        //cek gambar tetap gambar lama atau gambar baru
        if ($fileUpload->getError() == 4) {
            $namaFile = $this->request->getVar('fotoLama');
        } else {
            //generate foto random
            $namaFile = $fileUpload->getRandomName();
            //pindahkan gambar
            $fileUpload->move('img', $namaFile);
            unlink('img/' . $this->request->getVar('fotoLama'));
        }

        if ($this->request->getVar('fotoLama') != 'guest.png') {
            //hapus gambar
            unlink('img/' . $this->request->getVar('fotoLama'));
        }


        $time =  date('Y-m-d H:i:s');
        $this->mhsModel->save([
            'id' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFile,
            'update_at' => $time
        ]);

        return $this->rincian($id);
    }

    public function delete($id)
    {
        //pilih foto berdasarkan id
        $data = $this->mhsModel->getWhere($id);
        if ($data['foto'] != 'guest.png') {
            //hapus gambar
            unlink('img/' . $data['foto']);
        }



        $this->mhsModel->delete($id);
        return redirect()->to('C_mahasiswa');
    }
}
