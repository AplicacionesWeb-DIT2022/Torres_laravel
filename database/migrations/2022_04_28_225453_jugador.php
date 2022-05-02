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

            $table -> string('Nombre');
            $table -> string('Apellido');
            $table -> string('Equipo');
            #$table -> bigInteger('Clubes_id')->unsigned();
            $table -> string('Foto');
            $table -> string('Dni');
            $table->timestamps();
            #$table->foreign('Clubes_id')->references('id')->on('clubes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadors');
    }
};
