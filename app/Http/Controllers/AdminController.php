<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index()
    {
        // Ambil jumlah user dan organisasi
        $userCount = User::count();
        $organizationCount = Organization::count();

        // Ambil list user dan organisasi
        $users = User::all();
        $organizations = Organization::all();
        $active = 'admin';
        return view('admin.index', compact('userCount', 'organizationCount', 'users', 'organizations', 'active'));
    }
}
