<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />

        <!-- Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- Datatables -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="{{ asset('dashboard/assets/css/style.css') }}">
        <x-rich-text::styles theme="richtextlaravel" data-turbo-track="false" />
    </head>
    <body class="bg-body-secondary">
        <div class="d-flex" id="wrapper">
            @include('author.layouts.sidebar')

            <!-- Page content wrapper-->
            <div id="page-content-wrapper" class="position-relative overflow-hidden">
                @include('author.layouts.navigation')

                @yield('content')

                <div class="card border-0 rounded-0 position-absolute start-0 end-0 bottom-0">
                    <div class="card-body">
                        <div class="container">
                            <p class="text-body-secondary mb-0">Copyright &copy; {{ date('Y') }} | ProcodeBlogs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 color-mode-toggle" style="z-index: 999999">
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Datatables -->
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- Color Mode -->
        <script src="{{ asset('dashboard/assets/js/color-modes.js') }}"></script>
        <!-- Rich Text Editor -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.1/tinymce.min.js"></script>
        <script src="{{ asset('dashboard/assets/js/scripts.js') }}"></script>

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
