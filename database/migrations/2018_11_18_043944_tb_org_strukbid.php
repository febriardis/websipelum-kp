<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbOrgStrukbid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_org_strukbid', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bidang_id');
            $table->string('nm_penjabat');
            $table->string('nm_jabatan');
            $table->integer('angkatan');
            $table->timestamps();
        });

        Schema::table('tb_org_strukbid',function (Blueprint $kolom) {
            $kolom->foreign('bidang_id')->references('id')->on('tb_org_bidang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_org_strukbid');
    }
}
