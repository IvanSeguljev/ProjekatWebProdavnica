<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LoginUsers', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Ime');
            $table->string('Prezime');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Uloga');
            $table->double('StanjeNaRacunu');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
