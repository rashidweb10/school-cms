<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{

    protected $moduleName;
    protected $folderName;
    protected $routeName;

    public function __construct()
    {
        $this->moduleName = 'Forms';
        $this->folderName = 'forms';
        $this->routeName = 'forms';
        view()->share('moduleName', $this->moduleName);
        view()->share('folderName', $this->folderName);
        view()->share('routeName', $this->routeName);
    }

    public function index(Request $request)
    {
        $query = Form::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->where('form_name', 'like', '%' . $request->search . '%')
                  ->orWhere('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $pageData = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('backend.' . $this->folderName . '.index', compact('pageData'));
    }
}
