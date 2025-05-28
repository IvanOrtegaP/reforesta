<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('beneficios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especie_id')->constrained('especies')->onDelete('cascade');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beneficios');
    }
};
