@extends('events.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Alle activiteiten</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('events.create') }}">Nieuwe activiteit</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Titel</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
            <th>Locatie</th>
            <th>Kosten</th>
            <th>Kosten lid</th>
            <th>Omschrijving</th>
            <th width="280px">Action</th>
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

                        <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Wijzig</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Verwijder</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $events->links() !!}

@endsection
