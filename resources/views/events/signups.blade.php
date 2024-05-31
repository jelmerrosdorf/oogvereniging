<x-app-layout>
    <x-slot name="header">
        <div class="max-w-6xl mx-auto mt-8 mb-12">
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
                    <th class="p-4 pl-0 pr-16 text-xl text-left">Naam</th>
                    <th class="p-4 pl-0 text-xl text-left">Emailadres</th>
                </tr>
                </thead>
                <tbody class="text-lg">
                @foreach($users as $user)
                    <tr>
                        <td class="p-4 pl-0 text-lg max-w-sm">{{ $user->name }}</td>
                        <td class="p-4 pl-0 text-lg max-w-sm">{{ $user->email }}</td>
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

