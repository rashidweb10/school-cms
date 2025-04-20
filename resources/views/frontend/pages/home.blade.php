@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')

@php
  $banner_title = $pageData->meta->where('meta_key', 'banner_title')->first()->meta_value ?? '';
  $banner_images = explode(',', $pageData->meta->where('meta_key', 'banner_images')->first()->meta_value ?? '');
  $about_title = $pageData->meta->where('meta_key', 'about_title')->first()->meta_value ?? '';
  $about_description = $pageData->meta->where('meta_key', 'about_description')->first()->meta_value ?? '';
  $about_image = explode(',', $pageData->meta->where('meta_key', 'about_image')->first()->meta_value ?? '');
  $mission_title = $pageData->meta->where('meta_key', 'mission_title')->first()->meta_value ?? '';
  $mission_description = $pageData->meta->where('meta_key', 'mission_description')->first()->meta_value ?? '';
  $vision_title = $pageData->meta->where('meta_key', 'vision_title')->first()->meta_value ?? '';
  $vision_description = $pageData->meta->where('meta_key', 'vision_description')->first()->meta_value ?? '';
  $value_title = $pageData->meta->where('meta_key', 'value_title')->first()->meta_value ?? '';
  $value_description = $pageData->meta->where('meta_key', 'value_description')->first()->meta_value ?? '';
  $about_school_title = $pageData->meta->where('meta_key', 'about_school_title')->first()->meta_value ?? '';
  $about_school_description = $pageData->meta->where('meta_key', 'about_school_description')->first()->meta_value ?? '';
  $about_school_image = $pageData->meta->where('meta_key', 'about_school_image')->first()->meta_value ?? '';
  $home_milestones = json_decode($pageData->meta->where('meta_key', 'home_milestones')->first()->meta_value ?? '[]', true);
  $achievement_title = $pageData->meta->where('meta_key', 'achievement_title')->first()->meta_value ?? '';
  $achievement_description = $pageData->meta->where('meta_key', 'achievement_description')->first()->meta_value ?? '';
  $achievement_image = $pageData->meta->where('meta_key', 'achievement_image')->first()->meta_value ?? '';
  $home_awards = json_decode($pageData->meta->where('meta_key', 'home_awards')->first()->meta_value ?? '[]', true);
  $home_classrooms = json_decode($pageData->meta->where('meta_key', 'home_classrooms')->first()->meta_value ?? '[]', true);
  $home_quicklinks = json_decode($pageData->meta->where('meta_key', 'home_quicklinks')->first()->meta_value ?? '[]', true);
  $home_updates = json_decode($pageData->meta->where('meta_key', 'home_updates')->first()->meta_value ?? '[]', true);
@endphp

