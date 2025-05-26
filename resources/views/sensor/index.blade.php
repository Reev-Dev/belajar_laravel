@extends('layouts.app')

@section('content')
    <div class="container custom-container my-3">
        <div class="d-flex justify-content-between mt-4">
            <h1>Data Sensor </h1>
            <a href="/sensor/create" class="btn btn-primary btn-5 d-none d-sm-inline-block">
                Tambah Data Sensor
            </a>
        </div>
        @session('success')
            <div class="alert alert-success mt-4 justify-between" role="alert">
                <div class="flex gap-2">
                    <div class="alert-icon">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon alert-icon icon-2">
                            <path d="M5 12l5 5l10 -10"></path>
                        </svg>
                    </div>
                    {{ session('success') }}
                </div>
                <a class="btn-close items-center justify-center !top-0 pe-4"" data-bs-dismiss="alert" aria-label="close"></a>
            </div>
        @endsession
        <div class="col-12 mt-4">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th class="w-4">No</th>
                                <th class="w-20">Nama Sensor</th>
                                <th class="w-10">Data</th>
                                <th class="w-10">Topic</th>
                                <th class="w-4">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sensor as $item)
                                <tr>
                                    <td>{{ $loop->iteration + ($sensor->currentPage() - 1) * $sensor->perPage() }}</td>
                                    <td>{{ $item->nama_sensor }}</td>
                                    <td class="text-secondary">{{ $item->data }}</td>
                                    <td class="text-secondary">{{ $item->topic }}</td>
                                    <td class="flex gap-2">
                                        <a href="{{ route('sensor.edit', $item->id) }}" class="btn btn-primary">
                                            Edit</a>
                                        <form action="{{ route('sensor.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center mb-[-3]">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $sensor->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
