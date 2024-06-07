<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Organization;
use App\Models\Departement;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $orgId = intval($_GET['org']);
        $organization = Organization::find($orgId);
        // Asumsi Organization dan Department model sudah di-setup dengan benar
        $departements = Departement::where('organization_id', $orgId)
            ->with('members')
            ->get();

        return view('member.index', [
            'active' => 'member',
            'organization' => $organization,
            'departements' => $departements
        ]);
    }

    public function create()
    {
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $positions = Position::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('member.create', [
            'active' => 'member',
            'organization' => $organization,
            'departement' => $departement,
            'positions' => $positions,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name_member' => 'required|string|max:255',
            'email_member' => 'nullable|string',
            'phone_member' => 'nullable|string',
            'address_member' => 'nullable|string',
            'departements_id' => 'required|string',
            'position_id' => 'required',
        ]);
        $departement = Departement::find($request->input('departements_id'));
        $validatedData['organizations_id'] = $departement->organization->id;
        Member::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('departement.show', ['departement' => $request->input('departements_id')])->with('success', 'Member created successfully.');
    }

    public function show(Member $member)
    {
        $departement =  $member->departement;
        $organization =  $member->organization;
        // dd($member);
        return view('member.show', [
            'active' => 'member',
            'member' => $member,
            'organization' => $organization,
            'departement' => $departement,
        ]);
    }

    public function edit(Member $member)
    {
    }

    public function update(Request $request, Member $member)
    {
    }

    public function destroy(Member $member)
    {
    }
}
