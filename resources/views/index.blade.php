@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="row row-cards">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <a href="{{ route('siswa.create') }}" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal-report">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pembelian</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body row row-cards">
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Siswa</label>
                                        <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa"
                                            autofocus autocomplete="off" value="{{ old('siswa') }}">
                                        @error('siswa')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" autofocus
                                            autocomplete="off" placeholder="Kelas" value="{{ old('kelas') }}">
                                        @error('kelas')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Asal</label>
                                        <input type="text" name="asal" class="form-control" autofocus
                                            autocomplete="off" placeholder="Asal" value="{{ old('asal') }}">
                                        @error('asal')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Foto</label>
                                        <input type="file" name="foto" class="form-control" accept="image/*" autofocus
                                            autocomplete="off">
                                        @error('foto')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 5l0 14"></path>
                                        <path d="M5 12l14 0"></path>
                                    </svg>
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <div class="card" style="height: 60vh">
                    <div class="card-body card-body-scrollable card-body-scrollable-shadow p-0 rounded">
                        <style>
                            .table-responsive {
                                position: relative;
                                height: 59vh;
                                overflow-y: auto;
                            }

                            .table-responsive thead th {
                                position: sticky;
                                top: 0;
                                z-index: 1;
                                background: white;
                            }

                            .table-responsive tbody tr:nth-child(odd) {
                                background-color: #f9f9f9;
                            }

                            .table th,
                            .table td {
                                white-space: nowrap;
                            }

                            .table th.w-4,
                            .table td.w-4 {
                                width: 4%;
                            }

                            .table th.w-10,
                            .table td.w-10 {
                                width: 10%;
                            }

                            .table th.w-20,
                            .table td.w-20 {
                                width: 20%;
                            }

                            .table th.w-15,
                            .table td.w-15 {
                                width: 15%;
                            }
                        </style>
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead class="sticky-top">
                                    <tr>
                                        <th class="w-4">No</th>
                                        <th class="">Nama Siswa</th>
                                        <th class="">Kelas</th>
                                        <th class="w-20">Asal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($siswa as $item)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $item->nama_siswa }}
                                            </td>
                                            <td>
                                                {{ $item->kelas }}
                                            </td>
                                            <td>
                                                {{ $item->asal }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @session('success')
        <div class="alert alert-important alert-success alert-dismissible position-absolute bottom-0 end-0 me-3"
            role="alert">
            <div class="d-flex">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                </div>
                <div>
                    {{ session('success') }}
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    @endsession

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if ($errors->any())
                var myModalNew = new bootstrap.Modal(document.getElementById('modal-report'));
                myModalNew.show();
            @endif
        });
    </script>
@endsection
