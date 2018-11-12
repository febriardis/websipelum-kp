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
              'password'    => bcrypt('febri1234'),
              'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')
            ],          
            [
              'nim'         => '1154050123',
              'nama'        => 'Rahmat',
              'jurusan'     => 'Manajemen',
              'fakultas'    => 'Ilmu Sosial dan Ilmu Politik',
              'th_angkatan' => '2016',
              'password'    => bcrypt('rahmat1234'),
              'created_at'  => \Carbon\Carbon::now('Asia/Jakarta'),
              'updated_at'  => \Carbon\Carbon::now('Asia/Jakarta')
            ], 
        ]);   
    }

}
