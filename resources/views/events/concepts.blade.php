<x-app-layout>
    <x-slot name="header">
        <div class="max-w-6xl mx-auto mt-8 mb-6">
            <h1 class="font-bold text-5xl text-oogvereniging-blue">
                Concepten
            </h1>
        </div>
    </x-slot>

    <x-slot name="content">
        <div class="max-w-6xl mx-auto">
            <p class="text-lg text-oogvereniging-blue tracking-wide">
                Hier vind je alle activiteiten die nog niet gepubliceerd zijn.
            </p>

            <form action="{{ route('events.create') }}" method="get">
                <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                bg-oogvereniging-red px-5 py-3 my-8 rounded-lg border border-oogvereniging-black
                shadow">Nieuwe activiteit</button>
            </form>

            <h2 class="font-semibold text-3xl text-oogvereniging-blue">
                Concepten
            </h2>

            <div class="flex flex-wrap justify-between py-6">
                @foreach ($events as $event)
                    @if($event->public == 0)
                        <div onclick="location.href='{{ route('events.show',$event->id) }}';"
                             class="border-2 border-oogvereniging-blue rounded bg-oogvereniging-white
                              text-oogvereniging-blue font-semibold p-5 shadow-xl w-4,5/10 flex
                              flex-col justify-between gap-8 focus:outline-none focus:border-oogvereniging-red
                              hover:border-oogvereniging-red focus:cursor-pointer
                              hover:cursor-pointer mb-12" tabindex="0" role="button"
                              onkeydown="if(event.key === 'Enter' || event.key === ' ') { this.click(); event.preventDefault(); }">
                            <h3 class="text-2xl mb-4 underline underline-offset-4">
                                {{ $event->title }}</h3>
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
                    @endif
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>

