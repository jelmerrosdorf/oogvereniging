<x-app-layout>
    <x-slot name="header">
        <div class="max-w-6xl mx-auto mt-8 mb-6">
            <h1 class="font-bold text-5xl text-oogvereniging-blue">
                Activiteiten
            </h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-6xl mx-auto">
            @if ($message = Session::get('success'))
                <div>
                    <p class="text-xl px-10 py-6 my-12 w-max border-2 border-oogvereniging-red
                    rounded-lg bg-oogvereniging-white text-oogvereniging-blue font-semibold">
                    {{ $message }}</p>
                </div>
            @endif

            <p class="text-lg text-oogvereniging-blue tracking-wide">
                Van oogcafés tot webinars: in deze agenda vind je al onze activiteiten. Zoek op provincie of op onderwerp en meld je aan!
            </p>

            <form action="{{ route('events.create') }}" method="get">
                <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                bg-oogvereniging-red px-5 py-3 my-8 rounded-lg border border-oogvereniging-black
                shadow">Nieuwe activiteit</button>
            </form>

            <h2 class="font-semibold text-3xl text-oogvereniging-blue mb-6">
                Filter de activiteiten
            </h2>

            <div>
                <form action="">
                    <label for="province" class="text-lg text-oogvereniging-blue
                    tracking-wide">Filter op provincie</label>
                    <select id="province" class="block min-w-1/4 text-oogvereniging-blue
                    tracking-wide rounded shadow hover:border hover:border-oogvereniging-blue
                    focus:border focus:border-oogvereniging-blue">
                        <option value="alles">Alles</option>
                        <option value="zuid-holland">Zuid-Holland</option>
                        <option value="noord-holland">Noord-Holland</option>
                        <option value="noord-brabant">Noord-Brabant</option>
                    </select>
                </form>
            </div>

            <div class="my-6">
                <form action="">
                    <label for="subject" class="text-lg text-oogvereniging-blue
                    tracking-wide">Filter op onderwerp</label>
                    <select id="subject" class="block min-w-1/4 text-oogvereniging-blue
                    tracking-wide rounded shadow hover:border hover:border-oogvereniging-blue
                    focus:border focus:border-oogvereniging-blue">
                        <option value="alles">Alles</option>
                        <option value="digiwijs">Digiwijs</option>
                        <option value="glaucoom">Glaucoom</option>
                        <option value="oor&oog">Oor & oog</option>
                    </select>
                </form>
            </div>

            <h2 class="font-semibold text-3xl text-oogvereniging-blue mt-8">
                Activiteiten
            </h2>

            <div class="flex justify-between py-6">
                @foreach ($events as $event)
                    <div onclick="location.href='{{ route('events.show',$event->id) }}';"
                         class="border-2 border-oogvereniging-blue rounded bg-oogvereniging-white
                          text-oogvereniging-blue font-semibold p-5 shadow-xl w-4,5/10 flex
                          flex-col justify-between gap-8 focus:border-oogvereniging-red
                          hover:border-oogvereniging-red focus:cursor-pointer hover:cursor-pointer">
                        <h3 class="text-2xl mb-4 underline underline-offset-4">{{ $event->title
                        }}</h3>
                        <div class="flex justify-between items-baseline">
                            <p class="text-lg mb-4 tracking-wide">{{
                            $event->datetime_start }}</p>
                            <div class="flex gap-4">
                                @if($event->tag_province != '')
                                    <p class="tracking-wide border rounded
                                    border-oogvereniging-black bg-oogvereniging-purple
                                    text-oogvereniging-white p-2">{{ $event->tag_province }}</p>
                                @endif
                                @if($event->tag_subject != '')
                                    <p class="tracking-wide border rounded
                                    border-oogvereniging-black bg-oogvereniging-purple
                                    text-oogvereniging-white p-2">{{ $event->tag_subject }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </x-slot>
</x-app-layout>

