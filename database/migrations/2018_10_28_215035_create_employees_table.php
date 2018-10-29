<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('employees');
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clave',10);
            $table->string('nombre',100);
            $table->string('curp',18);
            $table->string('imss',11);
            $table->string('empresa',20);
            $table->string('area',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
