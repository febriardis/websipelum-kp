<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_agenda', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_id');
            $table->string('nm_agenda');
            $table->string('sistem_vote');
            $table->string('kat_jurusan');
            $table->string('kat_fakultas');
            $table->date('tgl_agenda');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('tb_agenda', function(Blueprint $kolom) {
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
       Schema::dropIfExists('tb_agenda');
    }
}
