<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('num_vol',6);
            $table->dateTime('date_depart');
            $table->dateTime('date_arriver');
            $table->time('duree_vol');
            $table->unsignedBigInteger('num_ville_depart');
            $table->unsignedBigInteger('num_ville_arriver');
            $table->unsignedBigInteger('nombre_place_restante');
            
            $table->double('prix_vol');
            $table->unsignedBigInteger('num_avion');
            $table->string('code_aeroport_depart',3);
            $table->string('code_aeroport_arriver',3);
            $table->unsignedBigInteger('num_terminal_depart');
            $table->unsignedBigInteger('num_terminal_arriver');
            $table->time('heure_embarquement');
            $table->string('porte_embarquement');
            $table->double('prix_bagage_sup');


         
        });
        Schema::table('vols', function($table) 
        {
            $table->foreign('num_avion')->references('num_avion')->on('avions');
            $table->foreign('code_aeroport_depart')->references('code_aeroport')->on('aeroports');
            $table->foreign('code_aeroport_arriver')->references('code_aeroport')->on('aeroports');
            $table->foreign('num_ville_depart')->references('code_postal_ville')->on('villes');
            $table->foreign('num_ville_arriver')->references('code_postal_ville')->on('villes');
            $table->foreign('num_terminal_depart')->references('id')->on('terminals');
            $table->foreign('num_terminal_arriver')->references('id')->on('terminals');
        });






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vols');
    }
}
