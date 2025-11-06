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
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
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
              <a target="_blank" href="{{get_setting('admission_banner_url')}}">
                <img class="hvr-bounce-in w-100 admission_img bounce_continue" src="{{ central_asset(uploaded_asset(get_setting('admission_banner'))) }}" alt="img" />
              </a>  
                
                <h4 class="robot_slab text_color pt-70">Admission Enquiry Form</h4>
                <!-- <p><b>AY - {{ now()->year }} - {{ now()->year + 1 }}</b></p> -->
                <!-- <p><b>{{get_setting('admission_year')}}</b></p> -->
                 <p class="foranyclass"><b>For AY 2025-2026 directly fill the form from respective school website.</b></p>
                <style>
                 .foranyclass
                 {
                  font-size: 16px;
    line-height: 22px;
    font-weight: 500;
                 } 
                </style>

              <!-- <div class="radio_buttons">
                <div class="">
                    <input type="radio" id="General-Enquiry" name="fav_language" value="HTML">
                    <label for="General-Enquiry">General Enquiry</label>
                </div>

                <div class="">
                    <input type="radio" id="Admission-Counseling" name="fav_language" value="CSS">
                    <label for="Admission-Counseling">Admission Counseling</label>
                </div>
              </div> -->

                @php
                    $currentYear = date('Y'); // e.g. 2025
                    $nextYear = $currentYear + 1;
                    $secondNextYear = $currentYear + 2;
                @endphp

                <!-- ✅ School Admission Form -->
                <form method="post" action="{{ route('form.submit') }}" id="admissionForm" onsubmit="protect_with_recaptcha_v3(this, 'admission')">
                  @include('frontend.components.form-alert')
                  @csrf
                  <input type="hidden" name="form_name" value="landing">
                  <input type="hidden" name="company_id" value="{{config('custom.school_id')}}">
                  <input type="hidden" name="school_short_name" value="">
                  <input type="hidden" name="class_id" value="">
                  <input type="hidden" name="enquiry_channel_id" value="">
                  <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px">

                  <div class="row">
                    <div class="col-md-12 mb-3 d-flex d-none">
                      <label  class="form-label d-block mb-2" style="margin-right: 20px;">Enquiry Type</label>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enquiry_type" id="enquiryGeneral" value="General" >
                        <label class="form-check-label" for="enquiryGeneral">General</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="enquiry_type" id="enquiryAdmission" value="Admission" checked>
                        <label class="form-check-label" for="enquiryAdmission">Admission</label>
                      </div>
                    </div>


                    <div class="col-md-12 col-12 mb-3">
                      <div class="form-outline">
                        <input type="text" class="form-control" name="child_first_name" placeholder="Child's First Name*" required>
                      </div>
                    </div>

                    <div class="col-md-6 col-6 mb-3">
                      <div class="form-outline">
                        <input type="text" class="form-control" name="child_middle_name" placeholder="Child's Middle Name (Optional)">
                      </div>
                    </div>

                    <div class="col-md-6 col-6 mb-3">
                      <div class="form-outline">
                        <input type="text" class="form-control" name="child_last_name" placeholder="Child's Last Name*" required>
                      </div>
                    </div>   


                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <select name="city" class="form-control" required>
                          <option value="">--- Select City ---</option>
                          <option value="Thane">Thane</option>
                          <option value="Navi Mumbai">Navi Mumbai</option>
                          <option value="Panvel">Panvel</option>
                        </select>
                      </div>
                    </div>

                    <!-- <div class="col-md-12 mb-3">
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
                    </div> -->

                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <select name="school" id="schoolDropdown" class="form-control" required>
                          <option value="">--- Select School Name ---</option>
                        </select>
                      </div>
                    </div>                    

                    <div class="col-md-12 mb-3">
                      <div class="form-outline">
                        <select name="standard" id="classDropdown" class="form-control" required>
                          <option value="">--- Select Standard ---</option>
                        </select>                      
                      </div>
                    </div>

                     <div class="col-md-12 col-12 mb-3">
                      <div class="form-outline">
                        <select name="academic_year" id="academic_year" class="form-control" required>
                            <option value="">--- Select Academic Year ---</option>
                            <option value="{{ $currentYear }}-{{ $nextYear }}">
                                {{ $currentYear }}-{{ $nextYear }}
                            </option>
                            <option value="{{ $nextYear }}-{{ $secondNextYear }}">
                                {{ $nextYear }}-{{ $secondNextYear }}
                            </option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6 col-6 mb-3">
                      <div class="form-outline">
                        <input type="text" class="form-control" name="name" placeholder="Parent's Name*" required>
                      </div>
                    </div>

                    <div class="col-md-6 col-6 mb-3">
                      <div class="form-outline">
                        <input type="text" 
                          class="form-control" 
                          name="phone" 
                          placeholder="Mobile Number*" 
                          required 
                          pattern="\d{10}" 
                          maxlength="10" 
                          title="Please enter a valid 10-digit mobile number">
                      </div>
                    </div>

                    <div class="col-md-12 col-12 mb-3">
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
           
          <!-- <div class="col-lg-6 pt55">
            <div class="locatio_box">
                <ul>
                    @foreach($schools as $school)
                    <li class="hvr-bounce-in loationtext_hover"><p><a target="_blank" href="{{$school->website}}"><i class="fa-solid fa-caret-right"></i>{{$school->name}}, {{$school->meta->where('meta_key', 'location')->first()->meta_value ?? ''}} </a></p></li>
                    @endforeach
                  </ul>
            </div>
          </div> -->

          <div class="col-lg-6 pt55" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
            <div class="locatio_box">
              <ul>
                @foreach($schools as $school)
                  @php
                    $location = optional($school->meta->where('meta_key', 'location')->first())->meta_value;
                    $boardName = optional($school->meta->where('meta_key', 'board_name')->first())->meta_value;
                  @endphp
                  <li class="loationtext_hover">
                    <p>
                      <!-- <a target="_blank" href="{{ $school->website }}">
                        <i class="fa-solid fa-caret-right"></i>
                        {{ $school->name }}
                        {{ $location ? ', ' . $location : '' }}
                        {{ $boardName ? ' (' . $boardName . ')' : '' }}
                      </a> -->

                      <a>
                        <i class="fa-solid fa-caret-right"></i>
                        {{ $school->name }}
                        {{ $location ? ', ' . $location : '' }}
                        {{ $boardName ? ' (' . $boardName . ')' : '' }}
                      </a>
                    </p>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
 
          
          <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
            <div class="text-start mb-md-4 mb-2 pt-4 ">
              
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
             <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
            <div class=" mb-md-4 mb-2 pt-md-0 pt-4">
              <h3 class="roboto text_color fw-normal">{{$about_title2}}</h3>
            </div>
            <p class="">{!! $about_description2 !!}</p>
          </div>
          
          <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
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


