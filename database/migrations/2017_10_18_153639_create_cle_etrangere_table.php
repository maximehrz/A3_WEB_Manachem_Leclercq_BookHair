<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleEtrangereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('ville_id')->nullable()->unsigned()->after('id');
            $table->foreign('ville_id')->references('id')->on('villes');

        });

        Schema::table('magasins', function (Blueprint $table) {

            $table->integer('gerant_id')->nullable()->unsigned()->after('id');
            $table->foreign('gerant_id')->references('id')->on('users');

        });



        Schema::table('coiffeurs', function (Blueprint $table) {

            $table->integer('magasin_id')->nullable()->unsigned()->after('id');
            $table->foreign('magasin_id')->references('id')->on('magasins');

        });

        Schema::table('rdvs', function (Blueprint $table) {


            $table->integer('magasin_id')->nullable()->unsigned()->after('id');
            $table->foreign('magasin_id')->references('id')->on('magasins');

            $table->integer('client_id')->nullable()->unsigned()->after('id');
            $table->foreign('client_id')->references('id')->on('users');


        });

        Schema::table('rdv-taches', function (Blueprint $table) {


            $table->integer('tache_id')->nullable()->unsigned()->after('id');
            $table->foreign('tache_id')->references('id')->on('tache');

            $table->integer('rdv_id')->nullable()->unsigned()->after('id');
            $table->foreign('rdv_id')->references('id')->on('rdv');


        });

       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cle_etrangere');
    }
}
