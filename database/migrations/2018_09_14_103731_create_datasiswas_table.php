<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *kelas / mata plajaran / absensi /piket
     * @return void
     */
    public function up()
    {
        Schema::create('datasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis');
            $table->string('kode_kelas');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('Alamat');
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
        Schema::dropIfExists('datasiswas');
    }
}
