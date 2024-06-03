<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $departements = Departement::where('organization_id', $orgId)->get();
        return view('departement.index', [
            'active' => 'struktur',
            'departements' => $departements,
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
        // dd($organization);
        return view('departement.create', [
            'active' => 'struktur',
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
