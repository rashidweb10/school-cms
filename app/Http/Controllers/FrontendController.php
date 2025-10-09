<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageMeta;
use App\Models\Team;
use App\Models\TeamCategory;
use App\Models\Company;
use App\Models\Campus;
use App\Models\Gallery;
use Illuminate\Support\Facades\Cache;

class FrontendController extends Controller
{
    public function home()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'home')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
        
        if(config('custom.school_id') == 1){
            $schools = Company::with('meta')->whereNot('id', 1)->where('is_active', 1)->get();
            return view('frontend.pages.landing', compact('pageData', 'schools'));
        }
        return view('frontend.pages.home', compact('pageData'));
    }

    public function about()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'about-us')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();

        // $categories = TeamCategory::with(['teams' => function ($query) {
        //     $query->where('is_active', 1);
        //     $query->where('company_id', config('custom.school_id'));
        // }])
        // ->whereHas('teams') // Ensure only categories with teams are fetched
        // ->get();  

        $categories = TeamCategory::with(['teams' => function ($query) {
            $query->where('is_active', 1)
                ->where('company_id', config('custom.school_id'));
        }])
        ->where('is_active', 1)
        ->where('company_id', config('custom.school_id'))
        ->get();        
    
        return view('frontend.pages.about', compact('pageData', 'categories'));
    }

    public function why_we()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'why-we')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.common', compact('pageData'));
    }    

    public function roadmap()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'roadmap')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.roadmap', compact('pageData'));
    }   

    public function curriculum()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'curriculum')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.curriculum', compact('pageData'));
    }  

    public function career()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'career')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.common', compact('pageData'));
    }    

    public function alumini()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'alumini')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.common', compact('pageData'));
    }  

    public function default($slug)
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', $slug)
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.common', compact('pageData'));
    }    

    public function awards()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'awards')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.awards', compact('pageData'));
    }  
    
    public function results()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'results')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.results', compact('pageData'));
    }  
    
    public function circulars($slug)
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', $slug)
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.circulars', compact('pageData'));
    }  
    
    public function achivements($slug1)
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', $slug1)
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.achivements', compact('pageData'));
    }    

    public function newsletter($slug)
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', $slug)
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.newsletter', compact('pageData'));
    }     

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function disclosure()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'disclosure')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.disclosure', compact('pageData'));
    }  

    public function terms()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'terms-and-conditions')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.common', compact('pageData'));
    }    

    public function privacy_policy()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'privacy-policy')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.common', compact('pageData'));
    }   

    public function admission()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'admission')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.admission', compact('pageData'));
    }    

    public function campus(Request $request, $id = null)
    {
        //tab contents
        if($id){
            $pageData = Campus::where('is_active', 1)
            ->where('id', $id)
            ->where('company_id', config('custom.school_id'))
            ->first();            
            return view('frontend.pages.campus-contents', compact('pageData'));
        }
        
        //page
        $pageData = Campus::where('is_active', 1)
        ->where('company_id', config('custom.school_id'))
        ->orderBy('series', 'asc')
        ->get();
    
        return view('frontend.pages.campus', compact('pageData'));
    }     

    public function events(Request $request, $year = null)
    {
        //tab contents
        // if($year){
        //     $pageData = Gallery::where('is_active', 1)
        //     ->where('year', $year)
        //     ->where('company_id', config('custom.school_id'))
        //     ->get();            
        //     return view('frontend.pages.events-contents', compact('pageData'));
        // }

        if ($year) {
            $cacheKey = 'gallery_' . $year;
        
            $pageData = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($year) {
                return Gallery::where('is_active', 1)
                    ->where('year', $year)
                    ->where('company_id', config('custom.school_id'))
                    ->get();
            });
        
            return view('frontend.pages.events-contents', compact('pageData'));
        }        
        
        //page
        $pageData = Gallery::where('is_active', 1)
        ->where('company_id', config('custom.school_id'))
        ->select('year')
        ->distinct()
        ->orderBy('year', 'desc') // optional: sort descending
        ->pluck('year');
    
        return view('frontend.pages.events', compact('pageData'));
    }  

    public function thankyou(Request $request)
    {
        if (config('custom.school_id') != 1) {
            abort(404);
        }

        return view('frontend.pages.thankyou');
    }

     public function diwali()
    {
        return view('frontend.pages.diwali');
    }

    
}

