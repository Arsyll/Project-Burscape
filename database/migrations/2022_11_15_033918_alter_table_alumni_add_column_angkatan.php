<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAlumniAddColumnAngkatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->string("angkatan")->nullable();
            $table->string("alamat")->nullable()->change();
            $table->date("tanggal_lahir")->nullable()->change();
            $table->string("foto_profile")->nullable()->change();
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
            $table->dropColumn("angkatan");
            $table->string("alamat")->nullable(false)->change();
            $table->date("tanggal_lahir")->nullable(false)->change();
            $table->string("foto_profile")->nullable(false)->change();
        });
    }
}
