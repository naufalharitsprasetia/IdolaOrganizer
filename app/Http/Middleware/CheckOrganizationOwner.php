<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization;
use RealRashid\SweetAlert\Facades\Alert;

class CheckOrganizationOwner
{
    public function handle(Request $request, Closure $next)
    {
        $organization = $request->route('organization'); // Pastikan nama parameter sesuai dengan route
        // $organization = Organization::where('id', $organizationId)->first();
        // dd($organization);
        if (Auth::user()->id !== $organization->user_id) {
            Alert::alert('Error', 'Anda tidak memiliki izin untuk mengakses halaman ini.', 'warning');
            return redirect()->route('organisasi.index')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
