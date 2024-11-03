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
        Schema::create('guests', function (Blueprint $table) {
            $table->id(); // Идентификатор
            $table->string('first_name'); // Имя
            $table->string('last_name'); // Фамилия
            $table->string('email')->unique()->nullable(); // Email (уникальный)
            $table->string('phone')->unique(); // Телефон (уникальный)
            $table->string('country')->nullable(); // Страна (необязательный)
            $table->timestamps(); // Временные метки created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
