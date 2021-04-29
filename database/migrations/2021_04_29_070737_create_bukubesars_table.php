<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukubesarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukubesar', function (Blueprint $table) {
            $table->id();
            $table->string('id_keuangan');
            $table->string('id_laporan');
            $table->string('nama_akun');
            $table->string('keterangan');
            $table->string('debit');
            $table->string('kredit');
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
        Schema::dropIfExists('bukubesar');
    }
}
