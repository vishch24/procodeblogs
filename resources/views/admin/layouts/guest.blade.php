<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
        <x-rich-text::styles theme="richtextlaravel" data-turbo-track="false" />
    </head>
    <body class="bg-body-secondary">
        @yield('content')

        <div class="dropdown position-fixed z-1 bottom-0 end-0 mb-3 me-3 color-mode-toggle">
            <button class="btn btn-secondary py-2 dropdown-toggle d-flex align-items-center shadow" id="color-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                <span class="my-1 theme-icon-active" width="1em" height="1em"><i class="bi bi-circle-half"></i></span>
                <span class="visually-hidden" id="color-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end py-0 shadow" aria-labelledby="color-theme-text">
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                        <span class="me-2 opacity-50" width="1em" height="1em"><i class="bi bi-sun-fill"></i></span>
                        Light
                        <span id="check2" class="ms-auto d-none" width="1em" height="1em"><i class="bi bi-check2"></i></span>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                        <span class="me-2 opacity-50" width="1em" height="1em"><i class="bi bi-moon-stars-fill"></i></span>
                        Dark
                        <span class="ms-auto d-none" width="1em" height="1em"><i class="bi bi-check2"></i></span>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <span class="me-2 opacity-50" width="1em" height="1em"><i class="bi bi-circle-half"></i></span>
                    Auto
                    <span class="ms-auto d-none" width="1em" height="1em"><i class="bi bi-check2"></i></span>
                    </button>
                </li>
            </ul>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- Color Mode -->
        <script src="{{ asset('dashboard/assets/js/color-modes.js') }}"></script>

        @if(session('success'))
            <script>
                toastr.success("{{ session('success') }}", "Success!", {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-left",
                    "timeOut": "5000",
                });
            </script>
        @endif

        @if(session('error'))
            @foreach (session('error')->all() as $key => $message)
                <script>
                    toastr.error("{{ $message }}", "Error!", {
                        "closeButton": true,
                        "progressBar": true,
                        "positionClass": "toast-bottom-left",
                        "timeOut": "5000",
                    });
                </script>
            @endforeach
        @endif
    </body>
</html>
