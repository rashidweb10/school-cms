<div class="internal_banner">
  <img src="{{ asset('assets/frontend/img/about-banner.png') }}" class="w-100">
</div>

@if($title)
<section class="  pt-4 pt-md-5 pb-md-5 position-relative">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ">
        <div class="text-start mb-md-4 mb-4 pt-md-4">
          <div class="skew-box inner-skew">
            <p class="roboto text_color">{{$title}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="position-relative inner_adminssion">
          <img class="hvr-bounce-in w-100 admission_img bounce_continue" src="{{ asset('assets/frontend/img/admission-img.png') }}" alt="img">
        </div>
      </div>
    </div>
  </div>
</section>
@endif