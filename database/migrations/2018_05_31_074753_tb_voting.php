<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbVoting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_voting', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('agenda_id');
            $table->unsignedInteger('kandidat_id');
            $table->string('jumlah');
            $table->timestamps();
        });
        Schema::table('tb_voting', function(Blueprint $kolom){
            $kolom->foreign('kandidat_id')->references('id')->on('tb_kandidat')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('tb_voting');
    }
}
