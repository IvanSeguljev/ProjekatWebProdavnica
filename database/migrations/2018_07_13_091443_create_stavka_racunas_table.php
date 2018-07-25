<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStavkaRacunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stavka_racunas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('racun_id')->unsigned();
            $table->index('racun_id');
            $table->double('iznos');
            $table->string('nazivProizvoda');
            $table->integer('kolicina');
            $table->integer('proizvod_id');
            $table->timestamps();
            $table->foreign('racun_id')->references('id')->on('racuns')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stavka_racunas');
    }
}
