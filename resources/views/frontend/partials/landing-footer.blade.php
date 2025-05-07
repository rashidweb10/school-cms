<footer class="footer pt-5 pb-md-4">
      <div class="container">
        <div class="row">
          
          
          <div class="col-md-2 paddlft60 pt-md-0 pt-4">
            <div class="col-lg-12">
              <h4 class="roboto">E-Magazine</h4>
              <ul class="footer-menu">
                 <li>
                  <a href="#">> 2023 - 2024</a>
                </li>
                <li>
                  <a href="#">> 2024 - 2025</a>
                </li>
              </ul>
            </div>
          </div>
          
          
           <div class="col-md-4 pt-md-0 pt-4 pl50">
            <div class="col-lg-12">
              <h4 class="roboto">Conatct for Admission</h4>
             <p class="pb-0 mb-0">Phone No: {{get_setting('phone')}}</p>
             <p>Email: {{get_setting('email')}}</p>
            </div>
          </div>
          
          
          
          <div class="col-md-2">
            <div class="col-lg-12">
              <h4 Class="text-md-end roboto">Go Social</h4>
              <div class="d-flex gap-2 justify-content-md-end">
                <a target="_blank" href="{{get_setting('facebook_url')}}">
                  <img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/fb.png') }}">
                </a>
                <a target="_blank" href="{{get_setting('instagram_url')}}">
                  <img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/insta.png') }}">
                </a>
                <a target="_blank" href="{{get_setting('linkedin_url')}}">
                  <img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/in.png') }}">
                </a>
                <a target="_blank" href="{{get_setting('youtube_url')}}">
                  <img class="w-20 hvr-bounce-in" src="{{ asset('assets/frontend/img/yt.png') }}">
                </a>
              </div>
            </div>
          </div>
         
          <div class="col-md-4 pt-md-4 ">
               <div class="text-md-end footer_bottom_img">
                  <img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/edusprint-pro-logo.png') }}" />
              </div>
              <p class="qr_text">Scan this QR Code to Login/Access your Portal</p>
              <div class="d-flex justify-content-md-end qrcode_img">
                <img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/as-qr.jpg') }}">
                <img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/gps-qr.jpg') }}">
            </div>
            
            <div class="d-flex gap-3 justify-content-md-end">
              <a target="_blank" href="https://apps.apple.com/us/app/1newhorizon-app/id1312624582?platform=iphone"><img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/icon-apple-store.png') }}" alt="Apple Store" /></a>
              <a target="_blank" href="https://play.google.com/store/apps/details?id=in.newhorizon.cspl&pli=1"><img class="w80 hvr-bounce-in" src="{{ asset('assets/frontend/img/icon-play-store.png') }}" alt="Play Store" /></a>
            </div>
          </div>
          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-12 order-md-1 order-2">
            <p class="footer-privacy text-center pb-0 mb-0 pt-md-0 pt-3"> Copyright © {{date('Y')}} {{get_setting('name')}} </p>
          </div>
          <!-- <div class="col-md-6 order-md-2 order-1">
            <div class="footer-privacy text-end">
              <ul class="footer-menu">
                <li>
                  <a href="{{route('terms')}}">Terms & Conditions</a>
                </li>
                <li> | </li>
                <li>
                  <a href="{{route('privacy_policy')}}">Privacy Policy</a>
                </li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </footer>