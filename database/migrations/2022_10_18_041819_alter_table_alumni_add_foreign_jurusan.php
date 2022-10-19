<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAlumniAddForeignJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropColumn("jurusan");
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->string("jurusan");
            $table->dropColumn('id_jurusan');
        });
    }
}