<div class="banner_slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="7000"  data-bs-pause="hover">
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
    <section class="about_section pt-0 pt-md-5 pb-md-5 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 ">
            <div class="text-start mb-md-4 mb-2 pt-md-4">
              <div class="skew-box ">
                  <p class="roboto text_color">{!! $banner_title !!}</p>
               </div>

            </div>
          </div>
          <div class="col-lg-4">
            <div class="position-relative">
              <a target="_blank" href="https://school.maptek.online/">
                 <img class="hvr-bounce-in w-100 admission_img bounce_continue" src="{{ central_asset(uploaded_asset(get_setting('admission_banner'))) }}" alt="img" />
            </a>  
            
            </div>
          </div>
          <div class="col-lg-8 paddngrgt80">
            <div class="text-start mb-md-4 mb-2 pt-4">
                <p class="pb-0 mb-0 pt-3">School Features</p>
              <h3 class="roboto text_color roboto">{!! $about_title !!}</h3>
            </div>
            {!! $about_description !!}
          </div>
          <div class="col-lg-2 col-12 pt55">
            <div class="about_border border_5 position-relative">
              <img class="hvr-bounce-in w-100 paddlr30" src="{{ central_asset(uploaded_asset($about_image[0] ?? '')) }}" alt="img" />
            </div>
          </div>
          <div class="col-lg-2 col-12 pt-5">
            <div class="row">
              <div class="col-lg-12 col-12">
                <div class="about_border border_6 position-relative">
                  <img class="hvr-bounce-in w-100 paddlr35" src="{{ central_asset(uploaded_asset($about_image[1] ?? '')) }}" alt="img" />
                </div>
              </div>
              <div class="col-lg-12 col-12 pt-4">
                <div class="about_border border_7 position-relative">
                  <img class="hvr-bounce-in w-100 paddlr40" src="{{ central_asset(uploaded_asset($about_image[2] ?? '')) }}" alt="img" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="service-categories text-xs-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 p-md-4 mb-md-0 mb-4">
            <div class="card service-card card-inverse hvr-bounce-in">
              <div class="card-block text-center px-md-5 p-3 py-md-4">
                <img src="{{ asset('assets/frontend/img/icon-smart-education.png') }}">
                <h4 class="card-title fw-normal text_color roboto">{{$mission_title}}</h4>
                <p>{!! $mission_description !!}</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 p-md-4 mb-md-0 mb-4">
            <div class="card service-card card-inverse hvr-bounce-in">
              <div class="card-block text-center px-md-5 p-3 py-md-4">
                <img src="{{ asset('assets/frontend/img/icon-knowladge-hub.png') }}">
                <h4 class="card-title fw-normal text_color roboto">{{$vision_title}}</h4>
                <p>{!! $vision_description !!}</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 p-md-4 mb-md-0 mb-4">
            <div class="card service-card card-inverse hvr-bounce-in">
              <div class="card-block text-center px-md-5 p-3 py-md-4">
                <img src="{{ asset('assets/frontend/img/icon-neo-kids.png') }}">
                <h4 class="card-title fw-normal text_color roboto">{{$value_title}}</h4>
                <p>{!! $value_description !!}</p>
              </div>
            </div>
          </div>
        </div>
        <!--End Row-->
      </div>
    </section>
    <section class="scholar_section mt-lg-5 pb-lg-5 position-relative z-index-9">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="border_8 pb-5 position-relative">
              <img class="hvr-bounce-in w-100" src="{{ central_asset(uploaded_asset($about_school_image)) }}" alt="img" />
            </div>
          </div>
          <div class="col-lg-8 text-center">
            <div class="text-start mb-md-4 mb-2 pt-md-0 pt-lg-5">
              <h3 class="roboto text_color text-center fw-normal">{{$about_school_title}}</h3>
            </div>
            <p class="text-center padd190">{!! $about_school_description !!}</p>
            <div class="read-more text-center">
              <a href="" class="btn-2">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    @if(isset($home_milestones['itration']) && is_array($home_milestones['itration']))
    <section id="counter" class="statistics-section about-us">
      <div class="container">
        <div class="row">
        
            @foreach($home_milestones['itration'] as $index => $itration)
                <div class="col-md-3 col-6 text-center">
                    <div class="stastic @if($loop->last) @else startimg @endif">
                        <div class="counter-value robot_slab" data-count="50">{{$home_milestones['title'][$index]}}</div>
                        <p class="robot_slab">{{$home_milestones['description'][$index]}}</p>
                    </div>
                </div>
            @endforeach
        
        </div>
      </div>
    </section>
    @endif

    <section class="pt-4 pt-md-5 pb-md-5">
      <div class="container paddlft50 pt-md-5">
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-4">
            <div class="about_border border_10" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
              <img class="hvr-bounce-in w-100" src="{{ central_asset(uploaded_asset($achievement_image)) }}" alt="img" />
            </div>
          </div>
          <div class="col-lg-8 ps-md-4">
            <div class="education_box">
              <div class="text-start mb-md-3 mb-2 pt-2">
                <h3 class="roboto text_color">{{$achievement_title}}</h3>
              </div>
              <p>{!! $achievement_description !!}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    @if(isset($home_awards['itration']) && is_array($home_awards['itration']))
    <section class="awards_achievements pt-4 pt-md-5 pb-5 position-relative">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 aos-init aos-animate">
            <div class="text-start mb-md-4 mb-2 pt-2">
              <h3 class="roboto text_color text-center">Awards & Achievements </h3>
            </div>
          </div>
          

          <div class="owl-carousel achievements">
          @foreach($home_awards['itration'] as $index => $itration)
            <div class="item">
                  <div class="aos-init aos-animate position-relative">
                  <div class="about_border border_9 position-relative">
                    <a href="{{ central_asset(uploaded_asset($home_awards['image'][$index])) }}" data-fancybox="gallery1">
                      <img class="jbox-img rotate w-100 hvr-bounce-in" src="{{ central_asset(uploaded_asset($home_awards['image'][$index])) }}" alt="">
                    </a>
                  </div>
                    <p class="text-center pt-1">{{$home_awards['title'][$index]}}</p>
                </div>
            </div>
            @endforeach
          </div>
           
          
            
          
           <!-- <div class="read-more text-center">
              <a href="#" class="btn-2">View All</a>
            </div> -->
        </div>
      </div>
    </section>
    @endif

    @if(isset($home_classrooms['itration']) && is_array($home_classrooms['itration']))
    <section class="gallery_section">
      <div class="bgcolor pb-4 pt-4 pb-md-5 pt-md-5">
        <div class="container">
          <div class="row">
          
            @foreach($home_classrooms['itration'] as $index => $itration)
              <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <a class="text-decoration-none text-dark" href="{{$home_classrooms['url'][$index]}}">
                <div class="classroom_box border_2 position-relative">
                  <img class="hvr-bounce-in w-100" src="{{ central_asset(uploaded_asset($home_classrooms['image'][$index])) }}" alt="Image 1">
                  <div class=" text-center pt-3">
                    <p class="centered-text roboto">{{$home_classrooms['title'][$index]}}</p>
                  </div>
                </div>
                </a>
              </div>
            @endforeach
          
          </div>
        </div>
      </div>
    </section>
    @endif
    
    @if(isset($home_updates['itration']) && is_array($home_updates['itration']))
    <section class="news_section">
      <div class="pb-4 pt-4 pb-md-5 pt-md-5">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 aos-init aos-animate">
            <div class="text-start mb-md-5 mb-4 pt-2">
              <h3 class="roboto text_color text-center">News & Updates</h3>
            </div>
          </div>
          

          <div class="owl-carousel news_update">
             
          
            @foreach($home_updates['itration'] as $index => $itration)          
            <div class="item">
              <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                <a class="text-decoration-none text-dark" href="{{$home_updates['url'][$index]}}">
                <div class="news_box">
                    <div class="news_img"><img class="hvr-bounce-in" src="{{ central_asset(uploaded_asset($home_updates['image'][$index])) }}" alt="Image 1"></div>
                    <div class=" text-center pt-3">
                        <h5>{{$home_updates['title'][$index]}}</h5>
                    <p class="centered-text roboto">{{$home_updates['description'][$index]}}</p>
                  </div>
                </div>
                </a>
              </div>
              </div>
            @endforeach
            </div>
            
          </div>
        </div>
      </div>
    </section>
    @endif
    
    @if(isset($home_quicklinks['itration']) && is_array($home_quicklinks['itration']))
    <section class="quicklinks light_bgs">
      <div class="pb-4 pt-4 pb-md-5 pt-md-5">
        <div class="container">
          <div class="row">
              <div class="col-lg-12 aos-init aos-animate">
            <div class="text-start mb-md-5 mb-4 pt-2">
              <h3 class="roboto text_color text-center">Quick Links</h3>
            </div>
          </div>
          
          @foreach($home_quicklinks['itration'] as $index => $itration)          
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
              <a class="text-decoration-none text-dark" href="{{$home_quicklinks['url'][$index]}}">
                <div class="quick_link_box">
                    <div class="quickimg"><img class="hvr-bounce-in" src="{{ central_asset(uploaded_asset($home_quicklinks['icon'][$index])) }}" alt="Image 1"></div>
                </div>
                <div class=" text-center pt-3">
                  <p class="centered-text roboto">{{$home_quicklinks['title'][$index]}}</p>
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
