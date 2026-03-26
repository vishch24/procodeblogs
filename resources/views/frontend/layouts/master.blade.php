<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
    @include('frontend.layouts.head')
    <body class="bg-body-secondary">
        <!-- Responsive navbar-->
        @include('frontend.layouts.navbar')

        <!-- Page content-->
        @yield('content')

        <!-- Footer-->
        @include('frontend.layouts.footer')

        @include('frontend.layouts.script')
    </body>
</html>
