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
                Nieuwe activiteit toevoegen
            </h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-6xl mx-auto">
            @if ($errors->any())
                <div>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-8">
                    <div class="flex gap-4 items-center">
                        <label for="title" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Titel</label>
                        <textarea id="title" name="title" rows="2" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue resize-none focus:border-oogvereniging-blue-alt"></textarea>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="datetime_start" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Start</label>
                        <input id="datetime_start" name="datetime_start" type="text" class="w-2/5
                        border-2 rounded-lg border-oogvereniging-blue focus:border-oogvereniging-blue-alt">
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="datetime_end" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Eind</label>
                        <input id="datetime_end" name="datetime_end" type="text" class="w-2/5
                        border-2 rounded-lg border-oogvereniging-blue focus:border-oogvereniging-blue-alt">
                    </div>
                    <div class="flex gap-4 items-center">
                        <label for="location" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Locatie</label>
                        <textarea id="location" name="location" rows="2" class="w-2/5 border-2
                        rounded-lg border-oogvereniging-blue resize-none focus:border-oogvereniging-blue-alt"></textarea>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="price" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Prijs niet-leden</label>
                        <input id="price" name="price" type="text" value="€" class="w-2/5 border-2
                        rounded-lg border-oogvereniging-blue focus:border-oogvereniging-blue-alt">
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="price_member" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Prijs leden</label>
                        <input id="price_member" name="price_member" type="text" value="€" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue focus:border-oogvereniging-blue-alt">
                    </div>
                    <div class="flex gap-4 items-center">
                        <label for="description" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Omschrijving</label>
                        <textarea id="description" rows="6" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue resize-none focus:border-oogvereniging-blue-alt" name="description"></textarea>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="public" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Status</label>
                        <select id="public" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue tracking-wide focus:border-oogvereniging-blue-alt" name="public">
                            <option value="1">Publiceren</option>
                            <option value="0">Concept</option>
                        </select>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="tag_province" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Provincie</label>
                        <select id="tag_province" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue tracking-wide focus:border-oogvereniging-blue-alt" name="tag_province">
                            <option value="Landelijk">Landelijk</option>
                            <option value="Zuid-Holland">Zuid-Holland</option>
                            <option value="Noord-Holland">Noord-Holland</option>
                            <option value="Noord-Brabant">Noord-Brabant</option>
                        </select>
                    </div>
                    <div class="flex gap-4 items-baseline">
                        <label for="tag_subject" class="text-xl font-semibold text-oogvereniging-blue
                        tracking-wide min-w-150">Onderwerp</label>
                        <select id="tag_subject" class="w-2/5 border-2 rounded-lg
                        border-oogvereniging-blue tracking-wide focus:border-oogvereniging-blue-alt" name="tag_subject">
                            <option value="Digiwijs">Digiwijs</option>
                            <option value="Glaucoom">Glaucoom</option>
                            <option value="Oor & oog">Oor & oog</option>
                            <option value="Sportief">Sportief</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="text-xl font-semibold tracking-wide
                        text-oogvereniging-white bg-oogvereniging-red px-5 py-3 my-8
                        rounded-lg border border-oogvereniging-black
                        shadow">Activiteit opslaan</button>
                    </div>
                </div>
            </form>
        </div>
    </x-slot>
</x-app-layout>






