<!DOCTYPE html>
<html>
<head>
    <title>Activiteiten</title>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-oogvereniging-blue leading-tight">
            {{ __('Activiteiten') }}
        </h2>
    </x-slot>
</x-app-layout>

<div class="container">
    @yield('content')
</div>

</body>
</html>
