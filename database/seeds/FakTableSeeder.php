<?php

use Illuminate\Database\Seeder;

class FakTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Fakultas::insert([
        	[
        		'nm_fakultas' 	=> 'Ushuludin',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'nm_fakultas' 	=> 'Tarbiyah dan Keguruan',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'nm_fakultas' 	=> 'Syariah dan Hukum',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	[
        		'nm_fakultas' 	=> 'Dakwah dan  Komunikasi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	[
        		'nm_fakultas' 	=> 'Adab dan Humaniora',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	[
        		'nm_fakultas' 	=> 'Psikologi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	[
        		'nm_fakultas' 	=> 'Sains dan Teknologi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	[
        		'nm_fakultas' 	=> 'Ilmu Sosial dan Ilmu Politik',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        ]);
    }
}
