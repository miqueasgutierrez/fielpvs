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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('cedula',20)->unique();
            $table->string('nombres',255);
            $table->string('apellidos',255);
            $table->date('fecha_nacimiento');
            $table->string('telefono',255);
            $table->integer('edad');
            $table->enum('genero', ['masculino','femenino']);
            $table->string('profesion',20);
            $table->string('iglesia',255);
            $table->string('pastor',255);
            $table->string('cargo',255);
            $table->string('ministerio',255);
            $table->string('dependencia',255);
            $table->string('circuito',255);
            $table->integer('zona');
            $table->string('imagen',255);
            $table->string('direccion',255);
            $table->enum('estado_civil', ['soltero','casado']);
            $table->enum('ministro_ordenado', ['si','no']);
             $table->date('fecha_uncion');
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
        Schema::dropIfExists('registros');
    }
};
