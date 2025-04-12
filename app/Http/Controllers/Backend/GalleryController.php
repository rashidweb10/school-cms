<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    protected $moduleName;
    protected $folderName;
    protected $routeName;

    public function __construct()
    {
        $this->moduleName = 'Event Galleries';
        $this->folderName = 'galleries';
        $this->routeName = 'galleries';
        view()->share('moduleName', $this->moduleName);
        view()->share('folderName', $this->folderName);
        view()->share('routeName', $this->routeName);
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
        $query = Gallery::query();
    
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
                    ->orWhere('year', 'like', '%'.$search.'%');
            });
        }      

        $query->orderBy('id', 'desc');
    
        $pageData = $query->paginate(25);
    
        // Get dropdown data for companies
        $companyList = getCompanyList();
    
        // Return the view with data
        return view('backend.' . $this->folderName . '.index', compact('pageData', 'companyList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.' . $this->folderName . '.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'thumbnail' => 'required|string',
            'gallery' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'is_active' => 'required|boolean',
            'description' => 'nullable|string',
        ]);
    
        try {
            // Insert the team record
            $team = Gallery::create([
                'name' => $request->name,
                'description' => $request->description,
                'thumbnail' => $request->thumbnail,
                'gallery' => $request->gallery,
                'year' => $request->year,
                'is_active' => $request->is_active,
                'company_id' => $request->company_id,
            ]);
    
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
        $pageData = Gallery::findOrFail($id);
        return view('backend.' . $this->folderName . '.edit', compact('pageData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|min:3|max:200',
            'thumbnail' => 'required|string',
            'gallery' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'is_active' => 'required|boolean',
            'description' => 'nullable|string',
        ]);
    
        try {
            // Find the team record
            $team = Gallery::findOrFail($id);
    
            // Update the team record
            $team->update([
                'name' => $request->name,
                'description' => $request->description,
                'thumbnail' => $request->thumbnail,
                'gallery' => $request->gallery,
                'year' => $request->year,
                'is_active' => $request->is_active,
                'company_id' => $request->company_id,
            ]);
    
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
            Gallery::destroy($id);
            // Redirect back with a success message
            return redirect()->route($this->routeName . '.index')->with('success', 'Record deleted successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->route($this->routeName . 'index')->with('error', 'There was an error deleting the record.');
        }
    }
}