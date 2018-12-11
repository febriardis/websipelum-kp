<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbAgendaAjuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_agenda_ajuan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->string('nm_agenda');
            $table->string('sistem_vote');
            $table->string('file');            
            $table->string('kat_jurusan')->nullable(true); //tambahan
            $table->string('kat_fakultas'); //tambahan
            $table->date('tgl_agenda'); //tambahan
            $table->time('timeA1'); //tambahan
            $table->time('timeA2');//tambahan
            $table->string('ket');
            $table->timestamps();
        });

        Schema::table('tb_agenda_ajuan',function (Blueprint $kolom) {
            $kolom->foreign('admin_id')->references('id')->on('tb_admin')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_agenda_ajuan');
    }
}
