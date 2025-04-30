@extends('frontend.layouts.app')

@section('meta.title', "Events - ". get_setting('name'))
@section('meta.description', "Events - ".get_setting('name'))

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
    .titlt_col {
        padding: 40px 0px 40px 25px;
        background-color: #fdee9d;
    }


    .nav-pills .nav-link {
        background: 0 0;
        border: 0;
        border-radius: 5px 0px 0px 5px;
        margin-bottom: 4px;
        color: #000;
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

    /* .curriculum_container thead tr {
        background-color: #fdee9d;

    } */


    /* .curriculum_container .cri_col-1 {
        text-align: center;
        width: 5%;
        font-weight: normal;
        font-size: 14px;
    }

    .curriculum_container .cri_col-6 {
        text-align: center;
    } */

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
        padding: 8px 0px 0px 0px;
        transform: translateY(-17px);

    }

    .event_box:hover img {
        transform: scale(1.02);
        transition: all 0.3s ease-in-out;
    }

    .event_name p {
        color: #222;
        background-color: #ddd;
        width: 90%;
        text-align: center;
        font-weight: 500;
        border-radius: 8px;
    }

    .ev_img_col {
        padding: 16px 16px 16px 43px;
        /* background-color: #fdee9d; */
        border-top: 1px solid #fdee9d;
        border-right: 1px solid #fdee9d;
        border-bottom: 1px solid #fdee9d;
    }
</style>

@include('frontend.partials.breadcrumb', ['title' => "Events"])


<section class="camp_section position-relative">
  <div class="container curriculum_container">
    <div class="row">
      <!-- Left Side Tabs -->
      <div class="col-md-2 titlt_col">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @php $i = 1; @endphp
            @foreach($pageData as $year)
                <a class="nav-link {{ $i == 1 ? 'active' : '' }}"
                id="camp_tabs_{{ $i }}"
                data-url="{{ route('events.contents', ['year' => $year]) }}"
                data-bs-toggle="pill"
                href="#camp_dynamic_tab"
                role="tab"
                aria-controls="camp_dynamic_tab"
                aria-selected="{{ $i == 1 ? 'true' : 'false' }}">
                    {{ $year }}
                </a>
                @php $i++; @endphp
            @endforeach
        </div>
      </div>

      <!-- Right Side Content Area -->
      <div class="col-md-10 ev_img_col">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="camp_dynamic_tab" role="tabpanel" aria-labelledby="camp_tabs_1">
            <div class="tab-loader text-center"></div>
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

<!--<script>
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
  let ajaxStartTime = 0;

  // Load content when a tab is clicked
  $('.nav-link').on('shown.bs.tab', function (e) {
    const $tab = $(e.target);
    const url = $tab.data('url');
    const $target = $('#camp_dynamic_tab');

    // Disable all tab clicks temporarily
    $('.nav-link').addClass('disabled').css('pointer-events', 'none');

    // Show loader

    let skeletonHTML = '';
for (let i = 0; i < 4; i++) { // show 4 skeleton boxes
  skeletonHTML += `
    <div class="event_box col-md-3 skeleton">
      <a class="bounce" style="pointer-events: none;">
        <div class="img-placeholder"></div>
      </a>
      <div class="event_name">
        <p class="text-placeholder"></p>
      </div>
    </div>
  `;
}
$target.html('<div class="row">' + skeletonHTML + '</div>');

    //$target.html('<div class="text-center">Loading...</div>');

    // Record start time
    ajaxStartTime = Date.now();

    $.ajax({
      url: url,
      method: 'GET',
      dataType: 'html',
      success: function (data) {
        $target.html(data);
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        //$target.html('<div class="text-danger">Failed to load content.</div>');
        $target.html('<div class="row">' + skeletonHTML + '</div>');
      },
      complete: function () {
        // Record end time
        const ajaxEndTime = Date.now();
        const elapsedSeconds = ((ajaxEndTime - ajaxStartTime) / 1000).toFixed(2);

        console.log(`⏱️ Load time: ${elapsedSeconds} seconds`);

        // Re-enable all tabs after AJAX completes
        $('.nav-link').removeClass('disabled').css('pointer-events', 'auto');
      }
    });
  });

  // Auto-trigger first tab load
  $('.nav-link.active').trigger('shown.bs.tab');
});
</script>

<style>
/* Skeleton base animation */
.skeleton .img-placeholder,
.skeleton .text-placeholder {
  background: linear-gradient(-90deg, #e0e0e0 0%, #f0f0f0 50%, #e0e0e0 100%);
  background-size: 200% 200%;
  animation: shimmer 1.2s infinite;
}

.img-placeholder {
  width: 100%;
  padding-top: 75%; /* 4:3 Aspect Ratio */
  border-radius: 8px;
}

.text-placeholder {
  height: 20px;
  margin-top: 10px;
  border-radius: 4px;
}

@keyframes shimmer {
  0% {
    background-position: 200% 0;
  }
  100% {
    background-position: -200% 0;
  }
}
</style>


@endsection