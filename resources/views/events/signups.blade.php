<x-app-layout>
    <x-slot name="header">
        <div class="max-w-6xl mx-auto mt-8 mb-6">
            <h1 class="font-bold text-5xl text-oogvereniging-blue">
                Aanmeldingen voor {{ $event->title }}
            </h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-6xl mx-auto">

            <table>
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Emailadres</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="max-w-6xl mx-auto mt-12 pb-6">
            <form action="{{ route('event.export', $event->id) }}">
                <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                bg-oogvereniging-red px-5 py-3 mt-1 rounded-lg border border-oogvereniging-black
                shadow">Inschrijvingen exporteren</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>

