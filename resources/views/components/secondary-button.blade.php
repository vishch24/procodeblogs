<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 btn btn-secondary text-uppercase rounded-0 border-0 shadow-sm']) }}>
    {{ $slot }}
</button>
