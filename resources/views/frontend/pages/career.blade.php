@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
    $career_meta = $pageData->meta->where('meta_key', 'career')->first();
    $career = $career_meta ? json_decode($career_meta->meta_value, true) : null;
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<style>
    .border_bottom {
    border-bottom: 1px dashed #ccc !important;
    margin-top: 30px !important;
    margin-bottom: 30px !important;
}
.ListContainerWrapper li {
    list-style: disc;
        text-align: left;
}

.ListContainerWrapper ul {
    margin-left: 20px;
}
.orange_btn:hover {
    background: #ea531c;
    border: 1px solid;
    color: #fff;
}
.orange_btn:hover i, .orange_btn i:hover
{
    color: #fff !important;
}
.orange_btn1:hover {
    background: #e63d20 !important;
    border-color: #e63d20;
}

.orange_btn1 {
       background: #ea531c;
    border: 1px solid;
    box-shadow: none !important;
    color: #fff !important;
}

div#applyModal .modal-header {
    padding: 25px 30px !important;
}

div#applyModal .modal-body {
    padding: 25px 30px;
}

div#applyModal .modal-footer {
    padding: 25px 30px !important;
}

.border_bottom_div p {
    border-bottom: 1px dotted #ccc;
    padding-bottom: 7px;
    padding-top: 6px;
    font-size: 14px;
}
.heding_size
{
    font-size: 28px !important;
     font-weight: 400;
}
.heding_size span#modalJobCode {
    font-size: 28px !important;
    font-weight: 400;
}
.ListContainerWrapper li {
    text-align: left;
}
@media(max-width:767px)
{
    .custom_badge {
    white-space: normal;
    text-align: left;
}
.eligibility-content p {
    padding-bottom: 0 !important;
    margin-bottom: 0 !important;
}
.heding_size {
    font-size: 20px !important;
    font-weight: 400;
}
.heding_size span#modalJobCode {
    font-size: 20px !important;
    font-weight: 400;
}
label.form-label {
    font-size: 14px;
}
}
</style>
<section class="career-section pb-md-5 pb-4 mt-0">
    <div class="container">
        <!-- Page Description -->
        @if($pageData->content)
            <div class="row mb-md-4 mb-1">
                <div class="col-12 text-center">
                    <div class="career-content-desc">
                        {!! $pageData->content !!}
                    </div>
                </div>
            </div>
        @endif

        <!-- Job Openings Listing -->
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                @include('frontend.components.form-alert')
                @if(isset($career['itration']) && is_array($career['itration']) && count($career['itration']) > 0)
                    <h3 class="roboto fw-normal text_color pb-md-4 pb-3 pt-md-0 pt-3">Current Openings</h3>
                    
                    @foreach($career['itration'] as $index => $itration)
                        @php
                            $contact_number = $career['contact_number'][$index] ?? '';
                            $email_id = $career['email_id'][$index] ?? '';
                        @endphp
                        <div class="card border-0 mb-4 rounded-3 " style="border-left: 4px solid #fd5523 !important;
    background: #fff;
    border-right: 3px solid #ccccccb8 !important;
    border-top: 3px solid #ccccccb8 !important;
    border-bottom: 3px solid #ccccccb8 !important;
    border-radius: 10px !important;">
                            <div class="card-body p-md-4 p-3">
                                <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-3 mb-3">
                                    <div>
                                        <span class="badge px-3 py-2 fs-13 me-2 mb-md-0 mb-2" style="background-color: #e0f2fe; color: #0369a1 !important;">
                                            <i class="fa-solid fa-barcode me-1"></i> Code:  {{ config('custom.school_code') }}{{ $career['job_code'][$index] ?? '' }}
                                        </span>
                                        <span class="badge px-3 py-2 fs-13 mb-md-0 mb-2" style="background-color: #dcfce7; color: #15803d !important;">
                                            <i class="fa-solid fa-clock me-1"></i> {{ $career['job_type'][$index] ?? '' }}
                                        </span>
                                    </div>
                                    <div class="badge px-3 py-2 fs-13 me-2 custom_badge" style="    background-color: #7171711c;
    color: #000000ab !important;">
                                        <i class="fa-solid fa-industry me-1"></i> Department: <strong>{{ $career['industry'][$index] ?? '' }}</strong>
                                    </div>
                                </div>

                                <div class="eligibility-content mb-4">
                                    <h5 class="fw-bold mb-2 text-dark" style="font-size: 16px;"> Job Details:</h5>
                                    <div class=" ps-3 py-1" style="color:#000; font-size: 15px; border-color: #e5e7eb !important;">
                                        {!! $career['eligibility'][$index] ?? '' !!}
                                    </div>
                                </div>

                                <div class="contact-info bg-light p-3 rounded-3 d-flex flex-wrap justify-content-between align-items-center gap-3" style="background-color: #f8fafc !important; border: 1px solid #f1f5f9;">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-white rounded-circle p-2 d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 40px; height: 40px;">
                                            <i class="fa-solid fa-user-tie text-primary" style="color: #fd5523 !important;"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted d-block" style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.5px;">Category </small>
                                            <strong class="text-dark">{{ $career['admission_counselor'][$index] ?? '' }}</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex flex-wrap gap-2 gap-md-3 mt-2 mt-md-0">
                                        @if($contact_number)
                                            <a href="tel:{{ $contact_number }}" class="btn btn-sm btn-outline-dark rounded-pill orange_btn px-3 py-2 d-flex align-items-center gap-2" style="font-size: 13px;">
                                                <i class="fa-solid fa-phone"></i> {{ $contact_number }}
                                            </a>
                                        @endif
                                        @if($email_id)
                                            <a href="mailto:{{ $email_id }}" class="btn btn-sm btn-outline-dark rounded-pill orange_btn px-3 py-2 d-flex align-items-center gap-2" style="font-size: 13px;">
                                                <i class="fa-solid fa-envelope"></i> {{ $email_id }}
                                            </a>
                                        @endif
                                        <button type="button" class="btn btn-sm btn-primary rounded-pill orange_btn1 px-3 py-2 d-flex align-items-center gap-2 apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal" data-index="{{ $index }}" data-job-code="{{ config('custom.school_code') }}{{ $career['job_code'][$index] ?? '' }}" data-industry="{{ $career['industry'][$index] ?? '' }}" data-admission-counselor="{{ $career['admission_counselor'][$index] ?? '' }}" data-job-type="{{ $career['job_type'][$index] ?? '' }}" data-contact-number="{{ $career['contact_number'][$index] ?? '' }}" data-email-id="{{ $career['email_id'][$index] ?? '' }}">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border_bottom"></div>
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

