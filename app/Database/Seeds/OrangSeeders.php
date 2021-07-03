<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class OrangSeeders extends Seeder
{
    public function run()
    {

        //data dummy menggunakan faker
        for ($i = 0; $i < 100; $i++) {
            //faker 
            $faker = \Faker\Factory::create('id_ID');
            $data = [
                'nama' => $faker->name,
                'alamat'    => $faker->address,
                'created_at'    => Time::createFromTimestamp($faker->unixTime()), //created_at nya random
                'updated_at' => Time::now()
            ];
            $this->db->table('orang')->insert($data);
        }










        // $data = [
        //     [
        //         'nama' => 'Andrian',
        //         'alamat'    => 'Bima Jl. Lancogaja',
        //         'created_at'    => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Ali',
        //         'alamat'    => 'Lombok Jl. Lancogaja',
        //         'created_at'    => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Hadi',
        //         'alamat'    => 'Mataram Jl. Lancogaja',
        //         'created_at'    => Time::now(),
        //         'updated_at' => Time::now()
        //     ]

        // ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, 
        //     :created_at:, :updated_at:)",
        //     $data
        // );

        // Using Query Builder
        //untuk insert 1
        //$this->db->table('orang')->insert($data);
        //untuk insert 2
        // $this->db->table('orang')->insertBatch($data);
    }
}
