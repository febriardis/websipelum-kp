<?php

use Illuminate\Database\Seeder;

class JurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Jurusan::insert([
      		// Fakultas Ushuludin
        	[
        		'fak_id'		=> 1,
        		'nm_jurusan' 	=> 'Aqidah dan Filsafat Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 1,
        		'nm_jurusan' 	=> 'Studi Agama-Agama',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 1,
        		'nm_jurusan' 	=> 'Ilmu Al-Quran dan Tafsir',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 1,
        		'nm_jurusan' 	=> 'Tasawuf Psikoterapi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	// Fakultas Tarbiyah dan Keguruan
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Manajemen Pendidikan Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Pendidikan Agama Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Pendidikan Bahasa Arab',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Pendidikan Matematika',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Pendidikan Biologi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Pendidikan Fisika',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'MPendidikan Kimia',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Pendidikan Guru MI (PGMI)',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 2,
        		'nm_jurusan' 	=> 'Pendidikan Islam Anak Usia Dini',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	//Fakultas Syariah dan Hukum
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Hukum Keluarga (Ahwal Al-Syakhsiyah)',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Hukum Ekonomi Syariah (Muamalah)',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Hukum Tata Negara (Siyasah)',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Perbandingan Madzhab dan Hukum',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Ilmu Hukum',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Hukum Pidana Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Manajemen Keuangan Syariah',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Akutansi Syariah',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 3,
        		'nm_jurusan' 	=> 'Ekonomi Syariah',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	//Fakultas Dakwah dan  Komunikasi
        	[
        		'fak_id'		=> 4,
        		'nm_jurusan' 	=> 'Bimbingan Konseling Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 4,
        		'nm_jurusan' 	=> 'Komunikasi dan Penyiaran Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 4,
        		'nm_jurusan' 	=> 'Manajemen Dakwah',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 4,
        		'nm_jurusan' 	=> 'Pengembangan Masyarakat Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 4,
        		'nm_jurusan' 	=> 'Ilmu Komunikasi Jurnalistik',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 4,
        		'nm_jurusan' 	=> 'Ilmu Komunikasi Humas',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	//Fakultas Adab dan Humaniora
        	[
        		'fak_id'		=> 5,
        		'nm_jurusan' 	=> 'Sejarah dan Peradaban Islam',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 5,
        		'nm_jurusan' 	=> 'Bahasa dan Sastra Arab',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 5,
        		'nm_jurusan' 	=> 'Sastra Inggris',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	//Fakultas Psikologi
        	[
        		'fak_id'		=> 6,
        		'nm_jurusan' 	=> 'Psikologi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	//Fakultas Sains dan Teknologi
        	[
        		'fak_id'		=> 7,
        		'nm_jurusan' 	=> 'Matematika',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 7,
        		'nm_jurusan' 	=> 'Biologi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 7,
        		'nm_jurusan' 	=> 'Fisika',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 7,
        		'nm_jurusan' 	=> 'Kimia',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 7,
        		'nm_jurusan' 	=> 'Teknik Informatika',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 7,
        		'nm_jurusan' 	=> 'Agroteknologi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 7,
        		'nm_jurusan' 	=> 'Teknik Elektro',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],

        	//Fakultas Ilmu Sosial dan Ilmu Politik     	
        	[
        		'fak_id'		=> 8,
        		'nm_jurusan' 	=> 'Administrai Publik',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 8,
        		'nm_jurusan' 	=> 'Manajemen',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 8,
        		'nm_jurusan' 	=> 'Sosiologi',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        	[
        		'fak_id'		=> 8,
        		'nm_jurusan' 	=> 'Ilmu Politik',    
              	'created_at'	=> \Carbon\Carbon::now('Asia/Jakarta'),
              	'updated_at'	=> \Carbon\Carbon::now('Asia/Jakarta')   			
        	],
        ]);
    }
}
