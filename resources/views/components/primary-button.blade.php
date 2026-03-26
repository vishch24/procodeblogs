<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 btn btn-success border-0 text-uppercase shadow-sm']) }}>
    {{ $slot }}
</button>
