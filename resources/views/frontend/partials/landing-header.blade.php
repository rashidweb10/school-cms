    <!--header section start-->
    <div class="top_position">
    <div class="header_section_top">
      <div Class="container">
        <div Class="row">
          <div class="col-md-2">
              
          </div>
          
          <div class="col-md-4">
              <p Class="mrg_35 robot_slab">CBSE Affiliation No. {{get_setting('affiliation_no')}}</p>
          </div>
          
          <div class="col-md-6">
              
          </div>
          
        </div>
      </div>
    </div>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-md-1 col-12">
            <div class="logo_width">
              <a class="navbar-brand" href="{{ route('home') }}">
                <img class="w-150" src="{{ central_asset(uploaded_asset(get_setting('logo'))) }}" />
              </a>
            </div>
          </div>
          <div class="col-md-4 col-12">
            <h4 class="header_text roboto">{{get_setting('name')}}</h4>
          </div>
          <div class="col-md-7 col-12">
            <p class="text-end robot_slab admiistion_test d-none d-lg-block">FOR ADMISSION’S CALL: {{get_setting('phone')}}</p>
          </div>
        </div>
      </div>
    </header>
    </div>