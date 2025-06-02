@extends('layouts.app')

@section('content')
    <div class="container custom-container my-3">
        <div class="d-flex justify-content-between mt-4">
            <h1>Data Device </h1>
            <a href="/device/create" class="btn btn-primary btn-5 d-none d-sm-inline-block">
                Tambah Data Device
            </a>
        </div>
        <div class="col-12 mt-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th class="w-4">No</th>
                                <th class="w-20">Serial Number</th>
                                <th class="w-10">Meta Data</th>
                                <th class="w-4">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devices as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($devices->currentPage() - 1) * $devices->perPage() }}</td>
                                    <td>{{ $item->serial_number }}</td>
                                    <td class="text-secondary">{{ $item->meta_data }}</td>
                                    <td class="flex gap-2">
                                        <a href="{{ route('device.edit', $item->id) }}" class="btn btn-primary">
                                            Edit</a>
                                        <form action="{{ route('device.delete', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $devices->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-success alert-dismissible position-absolute bottom-0 end-0 me-3"" role="alert">
            <div class="alert-icon">
                <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon alert-icon icon-2">
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
            </div>
            {{ session('success') }}
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endsession

@endsection
