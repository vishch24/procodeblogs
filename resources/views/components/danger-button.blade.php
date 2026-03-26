<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 btn btn-danger border-0 rounded-0 text-uppercase']) }}>
    {{ $slot }}
</button>
