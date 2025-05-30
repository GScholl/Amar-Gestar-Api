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
        Schema::create('professionals_specialitys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professional_id')->constrained('professionals');
            $table->foreignId('speciality_id')->constrained('specialitys');
            $table->string('speciality_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionals_specialitys');
    }
};
