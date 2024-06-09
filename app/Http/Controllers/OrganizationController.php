<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Organization;
use App\Models\WorkProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $organizations = Organization::all();
        $user = Auth::user();

        // Organisasi yang dibuat oleh user
        $ownedOrganizations = $user->organizations;

        // Organisasi di mana user merupakan member
        $memberOrganizations = $user->memberOrganizations;

        // Gabungkan hasil
        $organizations = $ownedOrganizations->merge($memberOrganizations);
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
        // Ambil data jumlah anggota per departemen
        $departements = Departement::where('organization_id', $organization->id)
            ->withCount('members')
            ->get();
        $departementNames = $departements->pluck('name_departement')->toArray();
        $memberCounts = $departements->pluck('members_count')->toArray();

        // Ambil data jumlah proker per departemen
        $workPrograms = Departement::where('organization_id', $organization->id)
            ->withCount('prokers')
            ->get();
        $workProgramCounts = $workPrograms->pluck('prokers_count')->toArray();

        // Ambil data progress proker
        $progresses = WorkProgram::whereIn('departements_id', $departements->pluck('id'))
            ->select('departements_id', DB::raw('COUNT(*) as total'), DB::raw('SUM(status_program = "completed") as completed'))
            ->groupBy('departements_id')
            ->get();

        $progressData = [];
        foreach ($progresses as $progress) {
            $departement = $departements->firstWhere('id', $progress->departements_id);
            $progressData[] = [
                'departement' => $departement ? $departement->name_departement : 'Unknown',
                'total' => $progress->total,
                'completed' => $progress->completed,
                'percentage' => $progress->total ? ($progress->completed / $progress->total) * 100 : 0,
            ];
        }

        return view('organisasi.show', [
            'active' => 'dashboard',
            'organization' => $organization,
            'departementNames' => $departementNames,
            'memberCounts' => $memberCounts,
            'workProgramCounts' => $workProgramCounts,
            'progressData' => $progressData
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
        $active = 'organisasi';
        return view('organisasi.edit', compact('organization', 'active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        //
        $request->validate([
            'name_organization' => 'required|string|max:255',
            'description_organization' => 'nullable|string',
            'singkatan_organization' => 'required|string',
        ]);


        if ($request->file('logo_organization')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $logoBaru = $request->file('logo_organization')->store('public/img');
            $logoBaru = str_replace('public/', '', $logoBaru);
            $organization->update([
                'logo_organization' => $logoBaru,
            ]);
        }

        $organization->update([
            'name_organization' => $request->input('name_organization'),
            'description_organization' => $request->input('description_organization'),
            'singkatan_organization' => $request->input('singkatan_organization'),
        ]);

        return redirect()->route('organisasi.index', $organization->id)->with('success', 'Organisasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
        $organization->delete();

        return redirect()->route('organisasi.index')->with('success', 'Organisasi berhasil dihapus.');
    }
}
