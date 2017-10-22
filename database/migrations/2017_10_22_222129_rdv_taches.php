<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RdvTaches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {   Schema::table('rdv_taches', function (Blueprint $table) {
        $table->string('tache_nom')->nullable();

    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
