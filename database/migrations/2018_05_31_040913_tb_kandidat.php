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
            $table->unsignedInteger('nim'); //$table->unsignedInteger('mhs_id');
            $table->string('nama');
            $table->string('foto');
            $table->string('jurusan');
            $table->string('angkatan');
            $table->unsignedInteger('agenda_id');
            $table->text('visi');
            $table->text('misi');
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
