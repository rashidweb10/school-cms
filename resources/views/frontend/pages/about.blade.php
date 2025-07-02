@extends('frontend.layouts.app')

@section('meta.title', $pageData->seo_title)
@section('meta.description', $pageData->seo_description)

@section('content')
@php

    $about_description = $pageData->meta->where('meta_key', 'about_description')->first()->meta_value ?? '';
    $about_image = $pageData->meta->where('meta_key', 'about_image')->first()->meta_value ?? '';
    $about_school_description = $pageData->meta->where('meta_key', 'about_school_description')->first()->meta_value ?? '';
    $mission_title = $pageData->meta->where('meta_key', 'mission_title')->first()->meta_value ?? '';
    $mission_description = $pageData->meta->where('meta_key', 'mission_description')->first()->meta_value ?? '';
    $vision_title = $pageData->meta->where('meta_key', 'vision_title')->first()->meta_value ?? '';
    $vision_description = $pageData->meta->where('meta_key', 'vision_description')->first()->meta_value ?? '';
    $value_title = $pageData->meta->where('meta_key', 'value_title')->first()->meta_value ?? '';
    $value_description = $pageData->meta->where('meta_key', 'value_description')->first()->meta_value ?? '';
    $awards = json_decode($pageData->meta->where('meta_key', 'awards')->first()->meta_value ?? '[]', true);
@endphp

@include('frontend.partials.breadcrumb', ['title' => $pageData->title])
<section class="aboutpg_section pb-md-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="pb-md-5 position-relative">
          <div class="border_11 inneraboutimg">
            <img class="hvr-bounce-in w-100" src="{{ central_asset(uploaded_asset($about_image)) }}" alt="img">
          </div>

        </div>
      </div>
      <div class="col-lg-12 pt-md-0 pt-md-5 pt-4">
      <p>{!! $about_description !!}</p>
      </div>
    </div>
  </div>
</section>


