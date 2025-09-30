
@extends('frontend.layouts.landing-app')


@section('meta.title', "Thank You")
@section('meta.description', "Thank You")

@section('content')
<style>
body
{
    background: #fafafa !important;
}
.thankyou_card {
    background: #fff;
    text-align: center;
    padding: 30px;
    border-radius: 10px;
}

.thankyou_card h2 {
    font-weight: 600 !important;
}

.iconn_bg i {
    background: #01ba811c;
    color: #01ba81;
    width: 85px;
    height: 85px;
    border-radius: 50px;
    font-size: 48px;
    line-height: 85px;
}
</style>

<section class="pb-md-5 pb-4 pt-md-5 pt-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-10">

                <div class="thankyou_card">
                    <div class="">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="iconn_bg">
                               <i class="fa-solid fa-check"></i> 
                            </div>
                        </div>

                        <h2 class="h5 mb-1">Hi, {{ request()->get('name', 'User') }}</h2>
                        <p class="text-muted mb-4 pt-2" style="    font-weight: 400;">Thank You for an enquiry, one of our school executive will contact you soon.</p>

                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            <a href="{{ url('/') }}" class="btn btn-danger px-3">Go to Home</a>
                        </div>
<!-- 
                        <small class="d-block text-muted mt-4 pt-3">We will get back to you within 24–48 hours.</small> -->
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
