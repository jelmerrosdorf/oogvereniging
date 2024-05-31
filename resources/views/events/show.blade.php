<x-app-layout>
    <x-slot name="header">
        <div class="max-w-6xl mx-auto mt-8 mb-6">
            <div class="flex gap-5">
                <svg width="34" height="22" viewBox="0 0 34 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.65 3.3103L3 11.1265L10.65 18.9427" fill="white"/>
                    <path d="M10.65 3.3103L3 11.1265L10.65 18.9427" stroke="#B11031" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M31.5001 11.1265H6.45013" stroke="#B11031" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="mb-7 -mt-1">
                    @if ($event->public == 1)
                        <a href="{{ route('events.index') }}" class="text-lg tracking-wide
                        text-oogvereniging-blue underline underline-offset-4
                        hover:text-oogvereniging-red focus:text-oogvereniging-red">Terug naar alle activiteiten</a>
                    @elseif ($event->public == 0)
                        <a href="{{ route('events.concepts') }}" class="text-lg tracking-wide
                        text-oogvereniging-blue underline underline-offset-4
                        hover:text-oogvereniging-red focus:text-oogvereniging-red">Terug naar alle concepten</a>
                    @endif
                </div>
            </div>

            <h1 class="font-bold text-5xl text-oogvereniging-blue">
                {{ $event->title }}
            </h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-6xl mx-auto">
            <p class="text-lg text-oogvereniging-blue">Start</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1">{{
            $event->datetime_start }}</p>
            <p class="text-lg text-oogvereniging-blue mt-3">Eind</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1">{{
            $event->datetime_end }}</p>
        </div>
        <div class="max-w-6xl mx-auto my-6">
            <p class="text-lg text-oogvereniging-blue">Locatie</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1">{{
            $event->location }}</p>
        </div>
        <div class="max-w-6xl mx-auto my-6">
            <p class="text-lg text-oogvereniging-blue">Kosten leden</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1">{{
            $event->price_member }}</p>
            <p class="text-lg text-oogvereniging-blue mt-3">Kosten niet-leden</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1">{{
            $event->price }}</p>
        </div>
        <div class="max-w-6xl mx-auto my-6">
            <p class="text-lg text-oogvereniging-blue">Informatie</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1">{{
            $event->description }}</p>
        </div>
        <div class="max-w-6xl mx-auto my-6">
            <p class="text-lg text-oogvereniging-blue">Aanmelden leden</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1"></p>
            @if ($event->public == 1)
                @if ($isSignedUp)
                    <form action="{{ route('event.signout', $event->id) }}" method="POST">
                        @csrf
                        <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                    bg-oogvereniging-red px-5 py-3 mt-1 rounded-lg border border-oogvereniging-black
                    shadow">Afmelden</button>
                    </form>
                @else
                    <form action="{{ route('event.signup', $event->id) }}" method="POST">
                        @csrf
                        <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                    bg-oogvereniging-red px-5 py-3 mt-1 rounded-lg border border-oogvereniging-black
                    shadow">Direct aanmelden</button>
                    </form>
                @endif
            @endif
        </div>
        <div class="max-w-6xl mx-auto my-6">
            <p class="text-lg text-oogvereniging-blue">Aanmelden niet-leden</p>
            <p class="text-xl font-semibold text-oogvereniging-blue tracking-wide mt-1">Neem contact op met:
                06-12345678</p>
        </div>
        <div class="max-w-6xl mx-auto mt-12 pb-6">
            <form action="{{ route('events.edit', $event->id) }}">
                <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                bg-oogvereniging-red px-5 py-3 mt-1 rounded-lg border border-oogvereniging-black
                shadow">Activiteit wijzigen</button>
            </form>
        </div>
        <div class="max-w-6xl mx-auto mt-12 pb-6">
            <form action="{{ route('event.signups', $event->id) }}">
                <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                bg-oogvereniging-red px-5 py-3 mt-1 mb-16 rounded-lg border border-oogvereniging-black
                shadow">Inschrijvingen bekijken</button>
            </form>
        </div>
    </x-slot>
</x-app-layout>
