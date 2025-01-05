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
            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
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

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Gallery Images2')}}</label>
        <div class="col-md-9">
            <div class="input-group" data-toggle="aizuploader" data-type="document" data-multiple="true">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                </div>
                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                <input type="hidden" name="photos2" class="selected-files">
            </div>
            <div class="file-preview box sm">
            </div>
        </div>
    </div>    


    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Large Modal</button>

    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="form-group row">
        <label class="col-md-3 col-form-label" for="signinSrEmail">{{__('Gallery Images3')}}</label>
        <div class="col-md-9">
            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                <div class="input-group-prepend">
                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ __('Browse')}}</div>
                </div>
                <div class="form-control file-amount">{{ __('Choose File') }}</div>
                <input type="hidden" name="photos3" class="selected-files">
            </div>
            <div class="file-preview box sm">
            </div>
        </div>
    </div> 
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>


</div>
@endsection