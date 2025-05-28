<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nick', 50)->unique();
            $table->string('nombre', 100);
            $table->string('apellidos', 150)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('karma')->default(0);
            $table->boolean('suscrito')->default(false);
            $table->string('avatar', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