<section class="vission_mission pt-5 pb-5 position-relative">
  <div class="container">
    <div class="row justify-content-center">
       <div class="col-lg-4 position-relative mb-md-0 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
        <div class="vission_box position-relative">
          <h4 class="roboto text_color text-center">{{$vision_title}}</h4>
          <i class="fa-solid fa-quote-left left_icons"></i>
          <p class="text-center">{{$vision_description}}</p>
          <i class="fa-solid fa-quote-left right_icons"></i>
        </div>
      </div>
      
      <div class="col-lg-4 position-relative mb-md-0 mb-4" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
        <div class="vission_box position-relative">
          <h4 class="roboto text_color text-center">{{$mission_title}}</h4>
          <i class="fa-solid fa-quote-left left_icons"></i>
          <p class="text-center">{{$mission_description}}</p>
          <i class="fa-solid fa-quote-left right_icons"></i>
        </div>
      </div>

     

      <div class="col-lg-4 position-relative" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
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
              <div class="col-md-3 col-6 text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
                  <div class="stastic @if($loop->last) @else startimg @endif">
                      <div class="counter-value robot_slab" data-count="{{$landing_milestones['title'][$index]}}">1+</div>
                      <p class="robot_slab">{{$landing_milestones['description'][$index]}}</p>
                  </div>
              </div>
          @endforeach
      
      </div>
    </div>
  </section>
  @endif

