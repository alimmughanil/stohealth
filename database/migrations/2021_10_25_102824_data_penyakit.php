<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataPenyakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penyakit');
            $table->string('gejala1')->nullable();
            $table->string('gejala2')->nullable();
            $table->string('gejala3')->nullable();
            $table->string('gejala4')->nullable();
            $table->longText('saran_dokter');
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
        Schema::dropIfExists('data_penyakit');
    }
}
