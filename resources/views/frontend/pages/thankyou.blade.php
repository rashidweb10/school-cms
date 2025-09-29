@extends('frontend.layouts.app')

@section('meta.title', "Thank You")
@section('meta.description', "Thank You")

@section('content')



<section class="pb-md-5 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <div class="card shadow-sm p-4 p-md-5 text-center">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-opacity-10 text-success" style="width:72px;height:72px;font-size:4rem;">
                                ✔️ 
                            </div>
                        </div>

                        <h2 class="h5 mb-1">Hi, {{ request()->get('name', 'User') }}</h2>
                        <p class="text-muted mb-4">Enquiry has been submitted successfully</p>

                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <a href="{{ url('/') }}" class="btn btn-danger px-3">Go to Home</a>
                        </div>

                        <small class="d-block text-muted mt-3">We will get back to you within 24–48 hours.</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    function goBack() {
        if (history.length > 1) history.back();
        else window.location.href = "{{ url('/') }}";
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.top_position').forEach(function (el) {
            el.classList.remove('top_position');
        });
    });
</script>

<style>
.header_section {
    visibility: hidden;
}    
</style>

@endsection
