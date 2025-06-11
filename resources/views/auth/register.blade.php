<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />

    <title>Register</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/tabler.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.min.css') }}">
</head>

<body>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <form class="card card-md" action="/register" method="post">
                @csrf
                @method('POST')
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Create new account</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="Enter name" autocomplete="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" autocomplete="email"
                            placeholder="Your email" />
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Your password" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">
                            Password Confirmation
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="" autocomplete="off" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-check">
                            <input type="checkbox" class="form-check-input">
                            <span class="form-check-label">Agree the terms and policy.</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Create new account</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">Already have account? <a href="/login" tabindex="-1">Sign
                    in</a></div>
        </div>
    </div>
</body>

</html>
