<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorReading extends Model
{
    use HasFactory;

    protected $table = 'sensor_readings';

    protected $fillable = [
        'gas_ppm',
        'flame_detected',
        'status'
    ];

    protected $casts = [
        'flame_detected' => 'boolean'
    ];
}
