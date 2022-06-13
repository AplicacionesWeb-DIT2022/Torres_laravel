<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table-> bigInteger('Torneo')->unsigned;
            $table -> bigInteger('Local')->unsigned();
            $table -> bigInteger('Visitante')->unsigned();
            $table -> string('Resultado')->nullable;            
            $table->timestamps();

            $table->foreign('Torneo')->references('id')->on('torneos')->onDelete('cascade');
            $table->foreign('Local')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('Visitante')->references('id')->on('clubs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
};
