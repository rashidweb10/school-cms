@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
    $career_meta = $pageData->meta->where('meta_key', 'career')->first();
    $career = $career_meta ? json_decode($career_meta->meta_value, true) : null;
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<section class="career-section pb-md-5 pb-4 mt-0">
    <div class="container">
        <!-- Page Description -->
        @if($pageData->content)
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <div class="career-content-desc">
                        {!! $pageData->content !!}
                    </div>
                </div>
            </div>
        @endif

        <!-- Job Openings Listing -->
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-9">
                @if(isset($career['itration']) && is_array($career['itration']) && count($career['itration']) > 0)
                    <h3 class="roboto fw-normal text_color pb-md-4 pb-3 pt-md-0 pt-3"><i class="fa-solid fa-briefcase me-2"></i>Current Openings</h3>
                    
                    @foreach($career['itration'] as $index => $itration)
                        @php
                            $contact_number = $career['contact_number'][$index] ?? '';
                            $email_id = $career['email_id'][$index] ?? '';
                        @endphp
                        <div class="card shadow-sm border-0 mb-4 rounded-3" style="border-left: 4px solid #fd5523 !important; background: #fff;">
                            <div class="card-body p-4">
                                <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3 mb-3">
                                    <div>
                                        <span class="badge px-3 py-2 fs-13 me-2" style="background-color: #e0f2fe; color: #0369a1 !important;">
                                            <i class="fa-solid fa-barcode me-1"></i> Code: {{ $career['job_code'][$index] ?? '' }}
                                        </span>
                                        <span class="badge px-3 py-2 fs-13" style="background-color: #dcfce7; color: #15803d !important;">
                                            <i class="fa-solid fa-clock me-1"></i> {{ $career['job_type'][$index] ?? '' }}
                                        </span>
                                    </div>
                                    <div class="text-muted fs-14 mt-2 mt-md-0">
                                        <i class="fa-solid fa-industry me-1"></i> Industry: <strong>{{ $career['industry'][$index] ?? '' }}</strong>
                                    </div>
                                </div>

                                <div class="eligibility-content mb-4">
                                    <h5 class="fw-bold mb-2 text-dark" style="font-size: 16px;"><i class="fa-solid fa-graduation-cap me-1"></i> Eligibility & Requirements:</h5>
                                    <div class="text-secondary ps-3 border-start py-1" style="font-size: 15px; border-color: #e5e7eb !important;">
                                        {!! $career['eligibility'][$index] ?? '' !!}
                                    </div>
                                </div>

                                <div class="contact-info bg-light p-3 rounded-3 d-flex flex-wrap justify-content-between align-items-center gap-3" style="background-color: #f8fafc !important; border: 1px solid #f1f5f9;">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-white rounded-circle p-2 d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 40px; height: 40px;">
                                            <i class="fa-solid fa-user-tie text-primary" style="color: #fd5523 !important;"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block" style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Admission Counselor</small>
                                            <strong class="text-dark">{{ $career['admission_counselor'][$index] ?? '' }}</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex flex-wrap gap-2 gap-md-3 mt-2 mt-md-0">
                                        @if($contact_number)
                                            <a href="tel:{{ $contact_number }}" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-2 d-flex align-items-center gap-2" style="font-size: 13px;">
                                                <i class="fa-solid fa-phone text-success"></i> {{ $contact_number }}
                                            </a>
                                        @endif
                                        @if($email_id)
                                            <a href="mailto:{{ $email_id }}" class="btn btn-sm btn-outline-dark rounded-pill px-3 py-2 d-flex align-items-center gap-2" style="font-size: 13px;">
                                                <i class="fa-solid fa-envelope text-primary"></i> {{ $email_id }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-5">
                        <div class="mb-3 text-muted"><i class="fa-solid fa-briefcase fa-3x"></i></div>
                        <h4 class="text-muted">No Job Openings Available</h4>
                        <p class="text-secondary">Please check back later or get in touch with us directly.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
