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
        Schema::create('sensor_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gateway_id')->constrained();
            $table->foreignId('sensor_id')->constrained();
            $table->string('voltage_ab')->nullable();
            $table->string('voltage_bc')->nullable();
            $table->string('voltage_ca')->nullable();
            $table->string('current_a')->nullable();
            $table->string('current_b')->nullable();
            $table->string('current_c')->nullable();
            $table->string('real_power')->nullable();
            $table->string('apparent_power')->nullable();
            $table->string('energy')->nullable();
            $table->string('temperature')->nullable();
            $table->string('humidity')->nullable();
            $table->string('volume')->nullable();
            $table->string('flow')->nullable();
            $table->string('pressure')->nullable();
            $table->string('co2')->nullable();
            $table->string('pm25_pm10')->nullable();
            $table->string('o2')->nullable();
            $table->string('nox')->nullable();
            $table->string('co')->nullable();
            $table->string('s02')->nullable();
            $table->dateTime('datetime_created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_logs');
    }
};
