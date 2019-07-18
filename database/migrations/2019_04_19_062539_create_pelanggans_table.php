<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->increments('idPelanggan');
            $table->unsignedInteger('idJenisPengguna');
            $table->unsignedInteger('idPeran');
            $table->string('namaPengguna');
            $table->string('email');
            $table->date('tanggalLahir');
            $table->string('jenisKelamin');
            $table->string('password');
            $table->string('alamat');
            $table->string('noTelepon');
            $table->string('kota');
            $table->string('jenisAlamat');
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
        Schema::dropIfExists('pelanggans');
    }
}
