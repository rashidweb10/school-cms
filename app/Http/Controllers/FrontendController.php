<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageMeta;
use App\Models\Team;
use App\Models\TeamCategory;

class FrontendController extends Controller
{
    public function home()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'home')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.home', compact('pageData'));
    }

    public function about()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'about-us')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();

        $categories = TeamCategory::with(['teams' => function ($query) {
            $query->where('is_active', 1);
            $query->where('company_id', config('custom.school_id'));
        }])
        ->whereHas('teams') // Ensure only categories with teams are fetched
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
    
    public function results()
    {
        $pageData = Page::with('meta')->where('is_active', 1)
        ->where('slug', 'results')
        ->where('company_id', config('custom.school_id'))
        ->firstOrFail();
    
        return view('frontend.pages.results', compact('pageData'));
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
}

