<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            #$table->string('nama_role')->unique();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_admin');
            $table->unsignedBigInteger('id_perusahaan');
            $table->unsignedBigInteger('id_alumni');
            $table->foreign('id_user')->references('id')->on('users')->nullable();
            $table->foreign('id_admin')->references('id')->on('admin')->nullable();
            $table->foreign('id_perusahaan')->references('id')->on('perusahaan')->nullable();
            $table->foreign('id_alumni')->references('id')->on('alumni')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
