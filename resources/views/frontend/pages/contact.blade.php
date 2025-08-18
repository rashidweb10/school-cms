@extends('frontend.layouts.app')

@section('meta.title', 'Contact Us')
@section('meta.description', 'Contact Us')

@section('content')

@include('frontend.partials.breadcrumb', ['title' => "Contact Us"])

<section class="embedcode pb-md-5" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
     <div class="container">
     <iframe src="{{get_setting('google_map')}}" height="20" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
     </div>
 </section>
    
    
    
     <section class=" pb-md-5 pb-4 mt-4 position-relative">
   <div class="container">
     <div class="row">
     <div class="col-12 col-lg-6" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
        <div class="row justify-content-xl-center">
          <div class="col-12 col-xl-11">
            <h3 class="robot_slab fw-normal text_color pb-md-4 pb-1 pt-md-0 pt-4">Reach Us</h3>
            <!--<p class="mb-5">We're always on the lookout to work with new clients. If you're interested in working with us, please get in touch in one of the following ways.</p>-->
            <div class="d-flex mb-md-2">
             
              <div>
                <h5 class="mb-1 fs16">Location Address:</h5>
                <p class="">{{get_setting('address')}}</p>
              </div>
            </div>
            <div class="d-flex mb-md-4 mb-3">
             
              <div>
                <h5 class="mb-1 fs16">Phone Number:</h5>
                <p class="mb-0">
                      <u>Admission Counselling:</u> <a href="tel:7738292703" class=" text-decoration-none" style="color:#000;">{{get_setting('phone')}}  </a>
                </p>
                 <p class="mb-0">
                      <u>Office:</u><a href="tel:022-25972729" class=" text-decoration-none" style="color:#000;"> {{get_setting('phone2')}}</a>
                </p>
              </div>
            </div>
            <div class="d-flex">
            
              <div>
                <h5 class="mb-1 fs16">Email:</h5>
                <p class="mb-0">
                  <u>Admission Counselling:</u> <a class="text-decoration-none text-black" style="color:#000;" href="mailto:{{get_setting('email')}}">{{get_setting('email')}}</a>
                </p>               
                <p class="mb-0">
                  <u>General Enquiry:</u> <a class="text-decoration-none text-black" style="color:#000;" href="mailto:{{get_setting('email2')}}">{{get_setting('email2')}}</a>
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-8 col-xl-6" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
          <h3 class="robot_slab fw-normal text_color pb-md-4 pb-3 pt-md-0 pt-4">Write Us</h3>
        <div class="card rounded-3">
        
          <div class="card-body p-4 p-md-4">

          <!-- ✅ Contact Form -->
            <form method="post" action="{{route('form.submit')}}" id="contactForm" onsubmit="protect_with_recaptcha_v3(this, 'contact')">
               @include('frontend.components.form-alert')
               @csrf
              <input type="hidden" name="form_name" value="contact">

              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="name" class="form-control" placeholder="Name" required />
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="email" name="email" class="form-control" placeholder="Email ID" required />
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="phone" class="form-control" placeholder="Mobile Number" required />
                  </div>
                </div>

                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text" name="subject" class="form-control" placeholder="Subject" required />
                  </div>
                </div>

                <div class="col-md-12 mb-4">
                  <div class="form-outline">
                    <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                  </div>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-success btn-lg mb-1 submit_bittons">Submit</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
      
     </div>
   </div>
 </section>

@endsection