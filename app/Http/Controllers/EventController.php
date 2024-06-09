<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organization;
use App\Models\Departement;
use App\Models\Member;
use App\Models\WorkProgram;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orgId = intval($_GET['org']);
        $organization = Organization::find($orgId);
        // Ambil semua departemen di organisasi
        $departements = $organization->departements;

        $eventsAll = [];
        // Loop melalui setiap departemen dan ambil semua event
        foreach ($departements as $departement) {
            $eventsAll[] = $departement->events;
            // Lakukan sesuatu dengan $events (tampilkan, simpan ke array, dll.)
        }
        // dd($eventsAll);

        return view('event.index', [
            'active' => 'events',
            'organization' => $organization,
            'eventsAll' => $eventsAll
        ]);
    }
    public function getEvents()
    {
        $organizationId = $_GET['org'];
        $events = Event::where('organization_id', $organizationId)
            ->get(['id', 'name_event as title', 'event_date_start as start', 'event_date_end as end', 'description as description', 'location as location']);
        return response()->json($events);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $members = Member::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('event.create', [
            'active' => 'tasks',
            'organization' => $organization,
            'departement' => $departement,
            'members' => $members,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_event' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date_start' => 'required|date',
            'event_date_end' => 'required|date',
            'location' => 'nullable|string',
            'member_id' => 'nullable',
            'departements_id' => 'required',
            'organization_id' => 'required',
        ]);
        Event::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('departement.show', ['departement' => $request->input('departements_id')])->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        $departement =  $event->departement;
        $organization =  $event->departement->organization;
        return view('event.show', [
            'active' => 'event',
            'event' => $event,
            'organization' => $organization,
            'departement' => $departement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $members = Member::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('event.edit', [
            'active' => 'event',
            'organization' => $organization,
            'departement' => $departement,
            'members' => $members,
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'name_event' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date_start' => 'required|date',
            'event_date_end' => 'required|date',
            'location' => 'nullable|string',
            'member_id' => 'nullable',
        ];
        $request->validate($rules);

        $event->update([
            'name_event' => $request->name_event,
            'description' => $request->description,
            'event_date_start' => $request->event_date_start,
            'event_date_end' => $request->event_date_end,
            'location' => $request->location,
            'member_id' => $request->member_id,
        ]);
        Alert::alert('Berhasil', 'Kegiatan berhasil diperbaharui!', 'Success');
        return redirect()->route('event.show', ['event' => $event->id, 'org' => $request->organization_id])->with('success', 'Kegiatan berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $departement = $event->departement;
        $event->delete();
        Alert::alert('Berhasil', 'Kegiatan berhasil dihapus!', 'Success');
        return redirect()->route('departement.show', ['departement' => $departement])->with('success', 'Kegiatan berhasil dihapus.');
    }
}