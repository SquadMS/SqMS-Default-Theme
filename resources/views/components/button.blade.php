<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn text-uppercase']) }}>
    {{ $slot }}
</button>