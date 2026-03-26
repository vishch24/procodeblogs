<!-- jQuery (must be before toastr.js) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Prism.js Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<!-- Color Mode -->
<script src="{{ asset('dashboard/assets/js/color-modes.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}", "Success!", {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-left",
            "timeOut": "5000",
        });
    </script>
@endif

@if (session('error'))
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
