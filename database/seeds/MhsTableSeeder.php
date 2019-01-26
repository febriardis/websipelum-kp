<?php

use Illuminate\Database\Seeder;

class MhsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Mahasiswa::insert([
            [
              'nim'			    => '1157050055',
              'nama'		    => 'Febri Ardi Saputra',
              'jurusan'		  => 'Teknik Informatika',
              'fakultas'    => 'Sains dan Teknologi',
              'th_angkatan' => '2015',
              'foto'        => '1638123.JPG',
              'password'    => bcrypt('febri1234'),
              'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')
            ],  
            [
              'nim'         => '1157050050',
              'nama'        => 'Rizal Zaelani',
              'jurusan'     => 'Teknik Informatika',
              'fakultas'    => 'Sains dan Teknologi',
              'th_angkatan' => '2015',
              'foto'        => '3123124.JPG',
              'password'    => bcrypt('rizal1234'),
              'created_at'  => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'  => \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nim'         => '1157050053',
              'nama'        => 'Harits Rahman MM',
              'jurusan'     => 'Teknik Informatika',
              'fakultas'    => 'Sains dan Teknologi',
              'th_angkatan' => '2015',
              'foto'        => '3123124.JPG',
              'password'    => bcrypt('haris1234'),
              'created_at'  => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'  => \Carbon\Carbon::now('Asia/Jakarta')
            ],          

            [
              'nim'         => '1154050123',
              'nama'        => 'Rahmat',
              'jurusan'     => 'Manajemen',
              'fakultas'    => 'Ilmu Sosial dan Ilmu Politik',
              'th_angkatan' => '2016',
              'foto'        => '8712192.JPG',
              'password'    => bcrypt('rahmat1234'),
              'created_at'  => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'  => \Carbon\Carbon::now('Asia/Jakarta')
            ],                    
            [
              'nim'         => '1154050012',
              'nama'        => 'Joko Rahmat',
              'jurusan'     => 'Kimia',
              'fakultas'    => 'Sains dan Teknologi',
              'th_angkatan' => '2016',
              'foto'        => '3123124.JPG',
              'password'    => bcrypt('rahmat1234'),
              'created_at'  => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'  => \Carbon\Carbon::now('Asia/Jakarta')
            ], 
        ]);   
    }

}
