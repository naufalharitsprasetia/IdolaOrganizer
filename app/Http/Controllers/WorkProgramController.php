<?php

namespace App\Http\Controllers;

use App\Models\WorkProgram;
use App\Models\Departement;
use App\Models\Organization;
use App\Models\Position;
use Illuminate\Http\Request;

class WorkProgramController extends Controller
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

        return view('proker.index', [
            'active' => 'proker',
            // 'departements' => $departements,
            'organization' => $organization,
            'eventsAll' => $eventsAll
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $positions = Position::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('proker.create', [
            'active' => 'member',
            'organization' => $organization,
            'departement' => $departement,
            'positions' => $positions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_program' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'departements_id' => 'required',
        ]);

        WorkProgram::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('departement.show', ['departement' => $request->input('departements_id')])->with('success', 'Program Kerja created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkProgram $workProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkProgram $workProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkProgram $workProgram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkProgram $workProgram)
    {
        //
    }
}
