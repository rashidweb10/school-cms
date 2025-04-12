<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamCategory;
use App\Models\Company;

class TeamCategoryController extends Controller
{
    protected $moduleName;

    public function __construct()
    {
        //Module Name
        $this->moduleName = 'Team Categories';
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
        $query = TeamCategory::query();
    
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
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }      

        $query->orderBy('id', 'desc');
    
        $pageData = $query->paginate(25);
    
        // Get dropdown data for companies
        $companyList = getCompanyList();
    
        // Return the view with data
        return view('backend.team-categories.index', compact('pageData', 'companyList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:200',
            'slug' => 'required|string|min:3|max:200|unique:team_categories,slug',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:200',
            'company_id' => 'required|exists:companies,id',
            'is_active' => 'required|boolean',
        ]);

        // If validation passes, proceed to saving the data
        $teamCategory = new TeamCategory();
        $teamCategory->name = $request->input('name');
        $teamCategory->slug = $request->input('slug');
        $teamCategory->description = $request->input('description');
        $teamCategory->meta_title = $request->input('meta_title');
        $teamCategory->meta_description = $request->input('meta_description');
        $teamCategory->company_id = $request->input('company_id');
        $teamCategory->is_active = $request->input('is_active');
        $teamCategory->save();

        // Return JSON response for AJAX handling
        return response()->json(['status' => true, 'notification' => 'Record created successfully!']);
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
        $pageData = TeamCategory::findOrFail($id);
        return view('backend.team-categories.edit', compact('pageData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the existing record by ID
        $teamCategory = TeamCategory::findOrFail($id);
    
        // Validate the incoming data
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:200',
            'slug' => 'required|string|min:3|max:200|unique:team_categories,slug,' . $teamCategory->id,
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:200',
            'meta_description' => 'nullable|string|max:200',
            'company_id' => 'required|exists:companies,id',
            'is_active' => 'required|boolean',
        ]);
    
        // If validation passes, update the data
        $teamCategory->name = $request->input('name');
        $teamCategory->slug = $request->input('slug');
        $teamCategory->description = $request->input('description');
        $teamCategory->meta_title = $request->input('meta_title');
        $teamCategory->meta_description = $request->input('meta_description');
        $teamCategory->company_id = $request->input('company_id');
        $teamCategory->is_active = $request->input('is_active');
        $teamCategory->save();
    
        // Return JSON response for AJAX handling
        return response()->json(['status' => true, 'notification' => 'Record updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Attempt to delete the record
            TeamCategory::destroy($id);
    
            // Redirect back with a success message
            return redirect()->route('team-categories.index')->with('success', 'Record deleted successfully!');
        } catch (\Exception $e) {
            // Log the error message and stack trace
            \Log::error('Error deleting TeamCategory record', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
                'team_category_id' => $id
            ]);
    
            // Redirect back with an error message
            return redirect()->route('team-categories.index')->with('error', 'There was an error deleting the record.');
        }
    }    
}
