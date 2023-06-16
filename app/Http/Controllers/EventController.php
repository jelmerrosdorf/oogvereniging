<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Exports\EventsExport;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $events = Event::orderBy('datetime_start')->paginate(20);

        return view('events.index',compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Display an alternative listing of the resource.
     */
    public function indexalt(): View
    {
        $events = Event::orderBy('datetime_start')->paginate(20);

        return view('events.concepts', compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $eventData = $request->all();
        $eventData['user_id'] = Auth::user()->id; // Add currently logged in users' ID to event data

        Event::create($eventData);

        return redirect()->route('events.index')
            ->with('success','Activiteit succesvol toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): View
    {
        return view('events.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): View
    {
        return view('events.edit',compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event): RedirectResponse
    {
        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success','Activiteit succesvol gewijzigd.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success','Activiteit succesvol verwijderd.');
    }

    public function signup(Event $event)
    {
        $event_id = request()->segment(2);
        $user_id = Auth::user()->id;

        $event = Event::find($event_id);
        $event->users()->attach($user_id);

        return redirect()->route('events.index')
            ->with('success','Je staat ingeschreven!');
    }

    public function export()
    {
        return Excel::download(new EventsExport, 'events.xlsx');
    }
}
