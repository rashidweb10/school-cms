<!-- resources/views/backend/dashboard.blade.php -->
@extends('backend.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Dashboard</h4>
    </div>
</div>

<div class="row">
<div class="form-group row">
        <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Gallery Images1')}}</label>
        <div class="col-md-9">
            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                </div>
                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                <input type="hidden" name="photos1" class="selected-files">
            </div>
            <div class="file-preview box sm">
            </div>
        </div>
    </div>    
</div>
@endsection