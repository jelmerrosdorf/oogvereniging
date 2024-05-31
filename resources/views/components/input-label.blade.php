@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-xl text-oogvereniging-blue']) }}>
    {{ $value ?? $slot }}
</label>
