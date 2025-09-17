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
     
@endphp

<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Dashboard</h4>
    </div>
</div>

<div class="row justify-content-center">
    @include('backend.includes.dashboard-card', [
        'name' => 'Pages',
        'icon' => 'ti ti-pencil',
        'count' => $pageCount,
        'url' => route('pages.index'),
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Teams',
        'icon' => 'ti ti-users',
        'count' => $teamCount,
        'url' => route('teams.index'),
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Campus',
        'icon' => 'ti ti-building',
        'count' => $campusCount,
        'url' => route('campuses.index'),
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Event Galleries',
        'icon' => 'ti ti-library-photo',
        'count' => $eventCount,
        'url' => route('galleries.index'),
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Media Uploads',
        'icon' => 'ti ti-file-upload',
        'count' => $mediaCount,
        'url' => route('uploaded-files.index'),
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Form Submissions',
        'icon' => 'ti ti-message-question',
        'count' => $formCount,
        'url' => route('forms.by', ['form_name' => (auth()->user()->company_id == 1) ? 'admission' : 'contact']),
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Visitors',
        'icon' => 'ti ti-world',
        'count' => $visitors,
        'url' => '',
    ])   
</div>
@endsection