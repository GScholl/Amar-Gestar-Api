<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pregnants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cpf')->unique()->nullable(true);
            $table->string('email')->unique();
            $table->enum('type', ['pregnant', 'mother'])->default('pregnant');
            $table->string('baby_name')->nullable(true);
            $table->enum('baby_genre',['M','F','ND'])->default('ND');
            $table->datetime("baby_birth_date")->nullable(true);
            $table->dateTime('pregnant_date')->nullable(true);
            $table->string('password');
            $table->string('phone')->nullable(true);
            $table->string('device_token')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestantes');
    }
};
