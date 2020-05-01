<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallediagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallediagnosticos', function (Blueprint $table) {
           
            $table->bigIncrements('id');
            $table->string('fecha');
            $table->bigInteger('idPaciente')->unsigned();
            $table->foreign('idPaciente')->references('id')->on('pacientes');
            $table->bigInteger('idDiagnostico')->unsigned();
            $table->foreign('idDiagnostico')->references('id')->on('diagnosticos');
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
        Schema::dropIfExists('detallediagnosticos');
    }
}
