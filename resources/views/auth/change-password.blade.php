@extends('layouts.app')
@section('content')
    <div class="mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            @session('success')
                                <div class="alert alert-success mt-4 justify-between" role="alert">
                                    <div class="flex gap-2">
                                        <div class="alert-icon">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon icon-2">
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </div>
                                        {{ session('success') }}
                                    </div>
                                    <a class="btn-close items-center justify-center !top-0 pe-4"" data-bs-dismiss="alert"
                                        aria-label="close"></a>
                                </div>
                            @endsession
                            @session('danger')
                                <div class="alert alert-danger mt-4 justify-between" role="alert">
                                    <div class="flex gap-2">
                                        <div class="alert-icon">
                                            <!-- Download SVG icon from http://tabler.io/icons/icon/check -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon icon-2">
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </div>
                                        {{ session('danger') }}
                                    </div>
                                    <a class="btn-close items-center justify-center !top-0 pe-4"" data-bs-dismiss="alert"
                                        aria-label="close"></a>
                                </div>
                            @endsession
                            <form method="POST" action="/change-password">
                                @csrf
                                @method('POST')
                                <div class="row mb-3">
                                    <label for="current-password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Current Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="current-password" type="password"
                                            class="form-control @error('current-password') is-invalid @enderror"
                                            name="current_password" required autocomplete="current_password">

                                        @error('current-password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Reset Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
