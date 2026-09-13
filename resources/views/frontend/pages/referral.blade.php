@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])

<section class="pb-md-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {!! $pageData->content !!}
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-10 col-xl-9">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4 p-md-5">
                        <form method="post" action="{{ route('form.submit') }}" id="referralForm" onsubmit="protect_with_recaptcha_v3(this, 'referral')">
                            @include('frontend.components.form-alert')
                            @csrf
                            <input type="hidden" name="form_name" value="referral">
                            <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px">

                            <h4 class="text_color mb-4">Referring / Existing Student's Details</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="name">Existing Student Contact Name</label>
                                    <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="email">Existing Student Contact Email</label>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="phone">Existing Student Contact Phone</label>
                                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" class="form-control" inputmode="numeric" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="existing_student_school">Existing Student School</label>
                                    <select id="existing_student_school" name="existing_student_school" class="form-select referral-school" data-selected="{{ old('existing_student_school') }}" required>
                                        <option value="">Select school</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="existing_student_grade">Existing Student Grade</label>
                                    <select id="existing_student_grade" name="existing_student_grade" class="form-select referral-grade" data-selected="{{ old('existing_student_grade') }}" required disabled>
                                        <option value="">Select standard</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-4">

                            <h4 class="text_color mb-4">Details of the Child Referred</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="referred_child_name">Referred Child Name</label>
                                    <input id="referred_child_name" type="text" name="referred_child_name" value="{{ old('referred_child_name') }}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="referred_child_school">School Seeking Admission</label>
                                    <select id="referred_child_school" name="referred_child_school" class="form-select referral-school" data-selected="{{ old('referred_child_school') }}" required>
                                        <option value="">Select school</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="referred_child_grade">Grade Seeking Admission</label>
                                    <select id="referred_child_grade" name="referred_child_grade" class="form-select referral-grade" data-selected="{{ old('referred_child_grade') }}" required disabled>
                                        <option value="">Select standard</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="parent_name">Parent Name</label>
                                    <input id="parent_name" type="text" name="parent_name" value="{{ old('parent_name') }}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="parent_email">Parent Email</label>
                                    <input id="parent_email" type="email" name="parent_email" value="{{ old('parent_email') }}" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="parent_phone">Parent Phone</label>
                                    <input id="parent_phone" type="tel" name="parent_phone" value="{{ old('parent_phone') }}" class="form-control" inputmode="numeric" required>
                                </div>
                                <div class="col-12 text-center mt-2">
                                    <button type="submit" class="btn btn-success btn-lg submit_bittons">Submit Referral</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    $(function () {
        const schoolExportData = @json($schoolExportData);
        const schools = schoolExportData?.SchoolGroupList?.[0]?.SchoolList || [];

        $('.referral-school').each(function () {
            const $schoolSelect = $(this);
            const $gradeSelect = $schoolSelect.closest('.row').find('.referral-grade');
            const selectedSchool = $schoolSelect.data('selected');

            schools.forEach(function (school) {
                $schoolSelect.append(
                    $('<option>')
                        .val(school.SchoolName)
                        .text(school.SchoolName)
                        .attr('data-classes', JSON.stringify(school.ClassList || []))
                        .prop('selected', school.SchoolName === selectedSchool)
                );
            });

            $schoolSelect.on('change', function () {
                const classList = $(this).find(':selected').data('classes') || [];
                const selectedGrade = $gradeSelect.data('selected');

                $gradeSelect.empty().append('<option value="">Select standard</option>');
                classList.forEach(function (schoolClass) {
                    $gradeSelect.append(
                        $('<option>')
                            .val(schoolClass.ClassName)
                            .text(schoolClass.ClassName)
                            .prop('selected', schoolClass.ClassName === selectedGrade)
                    );
                });

                $gradeSelect.prop('disabled', !classList.length).removeData('selected');
            }).trigger('change');
        });
    });
</script>
@endsection
