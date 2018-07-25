<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProizvodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proizvods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slika');
            $table->string('naziv');
            $table->string('opis');
            $table->integer('kategorija_id')->unsigned();
            $table->index('kategorija_id');
            $table->integer('kolicina');
            $table->double('cenaPoKomadu');
            $table->timestamps();
             $table->foreign('kategorija_id')->references('id')->on('kategorijas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proizvods');
    }
}
