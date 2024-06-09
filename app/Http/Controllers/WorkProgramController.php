<?php

namespace App\Http\Controllers;

use App\Models\WorkProgram;
use App\Models\Departement;
use App\Models\Organization;
use App\Models\Position;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class WorkProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orgId = intval($_GET['org']);
        $organization = Organization::find($orgId);
        // Asumsi Organization dan Department model sudah di-setup dengan benar
        $departements = Departement::where('organization_id', $orgId)
            ->with('prokers')
            ->get();
        foreach ($departements as $departement) {
            foreach ($departement->prokers as $proker) {
                $endDate = Carbon::parse($proker->end_date);
                $proker->days_remaining = $endDate->diffInDays(Carbon::now());
            }
        }
        return view('proker.index', [
            'active' => 'proker',
            // 'departements' => $departements,
            'organization' => $organization,
            'departements' => $departements
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
            'active' => 'proker',
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
            'status_program' => 'required',
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
        $departement =  $workProgram->departement;
        $organization =  $workProgram->departement->organization;
        // dd($organization);
        return view('proker.show', [
            'active' => 'proker',
            'proker' => $workProgram,
            'organization' => $organization,
            'departement' => $departement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkProgram $workProgram)
    {
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $positions = Position::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('proker.edit', [
            'active' => 'proker',
            'organization' => $organization,
            'departement' => $departement,
            'positions' => $positions,
            'proker' => $workProgram
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkProgram $workProgram)
    {
        $rules = [
            'name_program' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'departements_id' => 'required',
            'status_program' => 'required',
        ];
        $request->validate($rules);

        $workProgram->update([
            'name_program' => $request->name_program,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'departements_id' => $request->departements_id,
            'status_program' => $request->status_program,
        ]);
        Alert::alert('Berhasil', 'Program Kerja berhasil diperbaharui!', 'Success');
        return redirect()->route('proker.index', ['org' => $request->organization_id])->with('success', 'Program Kerja berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkProgram $workProgram)
    {
        $organization = $workProgram->departement->organization;
        $workProgram->delete();
        Alert::alert('Berhasil', 'Kegiatan berhasil dihapus!', 'Success');
        return redirect()->route('proker.index', ['org' => $organization])->with('success', 'Kegiatan berhasil dihapus.');
    }
}
