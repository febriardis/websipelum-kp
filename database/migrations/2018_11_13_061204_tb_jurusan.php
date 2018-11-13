<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jurusan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fak_id');
            $table->string('nm_jurusan');
            $table->timestamps();
        });
        Schema::table('tb_jurusan',function (Blueprint $kolom) {
            $kolom->foreign('fak_id')->references('id')->on('tb_fakultas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jurusan');
    }
}
