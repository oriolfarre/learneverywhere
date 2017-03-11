<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Preguntes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('preguntes', function (Blueprint $table) {
          $table->increments('id_pregunta');
          $table->string('pregunta');
          $table->string('descripcio');
          $table->string('imatge');
          $table->integer('estat');
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
      Schema::drop('preguntes');
    }
}
