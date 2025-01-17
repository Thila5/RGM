<?php

namespace App\Http\Controllers;

use App\Models\ResearchGrant;
use App\Models\Academician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResearchGrantController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('view-research-grants')) {
            abort(403, 'You do not have permission to view research grants.');
        }
    
        // Fetch with pagination, 10 grants per page
        $researchGrants = ResearchGrant::paginate(10);  
        return view('researchGrants.index', compact('researchGrants'));
    }
    

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('create-research-grant')) {
            abort(403, 'You do not have permission to create a research grant.');
        }

        $academicians = Academician::all();
        return view('researchGrants.create', compact('academicians'));
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Gate::denies('create-research-grant')) {
            abort(403, 'You do not have permission to create a research grant.');
        }

        // Validate the request data
        $validated = $request->validate([
            'project_leader_id' => 'required|exists:academicians,id',
            'grant_amount' => 'required|numeric|min:0',  // Ensure grant amount is positive
            'grant_provider' => 'required|string',
            'project_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer|min:1',  // Ensure duration is at least 1 month
        ]);

        // Create the new research grant
        $researchGrant = ResearchGrant::create($validated);

        // Fetch the project leader's user and update their user level
        $academician = Academician::find($validated['project_leader_id']);
        $user = $academician->user;

        if ($user) {
            $user->user_level = 2;  // Ensure the project leader is assigned level 2
            $user->save();
        }

        return redirect()->route('projectMembers.create')->with('success', 'Research grant created successfully and Project Leader updated.');
    }

    /*
     * Display the specified resource.
     */
    public function show(ResearchGrant $researchGrant)
    {
        if (Gate::denies('view-research-grant', $researchGrant)) {
            abort(403, 'You do not have permission to view this research grant.');
        }

        return view('researchGrants.show', compact('researchGrant'));
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(ResearchGrant $researchGrant)
    {
        if (Gate::denies('edit-research-grant', $researchGrant)) {
            abort(403, 'You do not have permission to edit this research grant.');
        }

        $academicians = Academician::all();
        return view('researchGrants.edit', compact('researchGrant', 'academicians'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResearchGrant $researchGrant)
    {
        if (Gate::denies('edit-research-grant', $researchGrant)) {
            abort(403, 'You do not have permission to update this research grant.');
        }

        // Validate the request data
        $validated = $request->validate([
            'project_leader_id' => 'required|exists:academicians,id',
            'grant_amount' => 'required|numeric|min:0',  // Ensure grant amount is positive
            'grant_provider' => 'required|string',
            'project_title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'duration_months' => 'required|integer|min:1',  // Ensure duration is at least 1 month
        ]);

        // Update the research grant
        $researchGrant->update($validated);

        // Fetch the project leader's user and update their user level
        $academician = Academician::find($validated['project_leader_id']);
        $user = $academician->user;

        if ($user) {
            $user->user_level = 2;  // Ensure the project leader is assigned level 2
            $user->save();
        }

        return redirect()->route('researchGrants.index')->with('success', 'Research grant updated successfully and Project Leader updated.');
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(ResearchGrant $researchGrant)
    {
        if (Gate::denies('delete-research-grant', $researchGrant)) {
            abort(403, 'You do not have permission to delete this research grant.');
        }

        // Retrieve the project leader before deleting the grant
        $academician = Academician::find($researchGrant->project_leader_id);

        // Delete the research grant
        $researchGrant->delete();

        // Reset the user level of the project leader if they exist
        if ($academician && $academician->user) {
            $academician->user->user_level = 0;  // Reset user level to 0 after deletion
            $academician->user->save();
        }

        return redirect()->route('researchGrants.index')->with('success', 'Research grant deleted successfully and Project Leader user level reset.');
    }
}
