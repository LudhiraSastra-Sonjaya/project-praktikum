<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sensor_readings', function (Blueprint $table) {
            $table->id();
            $table->integer('gas_ppm');
            $table->tinyInteger('flame_detected')->comment('0 = tidak ada api, 1 = api terdeteksi');
            $table->enum('status', ['AMAN', 'WASPADA', 'BAHAYA']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sensor_readings');
    }
};
