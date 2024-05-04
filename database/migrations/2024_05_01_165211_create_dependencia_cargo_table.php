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
        Schema::create('dependencia_cargo', function (Blueprint $table) {
            $table->foreignId('id_dependencia')->constrained('dependencias');
            $table->foreignId('id_cargo')->constrained('cargos');
            $table->primary(['id_dependencia', 'id_cargo']);
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
        Schema::dropIfExists('dependencia_cargo');
    }
};
