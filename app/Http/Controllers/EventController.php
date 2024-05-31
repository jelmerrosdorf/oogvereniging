<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Exports\EventsExport;
use App\Exports\EventUsersExport;
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
    public function index(Request $request): View
    {
        $query = Event::query();

        if ($request->has('province') && $request->province && $request->province != 'Alles') {
            $query->where('tag_province', $request->province);
        }

        if ($request->has('subject') && $request->subject && $request->subject != 'Alles') {
            $query->where('tag_subject', $request->subject);
        }

        $query->orderBy('datetime_start')->paginate(20);

        $events = $query->get();

        if ($request->ajax()) {
            return view('events.partial', compact('events'));
        }

        $provinces = Event::select('tag_province')->distinct()->pluck('tag_province');
        $subjects = Event::select('tag_subject')->distinct()->pluck('tag_subject');

        return view('events.index',compact('events', 'provinces', 'subjects'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Display an alternative listing of the resource.
     */
    public function conceptindex(): View
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
        $event_id = request()->segment(2);
        $user = Auth::user();

        $event = Event::find($event_id);

        $isSignedUp = $user->events()->where('event_id', $event->id)->exists();

        return view('events.show',compact('event', 'isSignedUp'));
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
        $user = Auth::user();

        $event = Event::find($event_id);

        $isSignedUp = $user->events()->where('event_id', $event->id)->exists();

        if ($isSignedUp) {
            return redirect()->route('events.index')->with('success', 'Je staat al ingeschreven voor deze activiteit.');
        }

        $user->events()->attach($event->id);

        return redirect()->route('events.index')
            ->with('success','Je staat nu ingeschreven voor deze activiteit.');
    }

    public function signout(Event $event)
    {
        $event_id = request()->segment(2);
        $user = Auth::user();

        $event = Event::find($event_id);

        $isSignedUp = $user->events()->where('event_id', $event->id)->exists();

        if ($isSignedUp === false) {
            return redirect()->route('events.registrations')->with('success', 'Je kunt je niet uitschrijven voor deze activiteit.');
        }

        $user->events()->detach($event_id);

        return redirect()->route('events.registrations')
            ->with('success','Je bent nu uitgeschreven voor deze activiteit.');
    }

    public function exportevents()
    {
        return Excel::download(new EventsExport, 'activiteiten.xlsx');
    }

    public function exportsignups()
    {
        $event_id = request()->segment(2);

        $event = Event::find($event_id);
        $event_title = $event->title;

        $event_title_sanitized = preg_replace('/[^A-Za-z0-9\-]/', '', $event_title);
        $fileName = 'inschrijvingen_' . $event_title_sanitized . '.xlsx';

        return Excel::download(new EventUsersExport($event_id), $fileName);
    }

    public function registrations(Event $event)
    {
        $user = Auth::user();

        $events = $user->events;

        return view('events.registrations',compact('events'));
    }

    public function signups()
    {
        $event_id = request()->segment(2);

        $event = Event::find($event_id);

        $users = Event::find($event_id)->users()->select('name', 'email')->get();

        return view('events.signups',compact('users', 'event'));
    }
}
