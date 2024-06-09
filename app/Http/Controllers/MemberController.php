<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Organization;
use App\Models\Departement;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            'description' => 'nullable'
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
    public function sync(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'member_id' => 'required|exists:members,id',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            Alert::alert('Gagal', 'User dengan email tersebut tidak ditemukan.', 'warning');
            return redirect()->back()->with('error', 'User dengan email tersebut tidak ditemukan.');
        }

        $member = Member::find($request->member_id);
        $organizationId = $member->organizations_id;

        // Cek apakah user sudah tersinkron ke member lain dalam organisasi yang sama
        $existingSync = Member::where('organizations_id', $organizationId)
            ->where('user_id', $user->id)
            ->first();
        // dd($existingSync);
        if ($existingSync) {
            Alert::alert('Gagal', 'User sudah tersinkron ke member lain dalam organisasi ini.', 'warning');
            return redirect()->back()->with('error', 'User sudah tersinkron ke member lain dalam organisasi ini.');
        }

        $member->user_id = $user->id;
        $member->save();

        Alert::alert('Berhasil', 'Selamat! Member telah disinkron dengan user!', 'Success');
        return redirect()->back()->with('success', 'Member berhasil disinkronisasi dengan User.');
    }

    public function edit(Member $member)
    {
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $positions = Position::where('departements_id', $deptId)->get();
        return view('member.edit', [
            'active' => 'member',
            'title' => 'member',
            'organization' => $organization,
            'departement' => $departement,
            'positions' => $positions,
            'member' => $member
        ]);
    }

    public function update(Request $request, Member $member)
    {
        $rules = [
            'name_member' => 'required|string|max:255',
            'email_member' => 'nullable|string',
            'phone_member' => 'nullable|string',
            'address_member' => 'nullable|string',
            'position_id' => 'required',
            'description' => 'nullable'
            // 'departements_id' => 'required|string', // Tidak Diubah
        ];
        $request->validate($rules);

        $member->update([
            'name_member' => $request->name_member,
            'email_member' => $request->email_member,
            'phone_member' => $request->phone_member,
            'address_member' => $request->address_member,
            'position_id' => $request->position_id,
            'description' => $request->description,
        ]);
        Alert::alert('Berhasil', 'Member berhasil diperbaharui!', 'Success');
        return redirect()->route('member.show', ['member' => $member->id, 'org' => $request->organization_id])->with('success', 'Member berhasil diperbaharui');
    }

    public function destroy(Member $member)
    {
    }
}