<section class="about_tabs pb-md-5 pb-4 dark_org_color mt-4 position-relative">
    <div class="container">
        <div class="row">
            <div class="scrollable-tabs">
                <ul class="nav nav-pills mb-md-3" id="pills-tab" role="tablist">
                    @foreach($categories as $index => $category)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ $index == 0 ? 'active' : '' }}" 
                                id="tab_{{ $category->id }}" 
                                data-bs-toggle="pill" 
                                data-bs-target="#content_{{ $category->id }}" 
                                type="button" role="tab" 
                                aria-controls="content_{{ $category->id }}" 
                                aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                                {{ $category->name }}
                            </button>
                        </li>
                    @endforeach
                    <!-- Static "School Information" Tab -->
                    <li class="nav-item d-none" role="presentation">
                        <button class="nav-link" id="tab_school_info" 
                            data-bs-toggle="pill" 
                            data-bs-target="#content_school_info" 
                            type="button" role="tab" 
                            aria-controls="content_school_info" 
                            aria-selected="false">
                            School Information
                        </button>
                    </li>                    
                </ul>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="pills-tabContent">
                @foreach($categories as $index => $category)
                    <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" 
                        id="content_{{ $category->id }}" 
                        role="tabpanel" 
                        aria-labelledby="tab_{{ $category->id }}">

                        @if(Str::contains(strtolower($category->name), 'desk'))
                            {{-- Template 1: Category name contains "Desk" --}}
                            <div class="row">
                                @foreach($category->teams as $team)
                                <div class="col-md-4 funder_left">
                                  <div class="row">
                                    <div class="col-md-12 col-12 pb-3">
                                      <div class="founder_box">
                                        <div class="founder_img position-relative">
                                          <img src="{{ central_asset(uploaded_asset($team->image)) }}" alt="{{$team->name}}" />
                                        </div>
                                        <h4 class="fs-6 text-center pt-3 mb-0">{{$team->name}}</h4>
                                        <p class="text-center pb-md-3 mb-0 pb-0">{{$team->designation}}</p>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8 pl30 funder_right">
                                  <p>{!! $team->description !!}</p>
                                </div>
                                @endforeach
                            </div>

                        @elseif(Str::contains(strtolower($category->name), 'team'))
                            {{-- Template 2: Category has teams --}}
                            <div class="row d-flex">
                                @foreach($category->teams as $team)
                                <div class=" col-12 col-md-4 p-md-3">
                                  <div class="leader_mamber_img">
                                  <!-- <div class="lightbox_img_wrap">
                                    <img class="lightbox-enabled" src="{{ central_asset(uploaded_asset($team->image)) }}"
                                      data-imgsrc="{{ central_asset(uploaded_asset($team->image)) }}">
                                  </div> -->
                                  <a href="{{ central_asset(uploaded_asset($team->image)) }}" data-fancybox="teams">
                                    <img width="100%" class="" src="{{ central_asset(uploaded_asset($team->image)) }}" alt="">
                                  </a>                                  
                                </div>
                                </div>
                                @endforeach
                            </div>

                        @else
                        {{-- Template 3: No teams in category --}}
                                @php
                                    $firstRowTeams = $category->teams->sortBy('id')->take(2);
                                    $secondRowTeams = $category->teams->sortBy('id')->skip(2);
                                @endphp
                                
                                <div class="row justify-content-center">
                                    @foreach($firstRowTeams as $team)
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <div class="leader_mamber_img leader_mamber_img1">
                                            <img src="{{ central_asset(uploaded_asset($team->image)) }}" class="img-fluid" alt="{{ $team->name }}">
                                        </div>
                                        <div class="leader_mamber_dtl text-center">
                                            <h5 class="fs-6 text-center pt-3 mb-0">{{ $team->name }}</h5>
                                            <p>{{ $team->designation }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                                <div class="row mt-4">
                                    @foreach($secondRowTeams as $team)
                                    <div class="col-md-4 col-lg-4 col-12">
                                        <div class="leader_mamber_img leader_mamber_img1">
                                            <img src="{{ central_asset(uploaded_asset($team->image)) }}" class="img-fluid" alt="{{ $team->name }}">
                                        </div>
                                        <div class="leader_mamber_dtl text-center">
                                            <h5 class="fs-6 text-center pt-3 mb-0">{{ $team->name }}</h5>
                                            <p>{{ $team->designation }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                        @endif

                    </div>
                @endforeach
                <!-- Static "School Information" Tab Content -->
                <div class="tab-pane fade d-none" id="content_school_info" role="tabpanel" aria-labelledby="tab_school_info">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="">
                                <div class="">
                                    {!! $about_school_description !!}
                                </div>
                            </div>
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

      <!-- <div class="col-lg-4 aos-init aos-animate position-relative">
        <div class="vission_box position-relative">
          <h4 class="roboto text_color text-center">{{$value_title}}</h4>
          <i class="fa-solid fa-quote-left left_icons"></i>
          <p class="text-center">{{$value_description}}</p>
          <i class="fa-solid fa-quote-left right_icons"></i>
        </div>
      </div> -->


    </div>
  </div>
</section>

@if(isset($awards['itration']) && is_array($awards['itration']))
<section class="awards_achievements pt-4 pt-md-5 pb-5 position-relative">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 aos-init aos-animate">
        <div class="text-start mb-md-4 mb-2 pt-2">
          <h3 class="roboto text_color text-center">Awards & Achievements </h3>
        </div>
      </div>
      @foreach($awards['itration'] as $index => $itration)
      <div class="col-lg-3 aos-init aos-animate position-relative">
        <div class="about_border border_9 position-relative">
          <a href="{{ central_asset(uploaded_asset($awards['image'][$index])) }}" data-fancybox="gallery4">
            <img class="jbox-img rotate w-100 hvr-bounce-in" src="{{ central_asset(uploaded_asset($awards['image'][$index])) }}" alt="">
          </a>
        </div>
        <p class="text-center pt-1">{{$awards['title'][$index]}}</p>
      </div>
      @endforeach
      <!-- <div class="read-more text-center">
        <a href="#" class="btn-2">View All</a>
      </div> -->
    </div>
  </div>
</section>
@endif

<style>
  .leader_mamber_img {
    padding: 15px;
    position: relative;
    z-index: 10;
  }

  .leader_mamber_img::before {
    content: "";
    position: absolute;
    height: 20%;
    width: 100%;
    bottom: 0px;
    left: 0px;
    z-index: 20;
    background-color: #fdee9d;
  }

  .leader_mamber_img img {
    position: relative;
    z-index: 100;
  }
</style>

<style>
  .lightboxpreview {
    transition: all .3s linear;
    padding-top: 60%;
    cursor: pointer;
    background-size: cover;
  }

  .lightbox-content {
    max-height: 75vh;
    height: 75vh;
    width: 100%;
    max-width: 1000px;
  }

  .lightbox-close {
    cursor: pointer;
    margin-left: auto;
    position: absolute;
    right: -30px;
    top: -30px;
    color: white;
    font-size: 2rem;
    font-weight: 700;
    line-height: 1;
  }

  .modal_inner_image {
    min-height: 400px;
    z-index: 1000;
  }

  /* .modal-content {
                width: 100%;
              } */


  .modalscale {
    transform: scale(0);
    opacity: 0;
  }



  .lightbox-container,
  .lightbox-btn,
  .lightbox-image-wrapper,
  .lightbox-enabled {
    transition: all .4s ease-in-out;
  }

  .lightbox_img_wrap {
    padding-top: 65%;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
  }

  .lightbox-enabled:hover {
    transform: scale(1.1)
  }

  .lightbox-enabled {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    object-fit: cover;
    cursor: pointer;
  }

  .lightbox-container {
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0, 0, 0, .6);
    z-index: 9999;
    opacity: 0;
    pointer-events: none;
  }

  .lightbox-container.active {
    opacity: 1;
    pointer-events: all;
  }

  .lightbox-image-wrapper {
    display: flex;
    transform: scale(0);
    align-items: center;
    justify-content: center;
    max-width: 90vw;
    max-height: 90vh;
    position: relative;
  }

  .lightbox-container.active .lightbox-image-wrapper {
    transform: scale(1);
  }

  .lightbox-btn,
  #close {
    z-index: 9999999;
    cursor: pointer;
    position: absolute;
  }

  .lightbox-btn:focus {
    outline: none;
  }

  .left {
    left: 50px;
  }

  .right {
    right: 50px;
  }

  #close {
    top: 50px;
    right: 50px;
  }

  .lightbox-image {
    width: 100%;
    -webkit-box-shadow: 5px 5px 20px 2px rgba(0, 0, 0, 0.19);
    box-shadow: 5px 5px 20px 2px rgba(0, 0, 0, 0.19);
    max-height: 95vh;
    object-fit: cover;
  }

  @keyframes slideleft {
    33% {
      transform: translateX(-300px);
      opacity: 0;
    }

    66% {
      transform: translateX(300px);
      opacity: 0;
    }
  }


  .slideleft {
    animation-name: slideleft;
    animation-duration: .5s;
    animation-timing-function: ease;
  }

  @keyframes slideright {
    33% {
      transform: translateX(300px);
      opacity: 0;
    }

    66% {
      transform: translateX(-300px);
      opacity: 0;
    }
  }


  .slideright {
    animation-name: slideright;
    animation-duration: .5s;
    animation-timing-function: ease;
  }

  .material-icons img {
    width: 40px;
    height: 40px;
    filter: grayscale(0%);
    transition: filter 0.5s ease-in-out;
  }

  .material-icons img:hover {
    filter: grayscale(100%);
  }
