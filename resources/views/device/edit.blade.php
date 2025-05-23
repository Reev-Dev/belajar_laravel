@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="d-flex justify-content-between mt-4">
            <h1>Edit Data Sensor </h1>
            <a href="{{ route('device.index') }}" class="text-gray-500 hover:text-red-600 text-2xl font-bold">
                <div class="right-2 top-2">
                    <button class="btn btn-6 btn-ghost-danger w-100"> X </button>
                </div>
            </a>
        </div>
        <div class="col-md-12 mt-4">
            <form action="{{ route('device.update', $devices->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Data Device</h3>
                        <p class="card-subtitle">Input data device</p>
                        <div class="input-icon">
                            <input type="text" class="form-control @error('serial_number') is-invalid @enderror"
                                id="serial_number" name="serial_number"
                                value="{{ old('serial_number', $devices->serial_number) }}" placeholder="Serial Number"
                                autofocus autocomplete="off">
                            @error('serial_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-icon mt-2">
                            <input type="text" class="form-control @error('meta_data') is-invalid @enderror"
                                id="meta_data" name="meta_data" value="{{ old('meta_data', $devices->meta_data) }}"
                                placeholder="Meta Data" autofocus autocomplete="off">
                            @error('meta_data')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center justify-content-end">
                            <div class="col-auto">
                                <button class="btn btn-primary btn-2" type="submit">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
