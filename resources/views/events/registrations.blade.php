<x-app-layout>
    <x-slot name="header">
        <div class="max-w-6xl mx-auto mt-8 mb-6">
            <h1 class="font-bold text-5xl text-oogvereniging-blue">
                Inschrijvingen
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
                Op deze pagina vind je een overzicht van alle activiteiten waar je voor staat ingeschreven.
            </p>

            <div class="flex flex-wrap justify-between py-6">
                @if($events->isEmpty())
                    <p class="text-lg text-oogvereniging-blue tracking-wide">
                        Momenteel sta je nog niet ingeschreven voor een activiteit.
                    </p>
                @else
                    @foreach ($events as $event)
                        <div onclick="location.href='{{ route('events.show',$event->id) }}';"
                             class="border-2 border-oogvereniging-blue rounded bg-oogvereniging-white
                              text-oogvereniging-blue font-semibold p-5 shadow-xl w-4,5/10 flex
                              flex-col justify-between gap-8 focus:border-oogvereniging-red
                              hover:border-oogvereniging-red focus:cursor-pointer
                              hover:cursor-pointer mb-12">
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
                    @endforeach
                @endif
            </div>

        </div>
    </x-slot>
</x-app-layout>

