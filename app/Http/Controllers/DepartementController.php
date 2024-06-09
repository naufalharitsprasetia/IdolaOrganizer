<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Event;
use App\Models\Organization;
use App\Models\Position;
use App\Models\Member;
use App\Models\Task;
use App\Models\WorkProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orgId = intval($_GET['org']);
        $organization = Organization::find($orgId);
        // dd($organization);
        $departementss = Departement::where('organization_id', $orgId)->get();
        $departements = Departement::with('children')
            ->where('organization_id', $orgId)
            ->whereNull('parent_id')
            ->get();

        return view('departement.index', [
            'active' => 'struktur',
            'departements' => $departements,
            'departementss' => $departementss,
            'organization' => $organization
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orgId = intval($_GET['org']);
        $organization = Organization::find($orgId);
        $departements = Departement::where('organization_id', $orgId)->get();
        // dd($organization);
        return view('departement.create', [
            'active' => 'struktur',
            'departements' => $departements,
            'organization' => $organization
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name_departement' => 'required|string|max:255',
            'organization_id' => 'required',
            'parent_id' => 'nullable',
            'description' => 'nullable|string',
        ]);

        Departement::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('departement.index', ['org' => $request->input('organization_id')])->with('success', 'Departement created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
        $organization = Organization::find($departement->organization_id);
        $positions = Position::where('departements_id', $departement->id)->get();
        $members = Member::where('departements_id', $departement->id)->get();
        $prokers = WorkProgram::where('departements_id', $departement->id)->get();
        $tasks = Task::where('departements_id', $departement->id)->get();
        $events = Event::where('departements_id', $departement->id)->get();
        foreach ($prokers as $proker) {
            $proker->days_remaining = Carbon::parse($proker->end_date)->diffInDays(Carbon::now());
        }
        foreach ($tasks as $task) {
            $task->days_remaining = Carbon::parse($task->due_date)->diffInDays(Carbon::now());
        }
        foreach ($events as $event) {
            $event->days_remaining = Carbon::parse($event->event_date_end)->diffInDays(Carbon::now());
        }

        // dd($organization);
        return view('departement.show', [
            'active' => 'struktur',
            'organization' => $organization,
            'departement' => $departement,
            'positions' => $positions,
            'members' => $members,
            'prokers' => $prokers,
            'tasks' => $tasks,
            'events' => $events,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        //
    }
}
