<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-oogvereniging-blue leading-tight">
            Activiteiten
        </h2>
    </x-slot>

    <x-slot name="content">
        <div>
            <a href="{{ route('events.create') }}">Nieuwe activiteit</a>
        </div>

        @if ($message = Session::get('success'))
            <div>
                <p>{{ $message }}</p>
            </div>
        @endif

        <table>
            <tr>
                <th>#</th>
                <th>Titel</th>
                <th>Starttijd</th>
                <th>Eindtijd</th>
                <th>Locatie</th>
                <th>Kosten</th>
                <th>Kosten lid</th>
                <th>Omschrijving</th>
                <th>Action</th>
            </tr>
            @foreach ($events as $event)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->datetime_start }}</td>
                    <td>{{ $event->datetime_end }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->price }}</td>
                    <td>{{ $event->price_member }}</td>
                    <td>{{ $event->description }}</td>
                    <td>
                        <form action="{{ route('events.destroy',$event->id) }}" method="POST">

                            <a href="{{ route('events.show',$event->id) }}">Show</a>

                            <a href="{{ route('events.edit',$event->id) }}">Wijzig</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </x-slot>
</x-app-layout>

