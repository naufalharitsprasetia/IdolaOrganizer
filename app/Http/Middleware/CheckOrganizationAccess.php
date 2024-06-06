<?php

namespace App\Http\Middleware;

use App\Models\Departement;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization;
use RealRashid\SweetAlert\Facades\Alert;

class CheckOrganizationAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($request->route('organization') != null) {
            $organization = $request->route('organization');
        } elseif (isset($_GET['org'])) {
            $organization = Organization::find($_GET['org']);
        } elseif (isset($_POST['departements_id'])) {
            $dept = Departement::find($_POST['departements_id']);
            $organization = $dept->organization;
        } elseif (isset($_POST['organization_id'])) {
            $organization = Organization::find($_POST['organization_id']);
        } elseif ($request->route('departement') != null) {
            $organization = $request->route('departement')->organization;
        } elseif (isset($_GET['dept'])) {
            $dept2 = Departement::find($_GET['dept']);
            $organization = $dept2->organization;
        }

        // $organization = Organization::find($organizationId);
        // dd($_GET['org']);
        // dd($organization);
        if (!$organization) {
            // Organization not found
            return redirect()->route('organisasi.index')->with('error', 'Organization not found.');
        }

        // Check if the user is the owner or a member of the organization
        if ($organization->user_id != $user->id && !$organization->members->contains($user->id)) {
            Alert::alert('Error', 'You do not have access to this organization.', 'warning');
            return redirect()->route('organisasi.index')->with('error', 'You do not have access to this organization.');
        }

        return $next($request);
    }
}
