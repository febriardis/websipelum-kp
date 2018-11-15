<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Admin::insert([
          [
            'nama'		    => 'Febri Ardi Saputra',
            'username'    => 'admin',//str_random(10),
            'password'    => bcrypt('admin1234'),
            'ket'         => 'Super Admin',
            'ket2'        => '',
            'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
            'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')
          ],
          
          [
            'nama'        => 'Wildan Adzani',
            'username'    => 'wildanadmin',//str_random(10),
            'password'    => bcrypt('wildan1234'),
            'ket'         => 'Admin Dema F',
            'ket2'        => 'Sains dan Teknologi',
            'created_at'  => \Carbon\Carbon::now('Asia/Jakarta'),
            'updated_at'  => \Carbon\Carbon::now('Asia/Jakarta')
          ],
      ]);
    }
}
