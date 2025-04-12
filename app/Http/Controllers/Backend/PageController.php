<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageMeta;
use App\Models\Gallery;
use Illuminate\Validation\Rule;

class PageController extends Controller
{
    protected $moduleName;
    protected $folderName;
    protected $routeName;

    public function __construct()
    {
        $this->moduleName = 'Pages';
        $this->folderName = 'pages';
        $this->routeName = 'pages';
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
        $query = Page::with('meta');
    
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
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhere('slug', 'like', '%'.$search.'%')
                    ->orWhere('content', 'like', '%'.$search.'%');
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
            'title' => 'required|string|min:3|max:255',
            //'slug' => 'required|string|unique:pages,slug|max:255',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('pages')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                })
            ],            
            'content' => 'required|string', 
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'is_active' => 'required|boolean',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        try {
            $team = Page::create([
                'title' => $request->title,
                'slug' => $request->title,
                'content' => $request->content,
                'layout' => 'default',
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'is_active' => $request->is_active,
                'company_id' => $request->company_id,
            ]);
    
            // Return success response
            return redirect()->route($this->routeName . '.index')->with('success', 'Record created successfully!');
    
        } catch (\Exception $e) {
            // Return error response
            return redirect()->route($this->routeName . '.create')->with('error', 'There was an error creating the record.');
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
        $pageData = Page::findOrFail($id);
        return view('backend.' . $this->folderName . '.edit', compact('pageData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate form data
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            //'slug' => 'required|string|max:255|unique:pages,slug,' . $id, // Ignore current record slug for uniqueness
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('pages')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                })->ignore($id), // Ignore the current record
            ],            
            'content' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'is_active' => 'required|boolean',
            'company_id' => 'required|exists:companies,id',
        ]);
    
        try {
            // Find the record and update
            $record = Page::findOrFail($id);
            $record->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'is_active' => $request->is_active,
                'company_id' => $request->company_id,
            ]);

            // Handle meta fields
            $metaFields = $request->input('meta', []); // Get all meta fields from the request

            foreach ($metaFields as $key => $value) {
                // Check if the meta key exists for the current page
                $existingMeta = $record->meta()->where('meta_key', $key)->first();
                
                //encode if value is in array
                $value = is_array($value) ? json_encode($value) : $value;
            
                if ($existingMeta) {
                    // If the meta key exists, update it regardless of $value being empty
                    $existingMeta->update(['meta_value' => $value]);
                } else {
                    // If the meta key does not exist, create a new record only if $value is not empty
                    if (!empty($value)) {
                        $record->meta()->create([
                            'meta_key' => $key,
                            'meta_value' => $value
                        ]);
                    }
                }
            }            
    
            return redirect()->route($this->routeName . '.edit', $id)->with('success', 'Record updated successfully');
        } catch (\Exception $e) {
            return redirect()->route($this->routeName . '.edit', $id)->with('error', 'There was an error updating the record.');
        }
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Attempt to delete the record
            $page = Page::findOrFail($id);
            $page->meta()->delete();
            $page->delete();

            // Redirect back with a success message
            return redirect()->route($this->routeName . '.index')->with('success', 'Record deleted successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->route($this->routeName . 'index')->with('error', 'There was an error deleting the record.');
        }
    }
}