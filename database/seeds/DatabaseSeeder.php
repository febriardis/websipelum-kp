<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);//memanggil seeder admin
        $this->call(MhsTableSeeder::class);//memanggil seeder mhs
        $this->call(FakTableSeeder::class);//memanggil seeder fak
        $this->call(JurTableSeeder::class);//memanggil seeder jur
    }
}
