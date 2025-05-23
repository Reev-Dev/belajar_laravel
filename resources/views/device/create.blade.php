@extends('layouts.app')

@section('content')
    <div class="container-xl">
        <div class="d-flex justify-content-between mt-4">
            <h1>Tambah Data Device </h1>
        </div>
        <div class="col-md-12 mt-4">
            <form action="{{ route('device.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Data Device</h3>
                        <p class="card-subtitle">Input data device</p>
                        <div class="input-icon">
                            <input type="text" class="form-control @error('serial_number') is-invalid @enderror" id="serial_number" name="serial_number"
                                placeholder="Serial Number" autofocus autocomplete="off" value="{{ old('serial_number') }}">
                            @error('serial_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-icon mt-2">
                            <input type="text" class="form-control @error('meta_data') is-invalid @enderror" id="meta_data" name="meta_data" placeholder="Meta Data"
                                autofocus autocomplete="off" value="{{ old('meta_data') }}">
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
