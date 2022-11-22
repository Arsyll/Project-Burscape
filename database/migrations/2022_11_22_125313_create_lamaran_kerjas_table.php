<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaranKerjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamaran_kerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alumni');
            $table->foreign('id_alumni')->references('id')->on('alumni')->onDelete('cascade');
            $table->unsignedBigInteger('id_lowongan');
            $table->foreign('id_lowongan')->references('id')->on('lowongan_kerja')->onDelete('cascade');
            $table->string('email');
            $table->string('no_telp');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lamaran_kerjas');
    }
}
