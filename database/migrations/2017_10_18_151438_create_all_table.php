<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('magasins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('logo');
         
            $table->timestamps();
        });

        Schema::create('taches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('coef_temps');
            $table->timestamps();
        });

        Schema::create('coiffeurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->boolean('sexe');

            $table->timestamps();
        });

        Schema::create('rdvs', function (Blueprint $table) {
            
            $table->increments('id');
            $table->date('date_debut');
            $table->date('date_fin');

            $table->timestamps();
        });

        Schema::create('rdv-taches', function (Blueprint $table) {
            
            $table->increments('id');


            $table->timestamps();
        });

        Schema::create('villes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cp');
            $table->string('ville');

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
        Schema::dropIfExists('all');
    }
}
