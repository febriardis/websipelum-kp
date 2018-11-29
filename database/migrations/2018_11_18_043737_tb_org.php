<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbOrg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_org', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fak_id')->nullable(true);
            $table->unsignedInteger('jur_id')->nullable(true);
            $table->string('nm_organisasi');
            $table->string('ket_organisasi');
            $table->text('visi')->nullable(true);
            $table->text('misi')->nullable(true);
            $table->timestamps();
        });
        Schema::table('tb_org',function (Blueprint $kolom) {
            $kolom->foreign('fak_id')->references('id')->on('tb_fakultas')->onDelete('cascade')->onUpdate('cascade');
            $kolom->foreign('jur_id')->references('id')->on('tb_jurusan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_org');
    }
}
