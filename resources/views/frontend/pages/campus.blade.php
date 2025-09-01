@extends('frontend.layouts.app')

@section('meta.title', "Campus - ". get_setting('name'))
@section('meta.description', "Campus - ".get_setting('name'))

@section('content')

<style>
    .gallery img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 4px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }
</style>




<style>
    .camp_section {
        padding-bottom: 50px;
    }


    .titlt_col {
        padding: 40px 0px 40px 25px;
        background-color: #fdee9d;
    }


    .nav-pills .nav-link {
        background: 0 0;
        border: 0;
        border-radius: 4px;
        margin-bottom: 0px;
        color: #000;
        border-bottom:1px solid #fff;
    }


    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #e31e24;
        background-color: #fff;

    }

    .nav-pills .nav-link:hover {
        color: #e31e24;
        background-color: #fff;
    }

    .curriculum_container thead tr {
        background-color: #fdee9d;

    }


    .curriculum_container .cri_col-1 {
        text-align: center;
        width: 5%;
        font-weight: normal;
        font-size: 14px;
    }

    .curriculum_container .cri_col-6 {
        text-align: center;
    }

    .cri-pdf-btn {
        background-color: #fdee9d;
        border: 0px;
        outline: 0px;
        font-size: 14px;
        padding: 1px 15px;
        border-radius: 50px;
    }

    .cri-pdf-btn:hover {
        background-color: #e31e24;
        color: #fff;
    }


    .event_name {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 8px 0px 10px 0px;
    }

    .ev_img_col {
        padding: 26px 26px 26px 43px;
        /* background-color: #fdee9d; */
        /*border-top: 1px solid #fdee9d;*/
        /*border-right: 1px solid #fdee9d;*/
        /*border-bottom: 1px solid #fdee9d;*/
    }


    .ev_img_col img:hover {
        transform: scale(1.03);
        transition: all 0.3s ease-in-out;
    }
</style>

@include('frontend.partials.breadcrumb', ['title' => "Campus"])


{{--<section class=" camp_section position-relative pb-0">
    <div class="container  curriculum_container">
        <div class="row">
            <div class="col-md-2 titlt_col">
                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="camp_tabs_1" data-bs-toggle="pill" href="#camp_tab_1" role="tab" aria-controls="camp_tab_1" aria-selected="true">Biology Lab</a>
                    <a class="nav-link" id="camp_tabs_2" data-bs-toggle="pill" href="#camp_tab_2" role="tab" aria-controls="camp_tab_2" aria-selected="false">Physics Lab</a>
                </div>
            </div>
            <div class="col-md-10 ev_img_col  ">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="camp_tab_1" role="tabpanel" aria-labelledby="camp_tabs_1">
                        <div class="gallery row g-5">
                            <div class="event_box col-md-4">
                                <a href="https://www.nhssthane.com/img_upload/NHSST/1728192387_b77cff732bc1b245134d.jpg" data-fancybox="gallery" data-caption="Event image 1">
                                    <img src="https://www.nhssthane.com/img_upload/NHSST/1728192387_b77cff732bc1b245134d.jpg" alt=" Event Image 1">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="camp_tab_2" role="tabpanel" aria-labelledby="camp_tabs_2">
                        <div class="gallery row g-4">
                            <div class="event_box col-md-4">
                                <a href="https://www.nhssthane.com/img_upload/NHSST/1728192387_b77cff732bc1b245134d.jpg" class="bounce" data-fancybox="gallery" data-caption="Event image 1">
                                    <img src="https://www.nhssthane.com/img_upload/NHSST/1728192387_b77cff732bc1b245134d.jpg" alt=" Event Image 1">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>--}}


<section class="camp_section position-relative pb-0">
  <div class="container curriculum_container">
    <div class="row">
      <!-- Left Side Tabs -->
      <div class="col-md-2 titlt_col">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @php $i = 1; @endphp
            @foreach($pageData as $page)
                <a class="nav-link {{ $i == 1 ? 'active' : '' }}"
                id="camp_tabs_{{ $i }}"
                data-url="{{ route('campus.contents', ['id' => $page->id]) }}"
                data-bs-toggle="pill"
                href="#camp_dynamic_tab"
                role="tab"
                aria-controls="camp_dynamic_tab"
                aria-selected="{{ $i == 1 ? 'true' : 'false' }}">
                    {{ $page->name }}
                </a>
                @php $i++; @endphp
            @endforeach
        </div>
      </div>

      <!-- Right Side Content Area -->
      <div class="col-md-10 ev_img_col">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="camp_dynamic_tab" role="tabpanel" aria-labelledby="camp_tabs_1">
            <div class="tab-loader text-center">Loading...</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox="gallery"]', {
        Thumbs: {
            autoStart: true,
        },
        Toolbar: {
            display: [
                "zoom",
                "slideshow",
                "fullscreen",
                "download",
                "thumbs",
                "close",
            ],
        },
        Image: {
            zoom: true,
        },
        infinite: true,
    });
</script>

<!-- <script>
$(document).ready(function () {
  // Load content when a tab is clicked
  $('.nav-link').on('shown.bs.tab', function (e) {
    const $tab = $(e.target);
    const url = $tab.data('url');
    const $target = $('#camp_dynamic_tab');

    // Disable all tab clicks temporarily
    $('.nav-link').addClass('disabled').css('pointer-events', 'none');

    // Show loader
    $target.html('<div class="text-center">Loading...</div>');

    $.ajax({
      url: url,
      method: 'GET',
      dataType: 'html',
      success: function (data) {
        $target.html(data); // Or: '<div class="text-center">Loaded</div>';
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        $target.html('<div class="text-danger">Failed to load content.</div>');
      },
      complete: function () {
        // Re-enable all tabs after AJAX completes
        $('.nav-link').removeClass('disabled').css('pointer-events', 'auto');
      }
    });
  });

  // Auto-trigger first tab load
  $('.nav-link.active').trigger('shown.bs.tab');
});
</script>-->


<script>
$(document).ready(function () {
  // Load content when a tab is clicked
  $('.nav-link').on('shown.bs.tab', function (e) {
    const $tab = $(e.target);
    const url = $tab.data('url');
    const $target = $('#camp_dynamic_tab');

    // Scroll to top of the section with smooth animation
    $('html, body').animate({
      scrollTop: $('.camp_section').offset().top - 150 // Adjust -50 if you have a fixed header
    }, 500);

    // Disable all tab clicks temporarily
    $('.nav-link').addClass('disabled').css('pointer-events', 'none');

    // Show loader
    $target.html('<div class="text-center">Loading...</div>');

    $.ajax({
      url: url,
      method: 'GET',
      dataType: 'html',
      success: function (data) {
        $target
          .hide()            // hide first
          .html(data)        // update content
          .slideDown(400);   // animate slide down
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        $target.html('<div class="text-danger">Failed to load content.</div>');
      },
      complete: function () {
        // Re-enable all tabs after AJAX completes
        $('.nav-link').removeClass('disabled').css('pointer-events', 'auto');
      }
    });
  });

  // Auto-trigger first tab load
  $('.nav-link.active').trigger('shown.bs.tab');
});
</script>


@endsection