<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('evento_especie', function (Blueprint $table) {
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
            $table->foreignId('especie_id')->constrained('especies')->onDelete('cascade');
            $table->integer('cantidad')->default(1);
            $table->primary(['evento_id', 'especie_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('evento_especie');
    }
};
