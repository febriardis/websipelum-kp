<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbPemilih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pemilih', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mhs_id');
            $table->unsignedInteger('agenda_id');
            $table->string('ket_vote');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('tb_pemilih', function(Blueprint $kolom){
            $kolom->foreign('mhs_id')->references('id')->on('tb_mahasiswa')->onDelete('cascade')->onUpdate('cascade');
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
       Schema::dropIfExists('tb_pemilih');
    }
}
