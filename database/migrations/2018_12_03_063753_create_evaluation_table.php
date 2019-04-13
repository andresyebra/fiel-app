<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('evaluations');
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('competente');
            $table->string('cumplia');
            $table->string('satisfecho');
            $table->string('renuncia');
            $table->string('perido_laboro');
            $table->string('empleado_id');
            $table->string('empresa');
            $table->string('equipo');
            $table->string('antidoping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
