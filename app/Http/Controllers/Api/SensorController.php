<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorReading;

class SensorController extends Controller
{
    // MENERIMA DATA DARI RASPBERRY PI
    public function store(Request $request)
    {
        $request->validate([
            'gas_ppm' => 'required|integer',
            'flame_detected' => 'required|integer|in:0,1'
        ]);

        // LOGIC STATUS
        if ($request->flame_detected == 1 || $request->gas_ppm > 5000) {
            $status = 'BAHAYA';
        } elseif ($request->gas_ppm >= 2000) {
            $status = 'WASPADA';
        } else {
            $status = 'AMAN';
        }

        $data = SensorReading::create([
            'gas_ppm' => $request->gas_ppm,
            'flame_detected' => $request->flame_detected,
            'status' => $status
        ]);

        return response()->json([
            'message' => 'Data sensor berhasil disimpan',
            'data' => $data
        ], 201);
    }

    // DATA TERBARU (REALTIME)
    public function latest()
    {
        return response()->json(
            SensorReading::orderBy('created_at', 'desc')->first()
        );
    }

    // HISTORI DATA (GRAFIK)
    public function history()
    {
        return response()->json(
            SensorReading::orderBy('created_at', 'desc')->limit(50)->get()
        );
    }
}
