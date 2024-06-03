<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('organisasi.index', [
            'active' => 'organisasi',
            'organizations' => $organizations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('organisasi.create', [
            'active' => 'organisasi',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Validasi input
        $validatedData = $request->validate([
            'name_organization' => 'required|string|max:255',
            'singkatan_organization' => 'required|string|max:255',
            'description_organization' => 'nullable|string',
            'logo_organization' => 'image|file|nullable',
        ]);
        $validatedData["user_id"] = Auth::user()->id;
        if ($request->file('logo_organization')) {
            $validatedData['logo_organization'] = $request->file('logo_organization')->store('public/img');
            $validatedData['logo_organization'] = str_replace('public/', '', $validatedData['logo_organization']);
        }

        Organization::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('organisasi.index')->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization)
    {
        //
        return view('organisasi.show', [
            'active' => 'dashboard',
            'organization' => $organization
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}