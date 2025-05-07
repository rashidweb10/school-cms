@extends('frontend.layouts.landing-app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
  $banner_title = $pageData->meta->where('meta_key', 'banner_title')->first()->meta_value ?? '';
  $banner_images = explode(',', $pageData->meta->where('meta_key', 'banner_images')->first()->meta_value ?? '');
  $about_title = $pageData->meta->where('meta_key', 'about_title')->first()->meta_value ?? '';
  $about_description = $pageData->meta->where('meta_key', 'about_description')->first()->meta_value ?? '';
  $about_title2 = $pageData->meta->where('meta_key', 'about_title2')->first()->meta_value ?? '';
  $about_description2 = $pageData->meta->where('meta_key', 'about_description2')->first()->meta_value ?? '';
  $about_image = explode(',', $pageData->meta->where('meta_key', 'about_image')->first()->meta_value ?? '');
  $mission_title = $pageData->meta->where('meta_key', 'mission_title')->first()->meta_value ?? '';
  $mission_description = $pageData->meta->where('meta_key', 'mission_description')->first()->meta_value ?? '';
  $vision_title = $pageData->meta->where('meta_key', 'vision_title')->first()->meta_value ?? '';
  $vision_description = $pageData->meta->where('meta_key', 'vision_description')->first()->meta_value ?? '';
  $value_title = $pageData->meta->where('meta_key', 'value_title')->first()->meta_value ?? '';
  $value_description = $pageData->meta->where('meta_key', 'value_description')->first()->meta_value ?? '';
  $landing_milestones = json_decode($pageData->meta->where('meta_key', 'landing_milestones')->first()->meta_value ?? '[]', true);
  $video = $pageData->meta->where('meta_key', 'video')->first()->meta_value ?? '';
  $landing_quicklinks = json_decode($pageData->meta->where('meta_key', 'landing_quicklinks')->first()->meta_value ?? '[]', true);
  $landing_updates = json_decode($pageData->meta->where('meta_key', 'landing_updates')->first()->meta_value ?? '[]', true);
@endphp

<div class="banner_slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000"  data-bs-pause="hover">
        <!-- Indicators
        <div class="carousel-indicators"><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button><button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button></div> -->
        <!-- Carousel items -->
        <div class="carousel-inner">
            @foreach($banner_images as $index => $id)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ central_asset(uploaded_asset($id)) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>

    <!-- Next button -->
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
      </div>
    </div>
    <!--about us section start-->
    <section class="about_section pt-4 pt-md-5 pb-md-5 position-relative">
      <div class="container position-relative">
        <div class="row">
          <div class="col-lg-7">
            <div class="text-start mb-md-4 mb-2 pt-4">
              <div class="skew-box ">
                  <p class="roboto text_color"> {!! $banner_title !!} </p>
               </div>

            </div>
          </div>
          <div class="col-lg-5">
            <div class="admission_form">
                <img class="hvr-bounce-in w-100 admission_img bounce_continue" src="{{ central_asset(uploaded_asset(get_setting('admission_banner'))) }}" alt="img" />
                
                
                <h4 class="robot_slab text_color pt-70">Admission Enquiry Form</h4>
                <p><b>AY - {{ now()->year }} - {{ now()->year + 1 }}</b></p>
                
                <!-- ✅ School Admission Form -->
                <form method="post" action="{{ route('form.submit') }}" id="admissionForm" onsubmit="protect_with_recaptcha_v3(this, 'admission')">
                  @include('frontend.components.form-alert')
                  @csrf
                  <input type="hidden" name="form_name" value="admission">

                  <div class="row">
                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <select name="city" class="form-control" required>
                          <option value="">--- Select City ---</option>
                          <option value="Thane">Thane</option>
                          <option value="Navi Mumbai">Navi Mumbai</option>
                          <option value="Raigad">Raigad</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <select name="school" class="form-control" required>
                            <option value="">--- Select School Name ---</option>
                            @foreach($schools as $school)
                              <option data-id="{{ $school->id }}" value="{{ $school->name }}">
                                {{ $school->name }},
                                {{$school->meta->where('meta_key', 'location')->first()->meta_value ?? ''}}
                              </option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <input type="text" class="form-control" name="standard" placeholder="Select Standard*" required>
                      </div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <input type="text" class="form-control" name="name" placeholder="Parent's Name*" required>
                      </div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <input type="text" class="form-control" name="phone" placeholder="Mobile Number*" required>
                      </div>
                    </div>

                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <input type="email" class="form-control" name="email" placeholder="Email ID*" required>
                      </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form> 
              
            </div>
          </div>
          
          <div class="col-lg-6 pt55">
            <div class="locatio_box">
                <ul>
                    @foreach($schools as $school)
                    <li class="hvr-bounce-in loationtext_hover"><p><a target="_blank" href="{{$school->website}}"><i class="fa-solid fa-caret-right"></i>{{$school->name}}, {{$school->meta->where('meta_key', 'location')->first()->meta_value ?? ''}} </a></p></li>
                    @endforeach
                  </ul>
            </div>
          </div>
          
          <div class="col-lg-6">
            <div class="text-start mb-md-4 mb-2 pt-4">
              
              <h3 class="roboto text_color roboto padding100">{{$about_title}}</h3>
            </div>
            <p>{!! $about_description !!}</p>
           
          </div>
          
         
        </div>
      </div>
    </section>


<section class="scholar_section mt-md-5 mt-3 pb-5">
      <div class="container">
        <div class="row">
             <div class="col-lg-6">
            <div class=" mb-md-4 mb-2 pt-md-0 pt-4">
              <h3 class="roboto text_color fw-normal">{{$about_title2}}</h3>
            </div>
            <p class="">{!! $about_description2 !!}</p>
          </div>
          
          <div class="col-lg-6">
              <div class="position-relative">
            <div class="border_8 ">
               <div class="owl-carousel group_schools">
              @foreach($about_image as $id)
                <div class="item"><img class="hvr-bounce-in" src="{{ central_asset(uploaded_asset($id)) }}" alt="Image {{$id}}"></div>
              @endforeach
            </div>
            </div>
            </div>
           
          </div>
         
        </div>
      </div>
    </section>


<section class="vission_mission pt-5 pb-4 position-relative">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 aos-init aos-animate position-relative mb-md-0 mb-4">
        <div class="vission_box position-relative">
          <h4 class="roboto text_color text-center">{{$mission_title}}</h4>
          <i class="fa-solid fa-quote-left left_icons"></i>
          <p class="text-center">{{$mission_description}}</p>
          <i class="fa-solid fa-quote-left right_icons"></i>
        </div>
      </div>

      <div class="col-lg-4 aos-init aos-animate position-relative mb-md-0 mb-4">
        <div class="vission_box position-relative">
          <h4 class="roboto text_color text-center">{{$vision_title}}</h4>
          <i class="fa-solid fa-quote-left left_icons"></i>
          <p class="text-center">{{$vision_description}}</p>
          <i class="fa-solid fa-quote-left right_icons"></i>
        </div>
      </div>

      <div class="col-lg-4 aos-init aos-animate position-relative">
        <div class="vission_box position-relative">
          <h4 class="roboto text_color text-center">{{$value_title}}</h4>
          <i class="fa-solid fa-quote-left left_icons"></i>
          <p class="text-center">{{$value_description}}</p>
          <i class="fa-solid fa-quote-left right_icons"></i>
        </div>
      </div>
    </div>
  </div>
</section>

@if(isset($landing_milestones['itration']) && is_array($landing_milestones['itration']))
  <section id="counter" class="statistics-section about-us">
    <div class="container">
      <div class="row">
      
          @foreach($landing_milestones['itration'] as $index => $itration)
              <div class="col-md-3 col-6 text-center">
                  <div class="stastic @if($loop->last) @else startimg @endif">
                      <div class="counter-value robot_slab" data-count="50">{{$landing_milestones['title'][$index]}}</div>
                      <p class="robot_slab">{{$landing_milestones['description'][$index]}}</p>
                  </div>
              </div>
          @endforeach
      
      </div>
    </div>
  </section>
  @endif

<section class="gallery_section">
      <div class="pb-0 pt-5 pb-md-5 pt-md-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
              <div class="classroom_box border_2 position-relative">
                <iframe width="100%" height="100%" src="{{$video}}" title="Red Day Celebration | Pre-Primary | New Horizon Scholars School, Vasant Lawns, Thane" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@if(isset($landing_updates['itration']) && is_array($landing_updates['itration']))
    <section class="news_section">
      <div class="pb-4 pt-4 pb-md-5 pt-md-5">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 aos-init aos-animate">
            <div class="text-start mb-md-5 mb-4 pt-2">
              <h3 class="roboto text_color text-center">Recent Updates</h3>
            </div>
          </div>
          
            @foreach($landing_updates['itration'] as $index => $itration)          
              <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <div class="news_box">
                  <a class="text-decoration-none text-dark" href="{{$landing_updates['url'][$index]}}">
                    <div class="news_img"><img class="hvr-bounce-in" src="{{ central_asset(uploaded_asset($landing_updates['image'][$index])) }}" alt="Image 1"></div>
                    <div class=" text-center pt-3">
                        <h5>{{$landing_updates['title'][$index]}}</h5>
                    <p class="centered-text roboto">{{$landing_updates['description'][$index]}}</p>
                    </div>
                  </a>
                </div>
              </div>
            @endforeach
          
            
          </div>
        </div>
      </div>
    </section>
    @endif

@if(isset($landing_quicklinks['itration']) && is_array($landing_quicklinks['itration']))
    <section class="quicklinks light_bgs">
      <div class="pb-4 pt-4 pb-md-5 pt-md-5">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 aos-init aos-animate">
            <div class="text-start mb-md-5 mb-4 pt-2">
              <h3 class="roboto text_color text-center">Quick Links</h3>
            </div>
          </div>
          
          @foreach($landing_quicklinks['itration'] as $index => $itration)          
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
              <a class="text-decoration-none text-dark" href="{{$landing_quicklinks['url'][$index]}}">
              <div class="quick_link_box">
                  <div class="quickimg"><img class="hvr-bounce-in" src="{{ central_asset(uploaded_asset($landing_quicklinks['icon'][$index])) }}" alt="Image 1"></div>
              </div>
               <div class=" text-center pt-3">
                  <p class="centered-text roboto">{{$landing_quicklinks['title'][$index]}}</p>
                </div>
              </a>
            </div>
          @endforeach
           
          </div>
        </div>
      </div>
    </section>
    @endif 

@endsection

@section('scripts')
<script>
$(document).ready(function () {
    const $schoolSelect = $('select[name="school"]');
    const $allOptions = $schoolSelect.find('option');

    // Hide all school options except the first one on page load
    $allOptions.not(':first').hide();

    $('select[name="city"]').on('change', function () {
        const city = $(this).val();

        // Reset school dropdown
        $schoolSelect.val('');
        $allOptions.not(':first').hide(); // Hide all school options

        // Show specific schools based on selected city
        if (city === 'Thane') {
            $allOptions.filter(function () {
                return $(this).attr('data-id') === '2' || $(this).attr('data-id') === '3' || $(this).attr('data-id') === '4' || $(this).attr('data-id') === '5';
            }).show();
        } else if (city === 'Navi Mumbai') {
            $allOptions.filter(function () {
                return $(this).attr('data-id') === '6' || $(this).attr('data-id') === '7';
            }).show();
        } else if (city === 'Raigad') {
            $allOptions.filter(function () {
                return $(this).attr('data-id') === '8';
            }).show();
        }
    });
});
</script>
@endsection