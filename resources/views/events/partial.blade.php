@foreach ($events as $event)
    @if($event->public == 1)
        <div onclick="location.href='{{ route('events.show',$event->id) }}';"
             class="border-2 border-oogvereniging-blue rounded bg-oogvereniging-white
              text-oogvereniging-blue font-semibold p-5 shadow-xl w-4,5/10 flex
              flex-col justify-between gap-8 focus:border-oogvereniging-red
              hover:border-oogvereniging-red focus:cursor-pointer
              hover:cursor-pointer mb-12">
            <h3 class="text-2xl mb-4 underline underline-offset-4">{{ $event->title }}</h3>
            <div class="flex justify-between items-baseline">
                <p class="text-lg mb-4 tracking-wide">{{ $event->datetime_start }}</p>
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


