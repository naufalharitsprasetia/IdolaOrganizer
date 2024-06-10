<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Organization;
use App\Models\Departement;
use App\Models\Member;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orgId = intval($_GET['org']);
        $organization = Organization::find($orgId);
        // dd($organization);
        // $departements = Departement::where('organization_id', $orgId)->get();
        return view('task.index', [
            'active' => 'tasks',
            // 'departements' => $departements,
            'organization' => $organization
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
        $members = Member::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('task.create', [
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
            'name_task' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status_task' => 'required|string',
            'departements_id' => 'required',
            'member_id' => 'nullable',
        ]);

        Task::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('departement.show', ['departement' => $request->input('departements_id')])->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
        $departement =  $task->departement;
        $organization =  $task->departement->organization;
        return view('task.show', [
            'active' => 'task',
            'task' => $task,
            'organization' => $organization,
            'departement' => $departement,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        $deptId = intval($_GET['dept']);
        $departement = Departement::find($deptId);
        $organization = Organization::find($departement->organization_id);
        $members = Member::where('departements_id', $deptId)->get();
        // dd($organization);
        return view('task.edit', [
            'active' => 'event',
            'organization' => $organization,
            'departement' => $departement,
            'members' => $members,
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $rules = [
            'name_task' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status_task' => 'required|string',
            'member_id' => 'nullable',
        ];
        $request->validate($rules);

        $task->update([
            'name_task' => $request->name_task,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status_task' => $request->status_task,
            'member_id' => $request->member_id,
        ]);
        Alert::alert('Berhasil', 'Tugas berhasil diperbaharui!', 'Success');
        return redirect()->route('departement.show', ['departement' => $request->departements_id])->with('success', 'Tugas berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $departement = $task->departement;
        $task->delete();
        Alert::alert('Berhasil', 'Tugas berhasil dihapus!', 'Success');
        return redirect()->route('departement.show', ['departement' => $departement])->with('success', 'Tugas berhasil dihapus.');
    }
}