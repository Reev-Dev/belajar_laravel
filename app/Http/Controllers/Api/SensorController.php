<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{
    public function index()
    {
        $sensors = Sensor::all();
        return response()->json([
            "status" => "success",
            "code" => 200,
            "message" => "Berhasil mendapatkan data sensor",
            "data" => $sensors,
        ], 200);
    }

    public function show($id)
    {
        $sensors = Sensor::findOrFail($id);
        return response()->json([
            "status" => "success",
            "code" => 200,
            "message" => "Berhasil mendapatkan data sensor dengan id " . $id,
            "data" => $sensors,
        ], 200);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            "nama_sensor" => ['required', 'min:2'],
            "data" => ['required'],
            "topic" => ['required'],
        ], [
            "nama_sensor.required" => "Nama sensor harus diisi",
            "nama_sensor.min" => "Nama sensor minimal 2 karakter",
            "data.required" => "Data harus diisi",
            "topic.required" => "Topic harus diisi",
        ]);

        try {
            if(!$validatedData->fails())
        {
            $sensor = Sensor::create([
                "nama_sensor" => $request->nama_sensor,
                "data" => $request->data,
                "topic" => $request->topic,
            ]);

            if($sensor)
            {
                return response()->json([
                    "status" => "success",
                    "code" => 201,
                    "message" => "Berhasil menyimpan data sensor",
                    "data" => $sensor,
                ], 201);
            } else{
                return response()->json([
                    "status" => "failed",
                    "code" => 500,
                    "message" => "Gagal menyimpan data sensor",
                    "data" => $sensor,
                ], 500);
            }
        } else 
        {
            return response()->json([
                "status" => "failed",
                "code" => 422,
                "message" => "Gagal menyimpan data sensor",
                "data" => $validatedData->errors(),
        ], 422);
        }
        } catch (\Exception $e) {
            return response()->json([
                "status" => "failed",
                "code" => 500,
                "message" => "Gagal menyimpan data sensor",
                "data" => null,
        ], 500);
        }

        
    }
}
