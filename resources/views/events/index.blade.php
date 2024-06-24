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
                In deze agenda vind je al onze activiteiten. Zoek op provincie of op onderwerp en meld je aan!
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
                <form id="filter-form">
                    @csrf
                    <div>
                        <label for="province" class="text-lg text-oogvereniging-blue
                    tracking-wide">Filter op provincie</label>
                        <select name="province" id="province" class="block min-w-1/4 text-oogvereniging-blue
                    tracking-wide rounded shadow hover:border hover:border-oogvereniging-blue
                    focus:border focus:border-oogvereniging-blue">
                            <option value="Alles">Alles</option>
                            @foreach($provinces as $province)
                                <option value="{{ $province }}">{{ $province }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="subject" class="text-lg text-oogvereniging-blue
                    tracking-wide">Filter op onderwerp</label>
                        <select name="subject" id="subject" class="block min-w-1/4 text-oogvereniging-blue
                    tracking-wide rounded shadow hover:border hover:border-oogvereniging-blue
                    focus:border focus:border-oogvereniging-blue">
                            <option value="Alles">Alles</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject }}">{{ $subject }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>


            <h2 class="font-semibold text-3xl text-oogvereniging-blue mt-8">
                Activiteiten
            </h2>

            <div id="events-container" class="flex flex-wrap justify-between py-6">
                @foreach ($events as $event)
                    @if($event->public == 1)
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

            <form action="{{ route('events.export') }}" method="get">
                <button class="text-xl font-semibold tracking-wide text-oogvereniging-white
                bg-oogvereniging-red px-5 py-3 mb-16 rounded-lg border border-oogvereniging-black
                shadow">Exporteer activiteiten</button>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {

                let provinceSelect = document.getElementById('province');
                let subjectSelect = document.getElementById('subject');

                if (provinceSelect && subjectSelect) {

                    provinceSelect.addEventListener('change', updateEvents);
                    subjectSelect.addEventListener('change', updateEvents);

                    function updateEvents() {
                        let province = provinceSelect.value;
                        let subject = subjectSelect.value;

                        fetch(`{{ url('/events') }}?province=${province}&subject=${subject}`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'text/html'
                            }
                        })
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById('events-container').innerHTML = data;
                            })
                            .catch(error => console.error('Error fetching events:', error));
                    }
                } else {
                    console.error('Select elements not found');
                }
            });
        </script>

    </x-slot>

</x-app-layout>

