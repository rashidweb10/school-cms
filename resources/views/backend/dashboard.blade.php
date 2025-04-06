<!-- resources/views/backend/dashboard.blade.php -->
@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')

@php
    $pageCount = \App\Models\Page::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        return $query->where('company_id', config('custom.school_id'));
    })->count();

    $teamCount = \App\Models\Team::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        return $query->where('company_id', config('custom.school_id'));
    })->count();    

    $campusCount = \App\Models\Campus::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        return $query->where('company_id', config('custom.school_id'));
    })->count();    

    $eventCount = \App\Models\Gallery::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        return $query->where('company_id', config('custom.school_id'));
    })->count();     

    $mediaCount = \App\Models\Upload::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('user_id', auth()->user()->id);
    }, function ($query) {
        //return $query->where('user_id', auth()->user()->id);
    })->count();     

    $formCount = \App\Models\Form::when(auth()->user()?->company_id, function ($query, $companyId) {
        return $query->where('company_id', $companyId);
    }, function ($query) {
        return $query->where('company_id', config('custom.school_id'));
    })->count();   
     
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
        'count' => $pageCount
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Teams',
        'icon' => 'ti ti-users',
        'count' => $teamCount
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Campus',
        'icon' => 'ti ti-building',
        'count' => $campusCount
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Event Galleries',
        'icon' => 'ti ti-library-photo',
        'count' => $eventCount
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Media Uploads',
        'icon' => 'ti ti-file-upload',
        'count' => $mediaCount
    ])

    @include('backend.includes.dashboard-card', [
        'name' => 'Form Submissions',
        'icon' => 'ti ti-message-question',
        'count' => $formCount
    ])
</div>
@endsection