<!-- Apply Modal -->
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyModalLabel"><span class="roboto text_color heding_size">Apply for <span id="modalJobCode"></span></span> - <span id="modalIndustry"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('form.submit') }}" enctype="multipart/form-data" onsubmit="protect_with_recaptcha_v3(this, 'career')">
        @csrf
        <input type="hidden" name="form_name" value="career">
        <input type="hidden" name="job_code" id="modalJobCodeInput" value="">
        <input type="hidden" name="industry" id="modalIndustryInput" value="">
        <input type="hidden" name="admission_counselor" id="modalAdmissionCounselorInput" value="">
        <input type="hidden" name="job_type" id="modalJobTypeInput" value="">
        <input type="hidden" name="counselor_contact_number" id="modalContactNumberInput" value="">
        <input type="hidden" name="counselor_email_id" id="modalEmailIdInput" value="">
        <div class="modal-body">

        <div class="mb-3 border_bottom_div" id="modalDisplayValues">
            <p style="margin-bottom: 0;"><strong>Job Code:</strong> <span id="displayJobCode"></span></p>
            <p style="margin-bottom: 0;"><strong>Industry:</strong> <span id="displayIndustry"></span></p>
            <p style="margin-bottom: 0;"><strong>Admission Counselor:</strong> <span id="displayAdmissionCounselor"></span></p>
            <p style="margin-bottom: 0;"><strong>Job Type:</strong> <span id="displayJobType"></span></p>
            <p style="margin-bottom: 0;"><strong>Counselor Contact Number:</strong> <span id="displayContactNumber"></span></p>
            <p style="margin-bottom: 0;"><strong>Counselor Email ID:</strong> <span id="displayEmailId"></span></p>
        </div>


        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="applicantName" class="form-label">Name</label>
            <input type="text" class="form-control" id="applicantName" name="name" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="applicantEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="applicantEmail" name="email" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="applicantResume" class="form-label">Attach Resume (PDF/DOC/DOCX, max 2 MB)</label>
            <input type="file" class="form-control" id="applicantResume" name="resume" accept=".pdf,.doc,.docx" required>
          </div>
        </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn btn-sm btn-outline-dark rounded-pill px-3 py-2 d-flex align-items-center gap-2 text-white" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm rounded-pill orange_btn1 px-3 py-2 d-flex align-items-center gap-2">Submit Application</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
