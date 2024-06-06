<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Organization;
use App\Models\Departement;
use App\Models\Member;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}