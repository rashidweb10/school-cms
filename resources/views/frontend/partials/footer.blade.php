<footer class="footer pt-5 pb-3">
  <div class="container">
    <div class="row">
      <!-- Quick Links -->
      <div class="col-md-3">
        <div class="col-lg-12">
          <h4 class="roboto">Quick Links</h4>
          <div class="d-flex gap-5">
            <ul class="footer-menu">
              <li><a href="{{route('home')}}"> Home</a></li>
              <li><a href="{{route('about')}}"> About Us</a></li>
              @if(config('custom.school_id') != 9)
              <li><a href="{{route('events')}}"> Events</a></li>
              <li><a href="{{route('curriculum')}}"> Curriculum</a></li>
              <li><a href="{{route('alumini')}}"> Alumni</a></li>
              @endif
              <li>
                  <a target="_blank" href="{{ get_setting('brochure_url') ?: central_asset(uploaded_asset(get_setting('brochure_attachment', '#'))) }}">
                      BROCHURE
                  </a>
              </li>              
            </ul>
            <ul class="footer-menu">
              
              <li><a href="{{route('admission')}}"> Admission</a></li>

              @if(config('custom.school_id') != 9)
              <li><a href="{{route('campus')}}"> Campus</a></li>
              <li><a href="{{route('results')}}"> Results</a></li>
              @endif
              <li><a href="{{route('awards')}}"> Awards</a></li>

              <li><a href="{{route('contact')}}"> Contact Us</a></li>
              <li><a target="_blank" href="https://1nh.edusprint.in/1nh/Security"> 1NH LOGIN</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Newsletter & Magazine -->
      <div class="col-md-3 paddlft60 pt-3 pt-md-0">
        <div class="col-lg-12">
          <h4 class="roboto">Newsletter & Magazine</h4>
          @php 
            $newsletter = DB::table('pages')->where('is_active', 1)
              ->where('layout', 'newsletter')
              ->where('company_id', config('custom.school_id'))
              ->orderBy('id', 'desc')
              ->get();                                    
          @endphp 
          @if(config('custom.school_id') != 9)
          @if($newsletter->isNotEmpty())          
          <ul class="footer-menu">
            @foreach($newsletter as $item)
              <li><a href="{{ url($item->slug) }}">{{ $item->title }}</a></li>
            @endforeach
          </ul>
          @endif
          @endif
        </div>
      </div>

      <!-- Admission Counselling -->
      <div class="col-md-3 ps-md-3 pt-3 pt-md-0 pe-0">
        <div class="col-lg-12">
          <h4 class="roboto">Admission Counselling</h4>
          <p class="pb-0 mb-0">Phone No: {{get_setting('phone')}}</p>
          <p>Email: {{get_setting('email')}}</p>
        </div>
      </div>

      <!-- Go Social -->
      <div class="col-md-3">
         <div class="text-md-end footer_bottom_img">
          <img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/edusprint-pro-logo.png') }}" alt="EduSprint Pro Logo" />
        </div>

        <p class="qr_text">Scan this QR Code to Login/Access your Portal</p>
        <div class="d-flex justify-content-md-end qrcode_img">
          <img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/as-qr.jpg') }}" alt="QR Code 1" />
          <img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/gps-qr.jpg') }}" alt="QR Code 2" />
        </div>
        <div class="d-flex gap-3 justify-content-md-end">
          <a target="_blank" href="https://apps.apple.com/us/app/1newhorizon-app/id1312624582?platform=iphone"><img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/icon-apple-store.png') }}" alt="Apple Store" /></a>
          <a target="_blank" href="https://play.google.com/store/apps/details?id=in.newhorizon.cspl&pli=1"><img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/icon-play-store.png') }}" alt="Play Store" /></a>
        </div>
      </div>

      <!-- Address & QR Codes -->
      <div class="col-md-6 pt-md-0 pt-3 margintop-18">
        <p class="footer-copyright mb-0">{{get_setting('address')}}</p>
      </div>

      <div class="col-md-6 pt-md-0 pt-3 ps-md-4 margintop-23">
        <h4 class="roboto">Go Social</h4>
          <div class="d-flex gap-2">
            <a target="_blank" href="{{get_setting('facebook_url')}}"><img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/fb.png') }}" alt="Facebook"></a>
            <a target="_blank" href="{{get_setting('instagram_url')}}"><img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/insta.png') }}" alt="Instagram"></a>
            <a target="_blank" href="{{get_setting('linkedin_url')}}"><img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/in.png') }}" alt="LinkedIn"></a>
            <a target="_blank" href="{{get_setting('youtube_url')}}"><img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/yt.png') }}" alt="YouTube"></a>
          </div>
      </div>



      <!-- Footer Privacy & Links -->
      <div class="col-md-12">
        <hr>
      </div>
      <div class="col-md-6 order-md-1 order-2">
        <p class="footer-privacy text-start pb-0 mb-0 pt-md-0 pt-3">Copyright © {{date('Y')}} {{get_setting('name')}}</p>
      </div>
      <div class="col-md-6 order-md-2 order-1">
        <div class="footer-privacy text-end">
          <ul class="footer-menu">
            <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
            <li> | </li>
            <li><a href="{{route('privacy_policy')}}">Privacy Policy</a></li>
            <li> | </li>
            <li><a href="{{route('disclosure')}}">Support Mandatory Public Disclosure</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>


 <div class="whatsapp">
     <a href="https://api.whatsapp.com/send?phone={{get_setting('whatsapp_number')}}" target="_blank" title="Contact Us">
         <img class="hvr-bounce-in" src="{{ asset('assets/frontend/img/whatsap.png') }}" style="width: 46px;" title="Contact Us">
     </a>
 </div>