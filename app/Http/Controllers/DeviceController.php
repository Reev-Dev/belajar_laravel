<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::orderBy('id', 'asc')->paginate(5);
        return view('device.index', compact('devices'));
    }

    public function create()
    {
        return view('device.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => ['required'],
            'meta_data' => ['required'],
        ], [
            'serial_number.required' => 'Serial number harus diisi.',
            'meta_data.required' => 'Meta data harus diisi.',
        ]);

        $deviceData = [
            "serial_number" => $request->serial_number,
            "meta_data" => $request->meta_data,
        ];

        $devices = Device::create($deviceData);

        return redirect('/device')->with('success', 'Data device berhasil disimpan.');
    }

    public function edit($id)
    {
        $devices = Device::findOrFail($id);
        return view('device.edit', compact('devices'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_number' => 'required',
            'meta_data' => 'required',
        ], [
            'serial_number.required' => 'Serial number harus diisi.',
            'meta_data.required' => 'Meta data harus diisi.',
        ]);

        $deviceData = [
            'serial_number' => $request->serial_number,
            'meta_data' => $request->meta_data,
        ];
        
        $devices = Device::findOrFail($id);
        $devices->update($deviceData);
        
        return redirect()->route('device.index')->with('success', 'Data device berhasil diperbarui.');
    }

    public function delete($id)
    {
        $devices = Device::findOrFail($id);
        $devices->delete();
        return redirect()->route('device.index')->with('success', 'Data device berhasil dihapus.');
    }
}
