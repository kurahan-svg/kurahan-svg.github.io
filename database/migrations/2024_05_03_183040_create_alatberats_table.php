<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatberatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alatberats', function (Blueprint $table) {
            $table->id('id_alatberat');
            $table->string('alatberat');
            $table->integer('jumlah');
            $table->integer('usia');
            $table->decimal('harga',20,2);
            $table->string('kondisi');
            $table->string('penempatan');
            $table->bigInteger('id_proyek');
            $table->string('nama_proyek');
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
        Schema::dropIfExists('alatberats');
    }
}
