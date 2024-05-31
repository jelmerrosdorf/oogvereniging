<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-oogvereniging-red
border border-oogvereniging-black rounded-md font-semibold text-lg text-oogvereniging-white tracking-wide']) }}>
    {{ $slot }}
</button>
