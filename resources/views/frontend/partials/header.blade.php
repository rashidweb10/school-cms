<!-- Header Section Start -->
<div class="top_position">
    <div class="header_section_top">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <p class="mrg_35 robot_slab">{{get_setting('board_name')}} @if(!empty(get_setting('affiliation_no'))) Affiliation No. {{get_setting('affiliation_no')}} @endif</p>
                </div>
                <div class="col-md-3">
                    <p class="mrg_35 robot_slab text-center mobile_nones">FOR ADMISSIONS CALL: {{get_setting('phone')}}</p>
                </div>
                <div class="col-md-3">
                    <p class="text-md-end robot_slab mobile_nones">
                        <a href="{{route('disclosure')}}" class="pe-3 discloser_link">MANDATORY PUBLIC DISCLOSURE</a>
                    </p>
                </div>


<div class="col-md-1">
 <div class="nh-menu-toggle" id="nhMenuToggle" onclick="nhToggleMenu()">
    <i class="fa-solid fa-bars-staggered"></i>
    <i class="fa-solid fa-xmark"></i>
  </div>
  </div>

  <div id="nhOverlay" class="nh-overlay">
    <nav>
      <ul>
        <li style="grid-column: 1 / -1; justify-content: center;">
           <a href="https://newhorizonschools.org/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Group of Schools</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/2025/04/Wydv1rGSQipYjXabHBdwhMxDpuPFYjpnzhv3A03i.jpg');"></div>
        </li>

        <li>
           <a href="https://www.nhssthane.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Scholars School, Kavesar</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/2025/07/erwiiqf2HoXtZoS39uageNKNsChEr0SWodaTrARK.jpg');"></div>
        </li>
        <li>
           <a href="https://www.nhssvasantlawns.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Scholars School, Vasant Lawns</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/s3/2025/09/vRxyME6FWIOazGm5qEMZ8kCpg0w8bIRs8L4ZXeBa.jpg');"></div>
        </li>
        <li>
         <a href="https://www.nhssrodas.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Scholar School, Kolshet</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/s4/2025/09/8Sx76yToVV54h4OISu7DBSS0jdYu2xA11hyZnK9D.jpg');"></div>
        </li>
        <li>
          <a href="https://nhssairoli.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Scholars School, Airoli</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/s5/2025/08/93LbTpUpuyXusYH1jQpYwMY7KctU77vqykSehYig.jpg');"></div>
        </li>
        <li>
        <a href="https://nhpsairoli.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Public School, Airoli Sector 19</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/s6/2025/09/dvJejoYPIYdmTd8DJkFfvyp5XkfgERTt6r7AhV3Y.jpg');"></div>
        </li>
        <li>
          <a href="https://www.nhisrodas.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon International School, Rodas</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/s7/2025/09/OArbKTf1ktYlkL0KAgbRPgdwZp7xChq9c0tYdOA7.jpg');"></div>
        </li>
        <li>
          <a href="https://www.nhpspanvel.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Public School, New Panvel</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/s8/2025/09/H5Lde8ixPZUyUrUVSmzlja10uvkPWFvtHix3bEGJ.jpg');"></div>
        </li>

        <li>
       <a href="https://nhpsairolisector3.com/" target="_blank"><i class="fa-solid fa-caret-right"></i> New Horizon Public School, Airoli Sector 3</a>
          <div class="nh-hover-image" style="background-image: url('https://www.newhorizonschools.org/storage/uploads/a/2025/09/6aUGAmguhHEMwok8FcXotnt9EbdzjOK87yr8dWRE.jpg');"></div>
        </li>

      </ul>
    </nav>
  </div>


            </div>
        </div>
    </div>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-3 order-md-1 order-2">
                    <div class="logo_width">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img class="w-150" src="{{ central_asset(uploaded_asset(get_setting('logo'))) }}" title="{{get_setting('name')}}" alt="{{get_setting('name')}}"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-5 col-8 order-md-2 order-3">
                    <h4 class="header_text roboto mt-md-0 mt-2">{{get_setting('name')}}</h4>
                </div>
                <div class="col-md-4 col-1 order-md-2 order-3 d-lg-none d-block">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-md-6 col-3 order-md-3 d-lg-block d-none">
                    <div class="d-flex browser_link">
                        <ul class="d-flex ms-auto mb-2 mb-lg-0">
                            

                            <li class="nav-item">
                                <a class="nav-link robot_slab addmissionactive {{ request()->routeIs('admission') ? 'active' : '' }}"
                                href="{{ route('admission') }}"
                                >
                                    <img src="{{ asset('assets/frontend/img/student.png') }}" 
                                        >
                                    ADMISSION
                                </a>
                            </li>
                            
                            <!-- Old Code-->
                            <!--
                            <li class="nav-item">
                                @if(get_setting('brochure_attachment'))
                                <a target="_blank" class="nav-link robot_slab" href="{{ central_asset(uploaded_asset(get_setting('brochure_attachment', '#'))) }}">
                                    <img src="{{ asset('assets/frontend/img/icon-brochure-w.png') }}"> BROCHURE
                                </a>
                                @endif
                            </li>
                            -->
                            
                            
                             <li class="nav-item">

                                @if(!empty(get_setting('brochure_url')))
                                    <a target="_blank" class="nav-link robot_slab" href="{{ get_setting('brochure_url') }}">
                                        <img src="{{ asset('assets/frontend/img/icon-brochure-w.png') }}"> BROCHURE
                                    </a>   
                                @elseif(!empty(get_setting('brochure_attachment')))
                                <a target="_blank" class="nav-link robot_slab" href="{{ central_asset(uploaded_asset(get_setting('brochure_attachment', '#'))) }}">
                                    <img src="{{ asset('assets/frontend/img/icon-brochure-w.png') }}"> BROCHURE
                                </a>                                                                 
                                @endif
                            </li>

               
                            <li class="nav-item">
                                <a target="_blank" class="nav-link robot_slab"
                                    href="https://1nh.edusprint.in/1nh/Security">
                                    <img src="{{ asset('assets/frontend/img/icon-nhlogin-w.png') }}"> 1NH
                                </a>
                            </li>
                                                     
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="header_section">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 mt-1 col-12 yellow_clrs">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                            <ul class="navbar-nav mb-2 mb-lg-0"></ul>
                            <div class="d-md-flex">
                                <ul class="navbar-nav ms-md-auto mb-2 mb-lg-0 position_tops">
                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('home')}}">
                                            <img src="{{ asset('assets/frontend/img/icon-home-w.png') }}"> HOME
                                        </a>
                                    </li>     

                                    <ul class="menu nav-item">
                                        <li>
                                            <a href="{{route('about')}}" class="nav-link robot_slab">
                                                <img src="{{ asset('assets/frontend/img/info.png') }}"> ABOUT US
                                            </a>
                                            <ul class="submenu p-2">
                                                <li><a href="{{route('why-we')}}"><img src="{{ asset('assets/frontend/img/qu.png') }}"> Why New Horizon</a></li>
                                                <li><a href="{{route('roadmap')}}"><img src="{{ asset('assets/frontend/img/road-maps.png') }}"> Road Map</a></li>

                                                @if(config('custom.school_id') != 9)
                                                <li><a href="{{route('awards')}}"><img src="{{ asset('assets/frontend/img/achivmentss.png') }}"> Awards</a></li>
                                                @endif

                                                @php
                                                    $curriculum_title = optional(
                                                        DB::table('pages')
                                                            ->where('is_active', 1)
                                                            ->where('slug', 'curriculum')
                                                            ->where('company_id', config('custom.school_id'))
                                                            ->first()
                                                    )->title ?? '';
                                                @endphp
                                                @if($curriculum_title)
                                                <li><a href="{{route('curriculum')}}"><img src="{{ asset('assets/frontend/img/g_lines.png') }}">{{$curriculum_title}}</a></li>
                                                @endif

                                                @if(config('custom.school_id') != 9)
                                                <li>
                                                    <a href="#"><img src="{{ asset('assets/frontend/img/achivmentss.png') }}"> Achievements</a>
                                                    @php 
                                                    $achivements = DB::table('pages')->where('is_active', 1)
                                                        ->where('layout', 'achivements')
                                                        ->where('company_id', config('custom.school_id'))
                                                        ->orderBy('title', 'desc')
                                                        ->get();                                    
                                                    @endphp                                                    
                                                    
                                                    @if($achivements->isNotEmpty())
                                                    <ul class="submenu">
                                                        @foreach($achivements as $item)
                                                            <li><a href="{{ url($item->slug) }}">{{ $item->title }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @endif
                                                <!-- <li><a href="{{route('career')}}"><img src="{{ asset('assets/frontend/img/icon-nh-w.png') }}"> Careers</a></li> -->
                                            </ul>
                                        </li>
                                    </ul>

                                    @if(config('custom.school_id') != 9)
                                    <ul class="menu nav-item">
                                        <li>
                                            <a href="#" class="nav-link robot_slab">
                                                <img src="{{ asset('assets/frontend/img/glry.png') }}"> GALLERY
                                            </a>
                                            <ul class="submenu">
                                                <li><a href="{{route('events')}}"><img src="{{ asset('assets/frontend/img/icon-nh-w.png') }}"> Events</a></li>
                                                <li><a href="{{route('campus')}}"><img src="{{ asset('assets/frontend/img/camp.png') }}"> Campus</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endif

                                    @if(config('custom.school_id') != 9)
                                    @php 
                                    $circulars = DB::table('pages')->where('is_active', 1)
                                        ->where('layout', 'circulars')
                                        ->where('company_id', config('custom.school_id'))
                                        ->orderBy('title', 'desc')
                                        ->get();                                    
                                    @endphp
                                    <ul class="menu nav-item">
                                        <li>
                                        <a href="javascript:void(0)" class="nav-link robot_slab">
                                            <img src="{{ asset('assets/frontend/img/icon-nh-w.png') }}"> CIRCULARS
                                        </a>
                                        @if($circulars->isNotEmpty())
                                        <ul class="submenu">
                                            @foreach($circulars as $item)
                                                <li>
                                                    <a href="{{ url($item->slug) }}">
                                                        <img src="{{ asset('assets/frontend/img/right_a.png') }}">
                                                        {{ $item->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                        </li>
                                    </ul>
                                    @endif
                                    
                                    @if(config('custom.school_id') != 9)
                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('results')}}">
                                            <img src="{{ asset('assets/frontend/img/icon-events-w.png') }}"> RESULTS
                                        </a>
                                    </li>
                                    @endif

                                    @if(config('custom.school_id') != 9)
                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('alumini')}}">
                                            <img src="{{ asset('assets/frontend/img/student.png') }}"> ALUMNI
                                        </a>
                                    </li>
                                    @endif 

                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('career')}}">
                                            <img src="{{ asset('assets/frontend/img/icon-nh-w.png') }}"> CAREERS
                                        </a>
                                    </li>                                    
                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('contact')}}">
                                            <img src="{{ asset('assets/frontend/img/icon-contact-w.png') }}"> CONTACT US
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>