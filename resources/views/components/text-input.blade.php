@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-2 border-oogvereniging-blue
focus:border-oogvereniging-blue-alt rounded-lg
shadow']) !!}>
