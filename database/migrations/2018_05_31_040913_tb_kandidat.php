<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbKandidat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kandidat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jen_kelamin');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->unsignedInteger('nim');
            $table->string('jurusan');
            $table->string('fakultas');
            $table->string('foto');
            $table->string('agama');
            $table->string('no_hp');
            $table->string('email');
            $table->string('medsos1');
            $table->string('medsos2');
            $table->string('medsos3');
            $table->string('blog');
            $table->string('anak_ke');
            $table->string('jum_saudara');
            $table->string('asal_sma');
            $table->text('asal_daerah');
            $table->text('motto');
            $table->text('motivasi');
            $table->string('transkrip_nilai');
            $table->unsignedInteger('agenda_id');
            $table->text('visi');
            $table->text('misi');
            $table->string('riwayat_hidup');
            $table->string('keterangan');
            $table->timestamps();
        });
        Schema::table('tb_kandidat', function(Blueprint $kolom){
            $kolom->foreign('nim')->references('nim')->on('tb_mahasiswa')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('agenda_id')->references('id')->on('tb_agenda')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kandidat');
    }
}
