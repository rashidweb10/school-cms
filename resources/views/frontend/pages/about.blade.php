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
      <div class="col-lg-12 pt-md-0 pt-5">
      <p>{!! $about_description !!}</p>
      </div>
    </div>
  </div>
</section>




<section class="about_tabs pb-md-5 pb-4 dark_org_color mt-4 position-relative">
  <div class="container">
    <div class="row">
      <div class="scrollable-tabs">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="president_tabs1" data-bs-toggle="pill" data-bs-target="#founder_tabs" type="button" role="tab" aria-controls="founder_tabs" aria-selected="true">Founder's Desk</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="president_tabs_1" data-bs-toggle="pill" data-bs-target="#president_tabs" type="button" role="tab" aria-controls="president_tabs" aria-selected="false">President's Desk</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="principal_tabs1" data-bs-toggle="pill" data-bs-target="#principal_tabs" type="button" role="tab" aria-controls="principal_tabs" aria-selected="false">Principal's Desk</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="management_tabs1" data-bs-toggle="pill" data-bs-target="#management_tabs" type="button" role="tab" aria-controls="management_tabs" aria-selected="false">Management</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="team_tabs1" data-bs-toggle="pill" data-bs-target="#team_tabs" type="button" role="tab" aria-controls="team_tabs" aria-selected="false">Our Team</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="leadership_tabs1" data-bs-toggle="pill" data-bs-target="#leadership_tabs" type="button" role="tab" aria-controls="leadership_tabs" aria-selected="false"> Leadership</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="school_info_tab1" data-bs-toggle="pill" data-bs-target="#school_info" type="button" role="tab" aria-controls="school_info" aria-selected="false"> School Information</button>
          </li>
        </ul>
      </div>


      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="founder_tabs" role="tabpanel" aria-labelledby="president_tabs1">
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12 col-6 pb-3">
                  <div class="founder_box">
                    <div class="founder_img position-relative">
                      <img src="img/team_image_2.jpg" />
                    </div>
                    <h4 class="fs-6 text-center pt-3 mb-0">Dr. Subir Kumar Banerjee</h4>
                    <p class="text-center">Founder Trustee</p>
                  </div>
                </div>
                <div class="col-md-12 col-6">
                  <div class="founder_box">
                    <div class="founder_img position-relative">
                      <img src="img/team_image_1.jpg" />
                    </div>
                    <h4 class="fs-6 text-center pt-3 mb-0">Mrs. Suvra Banerjee</h4>
                    <p class="text-center">Founder Trustee</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 pl30">
              <h4 class="roboto text_color text-left fw-normal">Achieving Excellence through the Education</h4>
              <p>Education within the New Horizon Group of Schools is geared toward nurturing children, furnishing them with a robust foundation, and imparting valuable skills for an ever-evolving world. Our core principles revolve around achievement, respect, and community.</p>
              <p>At the New Horizon Group of Schools, our primary focus is on education, excellence, respect, and empathy. Our devoted faculty members simplify the learning process, underscore the importance of ethical values, and provide the necessary resources for comprehensive development.</p>
              <p>Our track record of accomplishments spanning the past two decades has elevated the New Horizon Group of Schools to a highly sought-after educational institution in Central Mumbai, Airoli, Thane, and Raigad. We remain steadfastly committed to continuous improvement, ensuring that our students are well-prepared for the challenges of the 21st century. We wholeheartedly invite you to join us on our journey of 'Explore, Empower & Excel as we dedicate ourselves to delivering top-quality education. </p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="president_tabs" role="tabpanel" aria-labelledby="president_tabs_1">
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="founder_box">
                    <div class="founder_img position-relative">
                      <img src="img/rituparma.jpg" />
                    </div>
                    <h4 class="fs-6 text-center pt-3 mb-0">Dr. Rituparna Banerjee</h4>
                    <p class="text-center">Chairperson</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">

              <p>I am honoured to extend my warmest greetings to you as the President of New Horizon Education Society. Our schools have long been a beacon of educational excellence and community engagement, and it is my privilege to share with you our vision and commitment.</p>
              <p>At New Horizon Schools, we believe in the transformative power of education. Our dedicated faculty and staff are committed to providing students with an environment that nurtures their intellectual, social, and personal growth. We understand that every student is unique, and we strive to cultivate an atmosphere where each individual can flourish.</p>
              <p>Our mission to Excel is keen to equip students with the knowledge, skills, and values they need to succeed in a rapidly changing world. We offer a comprehensive curriculum that not only emphasizes academic rigor but also fosters creativity, critical thinking, and problem-solving abilities. We believe in preparing students for the challenges and opportunities of the future.</p>
              <p>What sets New Horizon School apart is our unwavering commitment to creating a sense of community. We believe in the power of unity and diversity. Our school is a place where students from diverse backgrounds come together to learn from one another, celebrate their differences, and build lifelong friendships. We are not just a school; we are a family.</p>
              <p>As we look to the future, we are dedicated to continuous improvement. We are invested in providing state-of-the-art facilities and resources that support our students' growth. We also recognize the importance of instilling values such as empathy, respect, and kindness in our students. These qualities are at the heart of our educational philosophy.</p>
              <p>I want to express my gratitude to the parents, guardians, and supporters who entrust us with the education of their children. Your partnership is invaluable, and we are committed to working together to ensure our students' success.</p>
              <p>In closing, I invite you to explore New Horizon Schools further and discover the opportunities we offer. Whether you are a prospective student, a parent, a community member, or a supporter of education, we welcome you to join us on this remarkable journey.</p>
              <p>Thank you for being a part of the New Horizon community. Together, we will continue to inspire, educate, and shape the leaders of tomorrow.</p>
              <p>Warm regards,</p>
              <p>Dr. Rituparna Banerjee</p>
              <p>President, New Horizon Education Society.</p>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="principal_tabs" role="tabpanel" aria-labelledby="principal_tabs1">
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <div class="founder_box">
                    <div class="founder_img position-relative">
                      <img src="img/jyotinair.jpg" />
                    </div>
                    <h4 class="fs-6 text-center pt-3 mb-0">Dr. Jyoti Nair</h4>
                    <p class="text-center">Regional Director</p>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-md-8">
              <p>New Horizon Scholars School in Thane has risen as a symbol of educational brilliance. Our institution is dedicated to fostering excellence in character, leadership, extracurricular activities, and academics.</p>
              <p>With a committed team of educators, we provide students with more than just book knowledge. We emphasize emotional growth, self-esteem, and critical thinking through experiential learning. Our goal is to empower students to become confident, articulate, and enlightened global citizens. We instill strong values and equip them to face the challenges of our ever-changing world.</p>
              <p>We encourage innovation and exploration in both academic and non-academic realms through child-centric, project-based learning. Alongside rigorous academics, we focus on holistic development, including the arts, music, sports, and more.</p>
              <p>At New Horizon, we continually enhance our teaching methods to make learning seamless and impactful. Our mission is to nurture conscientious, intelligent, and confident leaders who shine as beacons of excellence in an empowered and enlightened India.</p>

            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="management_tabs" role="tabpanel" aria-labelledby="management_tabs1">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/management_1.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Prasha Suresh </h5>
                <p>HR Head</p>
              </div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/management_2.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Prasha Suresh </h5>
                <p>HR Head</p>
              </div>
            </div>
          </div>

          <div class="row py-4 align-items-center justify-content-center">
            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/management_3.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Prasha Suresh </h5>
                <p>HR Head</p>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/management_4.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Prasha Suresh </h5>
                <p>HR Head</p>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/management_5.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Prasha Suresh </h5>
                <p>HR Head</p>
              </div>
            </div>
          </div>

          <div class="row align-items-center justify-content-center">
            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/management_6.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Prasha Suresh </h5>
                <p>HR Head</p>
              </div>
            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="leadership_tabs" role="tabpanel" aria-labelledby="leadership_tabs1">
          <div class="row">

            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/Leadership_img-1.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Prasha Suresh </h5>
                <p>HR Head</p>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/Leadership_img-2.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Namrata Singh </h5>
                <p>Chief Academic Officer</p>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/Leadership_img-3.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Sanchita Debnath</h5>
                <p>Admin Head</p>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/Leadership_img-4.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Sujata Agarwal </h5>
                <p>Academic Consultant (PGT)</p>
              </div>
            </div>

            <div class="col-md-3 col-lg-3 col-sm-1">
              <div class="leader_mamber_img">
                <img src="./img/Leadership_img-5.jpg" class="img-fluid" alt="">
              </div>
              <div class="leader_mamber_dtl text-center">
                <h5 class="fs-6 text-center pt-3 mb-0"> Abha Sharma</h5>
                <p>Academic Consultant (PPRT)</p>
              </div>
            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="team_tabs" role="tabpanel" aria-labelledby="team_tabs1">
          <div class="row">


            <div class="row d-flex">
              <div class=" col-12 col-md-4 p-3">
                <div class="lightbox_img_wrap">
                  <img class="lightbox-enabled" src="./img/team_img.jpg"
                    data-imgsrc="./img/team_img.jpg">
                </div>
              </div>
              <div class=" col-12 col-md-4 p-3">
                <div class="lightbox_img_wrap">
                  <img class="lightbox-enabled" src="./img/team_img.jpg"
                    data-imgsrc="./img/team_img.jpg">
                </div>
              </div>
              <div class=" col-12 col-md-4 p-3">
                <div class="lightbox_img_wrap">
                  <img class="lightbox-enabled" src="./img/team_img.jpg"
                    data-imgsrc="./img/team_img.jpg">
                </div>
              </div>
              <div class=" col-12 col-md-4 p-3">
                <div class="lightbox_img_wrap">
                  <img class="lightbox-enabled" src="./img/team_img.jpg"
                    data-imgsrc="./img/team_img.jpg">
                </div>
              </div>
              <div class=" col-12 col-md-4 p-3">
                <div class="lightbox_img_wrap">
                  <img class="lightbox-enabled" src="./img/team_img.jpg"
                    data-imgsrc="./img/team_img.jpg">
                </div>
              </div>
            </div>


            <section class="lightbox-container">
              <span class="material-symbols-outlined material-icons lightbox-btn left" id="left">
                <img src="./img/left-ar.png" alt="">
              </span>
              <span class="material-symbols-outlined material-icons lightbox-btn right" id="right">
                <img src="./img/right-ar.png" alt="">
              </span>
              <span id="close" class="close material-icons material-symbols-outlined">
                <img src="./img/close-ico.png" alt="">
              </span>
              <div class="lightbox-image-wrapper">
                <img alt="lightboximage" class="lightbox-image">
              </div>
            </section>
          </div>
        </div>



        <div class="tab-pane fade" id="school_info" role="tabpanel" aria-labelledby="school_info_tab1">
          <div class="row">
            <p>{!! $about_school_description !!}</p>
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
