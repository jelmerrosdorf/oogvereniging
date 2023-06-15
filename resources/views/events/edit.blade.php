<x-app-layout>
    <x-slot name="header">
        <div class="max-w-6xl mx-auto mt-8 mb-12">
            <div class="flex gap-5">
                <svg width="34" height="22" viewBox="0 0 34 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.65 3.3103L3 11.1265L10.65 18.9427" fill="white"/>
                    <path d="M10.65 3.3103L3 11.1265L10.65 18.9427" stroke="#B11031" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M31.5001 11.1265H6.45013" stroke="#B11031" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <div class="mb-7 -mt-1">
                    <a href="{{ route('events.index') }}" class="text-lg tracking-wide
                    text-oogvereniging-blue underline underline-offset-4
                    hover:text-oogvereniging-red focus:text-oogvereniging-red">Terug naar alle
                        activiteiten</a>
                </div>
            </div>

            <h1 class="font-bold text-5xl text-oogvereniging-blue">
                {{ $event->title }}
            </h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-6xl mx-auto">
            <form action="{{ route('events.update', $event->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col gap-8">
                    <div class="flex gap-4 items-center">
                        <label for="title" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Titel</label>
                        <textarea id="title" name="title" rows="2" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue resize-none">{{ $event->title }}</textarea>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="datetime_start" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Start</label>
                        <input id="datetime_start" name="datetime_start" type="text" class="w-2/5
                        border-2 rounded-lg border-oogvereniging-blue" value="{{
                        $event->datetime_start }}">
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="datetime_end" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Eind</label>
                        <input id="datetime_end" name="datetime_end" type="text" class="w-2/5
                        border-2 rounded-lg border-oogvereniging-blue" value="{{
                        $event->datetime_end }}">
                    </div>
                    <div class="flex gap-4 items-center">
                        <label for="location" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Locatie</label>
                        <textarea id="location" name="location" rows="2" class="w-2/5 border-2
                        rounded-lg border-oogvereniging-blue resize-none">{{ $event->location
                        }}</textarea>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="price" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Prijs niet-leden</label>
                        <input id="price" name="price" type="text" value="{{ $event->price }}"
                               class="w-2/5
                        border-2
                        rounded-lg border-oogvereniging-blue">
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="price_member" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Prijs leden</label>
                        <input id="price_member" name="price_member" type="text" value="{{
                        $event->price_member }}" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue">
                    </div>
                    <div class="flex gap-4 items-center">
                        <label for="description" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Omschrijving</label>
                        <textarea id="description" rows="6" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue resize-none" name="description">{{
                        $event->description }}</textarea>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="public" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Status</label>
                        <select id="public" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue tracking-wide" name="public">
                            <option @if($event->public == 1) selected="selected" @endif
                            value="1">Publiceren</option>
                            <option @if($event->public == 0) selected="selected" @endif
                            value="0">Concept</option>
                        </select>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="tag_province" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Provincie</label>
                        <select id="tag_province" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue tracking-wide" name="tag_province">
                            <option @if($event->tag_province == 'Landelijk')
                            selected="selected" @endif
                            value="Landelijk">Landelijk</option>
                            <option @if($event->tag_province == 'Zuid-Holland')
                            selected="selected" @endif
                            value="Zuid-Holland">Zuid-Holland</option>
                            <option @if($event->tag_province == 'Noord-Holland')
                            selected="selected" @endif
                            value="Noord-Holland">Noord-Holland</option>
                            <option @if($event->tag_province == 'Noord-Brabant')
                            selected="selected" @endif
                            value="Noord-Brabant">Noord-Brabant</option>
                        </select>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="tag_subject" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Onderwerp</label>
                        <select id="tag_subject" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue tracking-wide" name="tag_subject">
                            <option @if($event->tag_subject == 'Digiwijs') selected="selected"
                            @endif value="Digiwijs">Digiwijs</option>
                            <option @if($event->tag_subject == 'Glaucoom') selected="selected"
                            @endif value="Glaucoom">Glaucoom</option>
                            <option @if($event->tag_subject == 'Oor & oog') selected="selected"
                            @endif value="Oor & oog">Oor & oog</option>
                            <option @if($event->tag_subject == 'Sportief') selected="selected"
                            @endif value="Sportief">Sportief</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="text-xl font-semibold tracking-wide
                        text-oogvereniging-white bg-oogvereniging-red px-5 py-3 my-8
                        rounded-lg border border-oogvereniging-black
                        shadow">Wijzigingen opslaan</button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>
