<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('licences');
        Schema::create('licences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('licencia');
            $table->string('fecha_inicial')->nullable();
            $table->string('fecha_final')->nullable();
            $table->string('tipo');
            $table->string('empresa')->nullable();
            $table->string('observacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licences');
    }
}
