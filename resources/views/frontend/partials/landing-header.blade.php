    <!--header section start-->
    <div class="top_position">
    <div class="header_section_top">
      <div Class="container">
        <div Class="row">
          <div class="col-md-2">
              
          </div>
          
          <div class="col-md-4">
              <p Class="pt-md-2 mrg_35 robot_slab">@if( get_setting('affiliation_no') ) CBSE Affiliation No. {{get_setting('affiliation_no')}} @endif</p>
          </div>
          
<div class="col-md-6 text-end">
               <p class="pt-md-3 mb-0 robot_slab text-right">30 years of excellence in education</p>
          </div>
          
        </div>
      </div>
    </div>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-1 col-3">
            <div class="logo_width">
              <a class="navbar-brand" href="{{ route('home') }}">
                <img class="w-150" src="{{ central_asset(uploaded_asset(get_setting('logo'))) }}" />
              </a>
            </div>
          </div>
          <div class="col-md-4 col-9">
            <h4 class="header_text roboto">{{get_setting('name')}}</h4>
          </div>
          <div class="col-md-7 col-12">
            <!-- <p class="text-end robot_slab admiistion_test d-none d-lg-block">FOR ADMISSION’S CALL: {{get_setting('phone')}}</p> -->
          </div>
        </div>
      </div>
    </header>
    </div>