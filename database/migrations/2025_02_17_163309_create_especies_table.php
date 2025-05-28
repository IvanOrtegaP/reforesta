<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cientifico', 150)->unique();
            $table->text('crecimiento')->nullable();
            $table->string('region', 100)->nullable();
            $table->string('clima', 100)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('enlace', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('especies');
    }
};