</style>
@endsection


@section('scripts')
<script>
  // query selectors
  const lightboxEnabled = document.querySelectorAll('.lightbox-enabled');
  const lightboxArray = Array.from(lightboxEnabled);
  const lastImage = lightboxArray.length - 1;
  const lightboxContainer = document.querySelector('.lightbox-container');
  const lightboxImage = document.querySelector('.lightbox-image');
  const lightboxBtns = document.querySelectorAll('.lightbox-btn');
  const lightboxBtnRight = document.querySelector('#right');
  const lightboxBtnLeft = document.querySelector('#left');
  const close = document.querySelector('#close');
  let activeImage;
  // Functions
  const showLightBox = () => {
    lightboxContainer.classList.add('active')
  }

  const hideLightBox = () => {
    lightboxContainer.classList.remove('active')
  }

  const setActiveImage = (image) => {
    lightboxImage.src = image.dataset.imgsrc;
    activeImage = lightboxArray.indexOf(image);
  }

  const transitionSlidesLeft = () => {
    lightboxBtnLeft.focus();
    $('.lightbox-image').addClass('slideright');
    setTimeout(function() {
      activeImage === 0 ? setActiveImage(lightboxArray[lastImage]) : setActiveImage(lightboxArray[activeImage - 1]);
    }, 250);


    setTimeout(function() {
      $('.lightbox-image').removeClass('slideright');
    }, 500);
  }

  const transitionSlidesRight = () => {
    lightboxBtnRight.focus();
    $('.lightbox-image').addClass('slideleft');
    setTimeout(function() {
      activeImage === lastImage ? setActiveImage(lightboxArray[0]) : setActiveImage(lightboxArray[activeImage + 1]);
    }, 250);
    setTimeout(function() {
      $('.lightbox-image').removeClass('slideleft');
    }, 500);
  }

  const transitionSlideHandler = (moveItem) => {
    moveItem.includes('left') ? transitionSlidesLeft() : transitionSlidesRight();
  }

  // Event Listeners
  lightboxEnabled.forEach(image => {
    image.addEventListener('click', (e) => {
      showLightBox();
      setActiveImage(image);
    })
  })
  lightboxContainer.addEventListener('click', () => {
    hideLightBox()
  })
  close.addEventListener('click', () => {
    hideLightBox()
  })
  lightboxBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      transitionSlideHandler(e.currentTarget.id);
    })
  })

  lightboxImage.addEventListener('click', (e) => {
    e.stopPropagation();

  })
</script>
<script>
  setTimeout(function () {
      // Find the Management tab
      var $management = $('button:contains("Management")').closest('li');

      // Find the Principal's Desk tab
      var $principal = $('button:contains("Principal\'s Desk")').closest('li');

      // Move Management before Principal
      if ($management.length && $principal.length) {
          $management.insertBefore($principal);
      }
  }, 1000); // 1 second delay
</script>
@endsection
