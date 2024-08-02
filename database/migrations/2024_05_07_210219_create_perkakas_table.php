<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerkakasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perkakas', function (Blueprint $table) {
            $table->id('id_perkakas');
            $table->string('perkakas');
            $table->integer('jumlah');
            $table->decimal('harga',20,2);
            $table->string('kondisi');
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
        Schema::dropIfExists('perkakas');
    }
}
