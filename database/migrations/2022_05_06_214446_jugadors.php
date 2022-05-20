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
        Schema::create('jugadors', function (Blueprint $table) {
            $table->id();

            $table -> string('Dni')->unique();
            $table -> string('Nombre');
            $table -> string('Apellido');
            $table -> bigInteger('Equipo')->unsigned();
            $table -> string('Foto');
            $table -> string('Descripcion',100)->nullable();
            $table->timestamps();
            $table->foreign('Equipo')->references('id')->on('clubs')->onDelete('cascade');
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
};
