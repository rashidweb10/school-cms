<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamCategory;
use App\Models\Team;

class TeamController extends Controller
{
    protected $moduleName;

    public function __construct()
    {
        //Module Name
        $this->moduleName = 'Teams';
        view()->share('moduleName', $this->moduleName);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the search parameter from the request
        $companyId = request()->input('company');
        $search = request()->input('search');
    
        // Start building the query
        $query = Team::query();
    
        // Filter by authenticated user's company_id if available
        if (auth()->user()->company_id) {
            $query->where('company_id', auth()->user()->company_id);
        }
    
        // Additional filtering by request input (optional)
        if ($companyId) {
            $query->where('company_id', $companyId);
        }

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('slug', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%')
                    ->orWhere('designation', 'like', '%'.$search.'%');
            });
        }      

        $query->orderBy('id', 'desc');
    
        $pageData = $query->paginate(25);
    
        // Get dropdown data for companies
        $companyList = getCompanyList();
    
        // Return the view with data
        return view('backend.teams.index', compact('pageData', 'companyList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$categories = TeamCategory::all();
        $categories = TeamCategory::where('is_active', 1)->where('company_id', config('custom.school_id'))->get();
        return view('backend.teams.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'image' => 'required|string',
            'slug' => 'required|string|unique:teams,slug',
            'designation' => 'required|string|max:200',
            'categories' => 'required|array',
            'categories.*' => 'exists:team_categories,id',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
            'is_active' => 'required|boolean',
        ]);
    
        try {
            // Insert the team record
            $team = Team::create([
                'name' => $request->name,
                'image' => $request->image,
                'slug' => $request->slug,
                'designation' => $request->designation,
                'description' => $request->description,
                'company_id' => $request->company_id,
                'is_active' => $request->is_active,
            ]);
    
            // Attach categories
            if ($request->has('categories')) {
                $team->categories()->attach($request->categories);
            }
    
            // Return success response
            return response()->json(['status' => true, 'notification' => 'Record created successfully!']);
    
        } catch (\Exception $e) {
            // Return error response
            return response()->json(['status' => false, 'notification' => 'There was an error creating the record.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageData = Team::findOrFail($id);
        //$categories = TeamCategory::all();
        $categories = TeamCategory::where('is_active', 1)->where('company_id', config('custom.school_id'))->get();
        return view('backend.teams.edit', compact('pageData','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'image' => 'required|string',
            'slug' => 'required|string|unique:teams,slug,' . $team->id,
            'designation' => 'required|string|max:200',
            'categories' => 'required|array',
            'categories.*' => 'exists:team_categories,id',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
            'is_active' => 'required|boolean',
        ]);

        try {
            // Update the team record
            $team->update([
                'name' => $request->name,
                'image' => $request->image,
                'slug' => $request->slug,
                'designation' => $request->designation,
                'description' => $request->description,
                'company_id' => $request->company_id,
                'is_active' => $request->is_active,
            ]);

            // Sync categories
            if ($request->has('categories')) {
                $team->categories()->sync($request->categories);
            }

            // Return success response
            return response()->json(['status' => true, 'notification' => 'Record updated successfully!']);

        } catch (\Exception $e) {
            // Return error response
            return response()->json(['status' => false, 'notification' => 'There was an error updating the record.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Attempt to delete the record
            Team::destroy($id);
    
            // Redirect back with a success message
            return redirect()->route('teams.index')->with('success', 'Record deleted successfully!');
        } catch (\Exception $e) {
            // Log the error message and stack trace
            \Log::error('Error deleting TeamCategory record', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'team_id' => $id
            ]);
    
            // Redirect back with an error message
            return redirect()->route('teams.index')->with('error', 'There was an error deleting the record.');
        }
    } 
}
