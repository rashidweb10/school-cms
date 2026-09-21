<!-- resources/views/backend/dashboard.blade.php -->
@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')

@php

    use Illuminate\Support\Facades\Cache;

    $pageCount = \App\Models\Page::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        //return $query->where('company_id', config('custom.school_id'));
    })->count();

    $teamCount = \App\Models\Team::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        //return $query->where('company_id', config('custom.school_id'));
    })->count();    

    $campusCount = \App\Models\Campus::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        //return $query->where('company_id', config('custom.school_id'));
    })->count();    

    $eventCount = \App\Models\Gallery::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        //return $query->where('company_id', config('custom.school_id'));
    })->count();     

    /*$mediaCount = \App\Models\Upload::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('user_id', auth()->user()->id);
    }, function ($query) {
        //return $query->where('user_id', auth()->user()->id);
    })->count();*/  
    
    // Media count (24 hours cache, unique per user)
    $mediaCount = Cache::remember('media_count_' . (auth()->id() ?? 'guest'), 86400, function () {
        return \App\Models\Upload::when(auth()->user()?->company_id, function ($query, $companyId) {
            return $query->where('user_id', auth()->id());
        })->count();
    });    

    /*$formCount = \App\Models\Form::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        //return $query->where('company_id', config('custom.school_id'));
    })->count();*/ 
    
    // Forms count (24 hours cache)
    $formCount = Cache::remember('forms_count_' . (auth()->user()?->company_id ?? 'all'), 86400, function () {
        return \App\Models\Form::when(auth()->user()?->company_id, function ($query, $companyId) {
            return $query->where('company_id', $companyId);
        })->count();
    });    
    
    /*$visitors = \App\Models\Visitor::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', auth()->user()->company_id);
    }, function ($query) {
        //return $query->where('company_id', auth()->user()->company_id);
    })->count();*/  
    
    $visitors = Cache::remember('visitors_count_' . (auth()->user()?->company_id ?? 'all'), 86400, function () {
        return \App\Models\Visitor::when(auth()->user()?->company_id, function ($query, $companyId) {
            return $query->where('company_id', auth()->user()->company_id);
        })->count();
    });

    $teamCategoryCount = \App\Models\TeamCategory::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    })->count();
     
@endphp

<div class="page-title-head d-flex align-items-center gap-2 mb-3">
    <div class="flex-grow-1">
        <h4 class="fs-13 text-uppercase fw-bold mb-0 text-dark">Dashboard</h4>
    </div>
</div>

<div class="row g-3 dashboard-stat-grid">
    @include('backend.includes.dashboard-card', [
        'name' => 'Pages',
        'icon' => 'ti ti-paperclip',
        'count' => $pageCount,
        'url' => route('pages.index'),
        'color' => '#3b82f6',
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Media Uploads',
        'icon' => 'ti ti-file',
        'count' => $mediaCount,
        'url' => route('uploaded-files.index'),
        'color' => '#10b981',
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Form Submissions',
        'icon' => 'ti ti-clipboard',
        'count' => $formCount,
        'url' => route('forms.by', ['form_name' => (auth()->user()->company_id == 1) ? 'admission' : 'contact']),
        'color' => '#f59e0b',
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Visitors',
        'icon' => 'ti ti-world',
        'count' => $visitors,
        'url' => '',
        'color' => '#a855f7',
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Teams',
        'icon' => 'ti ti-school',
        'count' => $teamCount,
        'url' => route('teams.index'),
        'color' => '#ef4444',
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Team Categories',
        'icon' => 'ti ti-apps',
        'count' => $teamCategoryCount,
        'url' => route('team-categories.index'),
        'color' => '#06b6d4',
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Event Galleries',
        'icon' => 'ti ti-photo',
        'count' => $eventCount,
        'url' => route('galleries.index'),
        'color' => '#ec4899',
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Campus',
        'icon' => 'ti ti-building',
        'count' => $campusCount,
        'url' => route('campuses.index'),
        'color' => '#14b8a6',
    ])
</div>
@endsection