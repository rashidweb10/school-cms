<!-- Header Section Start -->
<div class="top_position">
    <div class="header_section_top">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <p class="mrg_35 robot_slab">CBSE Affiliation No. {{get_setting('affiliation_no')}}</p>
                </div>
                <div class="col-md-3">
                    <p class="mrg_35 robot_slab text-center">FOR ADMISSION’S CALL: {{get_setting('phone')}}</p>
                </div>
                <div class="col-md-4">
                    <p class="text-md-end robot_slab">
                        <a href="{{route('disclosure')}}" class="pe-3 discloser_link">MANDATORY PUBLIC DISCLOSURE</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-1 col-6 order-md-1 order-2">
                    <div class="logo_width">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img class="w-150" src="{{ central_asset(uploaded_asset(get_setting('logo'))) }}" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4 col-12 order-md-2 order-1">
                    <h4 class="header_text roboto mt-md-0 mt-2">{{get_setting('name')}}</h4>
                </div>
                <div class="col-md-4 col-6 order-md-2 order-3 d-lg-none d-block">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="col-md-7 col-3 order-md-3 d-lg-block d-none">
                    <div class="d-flex browser_link">
                        <ul class="d-flex ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a target="_blank" class="nav-link robot_slab" href="{{ central_asset(uploaded_asset(get_setting('brochure_attachment', '#'))) }}">
                                    <img src="{{ asset('assets/frontend/img/icon-brochure-w.png') }}"> BROCHURE
                                </a>
                            </li>
                            <li class="nav-item">
                                <a target="_blank" class="nav-link robot_slab"
                                    href="https://1nh.edusprint.in/1nh/Security">
                                    <img src="{{ asset('assets/frontend/img/icon-nhlogin-w.png') }}"> NH LOGIN
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
                            <div class="d-flex">
                                <ul class="navbar-nav ms-md-auto mb-2 mb-lg-0 position_tops">
                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('home')}}">
                                            <img src="{{ asset('assets/frontend/img/icon-home-w.png') }}"> HOME
                                        </a>
                                    </li>

                                    <ul class="menu nav-item">
                                        <li>
                                            <a href="{{route('about')}}" class="nav-link robot_slab">
                                                <img src="{{ asset('assets/frontend/img/icon-nh-w.png') }}"> ABOUT US
                                            </a>
                                            <ul class="submenu p-2">
                                                <li><a href="{{route('why-we')}}"><img src="{{ asset('assets/frontend/img/qu.png') }}"> Why We</a></li>
                                                <li><a href="{{route('roadmap')}}"><img src="{{ asset('assets/frontend/img/road-maps.png') }}"> Road Map</a></li>
                                                <li><a href="{{route('curriculum')}}"><img src="{{ asset('assets/frontend/img/g_lines.png') }}"> Curriculum Guidelines</a></li>
                                                <li>
                                                    <a href="#"><img src="{{ asset('assets/frontend/img/achivmentss.png') }}"> Achievements</a>
                                                    @php 
                                                    $achivements = DB::table('pages')->where('is_active', 1)
                                                        ->where('layout', 'achivements')
                                                        ->where('company_id', config('custom.school_id'))
                                                        ->orderBy('id', 'desc')
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
                                                <li><a href="{{route('career')}}"><img src="{{ asset('assets/frontend/img/icon-nh-w.png') }}"> Careers</a></li>
                                            </ul>
                                        </li>
                                    </ul>

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
                                    @php 
                                    $circulars = DB::table('pages')->where('is_active', 1)
                                        ->where('layout', 'circulars')
                                        ->where('company_id', config('custom.school_id'))
                                        ->orderBy('id', 'desc')
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

                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('results')}}">
                                            <img src="{{ asset('assets/frontend/img/icon-events-w.png') }}"> RESULTS
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link robot_slab" aria-current="page" href="{{route('alumini')}}">
                                            <img src="{{ asset('assets/frontend/img/icon-events-w.png') }}"> ALUMNI
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