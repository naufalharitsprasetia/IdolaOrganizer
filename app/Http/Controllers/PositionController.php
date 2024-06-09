<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\Departement;
use App\Models\Organization;
use RealRashid\SweetAlert\Facades\Alert;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $positions = Position::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('position.create', [
            'active' => 'struktur',
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
        // Validasi input
        $validatedData = $request->validate([
            'name_positions' => 'required|string|max:255',
            'departements_id' => 'required',
            'description' => 'nullable|string',
            'parent_id' => 'nullable',
        ]);

        Position::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('departement.show', ['departement' => $request->input('departements_id')])->with('success', 'Position created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $positions = Position::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('position.edit', [
            'active' => 'struktur',
            'organization' => $organization,
            'departement' => $departement,
            'positions' => $positions,
            'position' => $position
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        $rules = [
            'name_positions' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'parent_id' => 'nullable|string|max:255',
        ];
        $request->validate($rules);
        $deptId = $request->input('departements_id');

        $position->update([
            'name_positions' =>  $request->name_positions,
            'description' =>  $request->description,
            'parent_id' => $request->parent_id,
        ]);
        Alert::alert('Berhasil', 'Posisi berhasil diperbaharui!', 'Success');
        return redirect()->route('departement.show', ['departement' => $deptId])->with('success', 'Posisi berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        $departement = $position->departement;
        $position->delete();
        Alert::alert('Berhasil', 'Position berhasil dihapus!', 'Success');
        return redirect()->route('departement.show', ['departement' => $departement])->with('success', 'Posisi berhasil dihapus.');
    }
}
