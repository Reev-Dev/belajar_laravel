<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Sensor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        $sensors = Sensor::orderBy('id', 'desc')->get();
        return view('dashboard.index', compact('devices', 'sensors'));
    }
}
