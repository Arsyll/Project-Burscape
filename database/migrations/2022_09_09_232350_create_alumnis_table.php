<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("no_telp");
            $table->string("alamat");
            $table->string("status");
            $table->date("tanggal_lahir");
            $table->string("foto_profile");
            $table->string("jurusan");
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
        Schema::dropIfExists('alumnis');
    }
}