<section class="gallery_section">
      <div class="pb-4 pt-5 pb-md-5 pt-md-5">
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
    
    
    <section class="scholar_section mt-md-5 mt-3 pb-5 career_section">
      <div class="container">
        <div class="row">
             <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
            <div class=" mb-md-4 mb-2 pt-md-0 pt-4">
              <h3 class="roboto text_color fw-normal">Career@New Horizon Scholars School</h3>
            </div>
            <p class="">We believe that our people are the foundation of our success. We’re always on the lookout for passionate, driven individuals who are eager to grow, innovate, and make an impact. Whether you're just starting out or bringing years of experience, we offer a dynamic work environment, opportunities for professional development, and a culture that values collaboration and creativity. Join us and be part of a team that's shaping the future.</p>
              
              <div class="text-left career_buttons"><a class="btn-2" style="" href="https://1nh.edusprint.in/1nh/HRManagement/JobOpening/JobOpeningIndexLanding" target="_blank" rel="noopener">Check-out latest openings</a></div>
              
              
          </div>
          
          <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
              <div class="position-relative">
            <div class="border_81 ">
               <div class="owl-carousel group_schools">
              @foreach($about_image as $id)
                <div class="item"><img class="hvr-bounce-in" src="{{ central_asset(uploaded_asset($id)) }}" alt=""></div>
              @endforeach
            </div>
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
                    <p class="centered-text roboto mb-0">{{$landing_updates['description'][$index]}}</p>
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
    <section class="quicklinks light_bgs d-none">
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
                  <p class="centered-text roboto mb-0">{{$landing_quicklinks['title'][$index]}}</p>
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

    // $('select[name="city"]').on('change', function () {
    //     const city = $(this).val();

    //     // Reset school dropdown
    //     $schoolSelect.val('');
    //     $allOptions.not(':first').hide(); // Hide all school options

    //     // Show specific schools based on selected city
    //     if (city === 'Thane') {
    //         $allOptions.filter(function () {
    //             return $(this).attr('data-id') === '2' || $(this).attr('data-id') === '3' || $(this).attr('data-id') === '4' || $(this).attr('data-id') === '5';
    //         }).show();
    //     } else if (city === 'Navi Mumbai') {
    //         $allOptions.filter(function () {
    //             return $(this).attr('data-id') === '6' || $(this).attr('data-id') === '7';
    //         }).show();
    //     } else if (city === 'Panvel') {
    //         $allOptions.filter(function () {
    //             return $(this).attr('data-id') === '8';
    //         }).show();
    //     }
    // });

    $('select[name="city"]').on('change', function () {
        const city = $(this).val();

        const $allOptions = $schoolSelect.find('option');

        // Reset school dropdown
        $schoolSelect.val('');
        $allOptions.not(':first').hide(); // Hide all school options

        // Show specific schools based on selected city
        if (city === 'Thane') {
            $allOptions.filter(function () {
                //console.log($(this).attr('data-short-name'));
                return $(this).attr('data-short-name') === 'nhssvl' || $(this).attr('data-short-name') === 'nhsst' || $(this).attr('data-short-name') === 'nhssr' || $(this).attr('data-short-name') === 'nhisr';
            }).show();
        } else if (city === 'Navi Mumbai') {
            $allOptions.filter(function () {
                //console.log($(this).attr('data-short-name'));
                return $(this).attr('data-short-name') === 'nhssa' || $(this).attr('data-short-name') === 'nhpsa' || $(this).attr('data-short-name') === 'nhpsapc' || $(this).attr('data-short-name') === 'nhpsas3';
            }).show();
        } else if (city === 'Panvel') {
            $allOptions.filter(function () {
                //console.log($(this).attr('data-short-name'));
                return $(this).attr('data-short-name') === 'nhpsp';
            }).show();
        }
    });

    // $schoolSelect.on('change', function () {
    //   const selectedDataId = $(this).find('option:selected').data('id'); // get data-id
    //   $('input[name="company_id"]').val(selectedDataId); // set it to the hidden input
    // });

});
</script>

<script>
  $(document).ready(function () {
    // Your JSON (can come from backend)
    var jsonData = <?php echo json_encode(get_school_export_data()); ?>; // pass JSON from controller
    //var jsonData = @json(get_school_export_data());

    var $schoolDropdown = $("#schoolDropdown");
    var $classDropdown = $("#classDropdown");

    // Load schools into dropdown
    var schools = jsonData.SchoolGroupList[0].SchoolList;
    $.each(schools, function (i, school) {
      $schoolDropdown.append(
        $("<option>")
          .val(school.SchoolName)
          .text(school.SchoolName)
          .attr("data-short-name", school.ShortName)
          .attr("data-classes", JSON.stringify(school.ClassList))
          .attr("data-enquiry-channels", JSON.stringify(school.EnquiryChannel))
      );
    });

    // On school change, load classes
    $schoolDropdown.on("change", function () {
      $classDropdown.empty().append('<option value="">--- Select Standard ---</option>');

      var selected = $(this).find(":selected");
      var classList = JSON.parse(selected.attr("data-classes") || "[]");
      var enquiryChannels = JSON.parse(selected.attr("data-enquiry-channels") || "[]");

      var websiteChannel = enquiryChannels.find(channel => channel.EnquiryChannelName === "WebSite");
      if (websiteChannel) {
        $('input[name="enquiry_channel_id"]').val(websiteChannel.EnquiryChannelID);
      }      

      $.each(classList, function (i, cls) {
        $classDropdown.append(
          $("<option>")
            .val(cls.ClassName)
            .text(cls.ClassName)
            .attr("data-masterid", cls.ClassMasterID)
        );
      });
    });

    // On school change → set hidden fields
    $('select[name="school"]').on('change', function () {
        const selected = $(this).find('option:selected');
        $('input[name="school_short_name"]').val(selected.data('short-name')); // school short name
    });

    // On class change → set hidden class_id
    $('select[name="standard"]').on('change', function () {
        const selected = $(this).find('option:selected');
        $('input[name="class_id"]').val(selected.data('masterid')); // class_id
    });

  });
</script>
@endsection