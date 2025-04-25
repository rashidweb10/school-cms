<!DOCTYPE html>
<html lang="en">
<head> 
    @include('frontend.partials.meta')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Local Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/landing/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/hover.css') }}">

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/fancybox.css') }}">

    <style>
    /* Disclosure Link */
    .discloser_link {
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 7px;
        padding-top: 20px;
        text-decoration: none;
        font-family: "Roboto Slab", serif !important;
    }

    .discloser_link:hover {
        color: #f9bc09;
        cursor: pointer;
    }

    /* Menu Links */
    .menu a {
        text-decoration: none;
        display: block;
        position: relative;
        color: #fff !important;
        font-weight: 500;
    }

    .menu > li {
        position: relative;
    }

    /* Submenu */
    .submenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #fccf00;
        border-top: 0px solid transparent;
        width: 220px;
        z-index: 1000;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        padding-left:0px !important;
         padding-right:0px !important;
    }

    .menu > li:hover > .submenu {
        display: block;
    }

    .submenu li {
        position: relative;
        margin-left: 0px !important;
        border-bottom: 1px dashed #888;
    }

    .submenu li:last-child {
        border-bottom: none !important;
    }

    .submenu li:hover {
        background-color: #f49a12;
    }

    .submenu li a {
        padding: 10px 15px;
        color: #000 !important;
    }

    .submenu li:hover a {
        color: #fff !important;
    }

    /* Submenu Images */
    .submenu img {
        width: 17px;
        position: relative;
        top: -2px;
        left: -4px;
        filter: grayscale(0%) contrast(0%) brightness(0) !important;
        margin-right: 4px;
    }

    .submenu img:hover {
        filter: grayscale(0%) !important;
    }

    .submenu a:hover img {
        filter: grayscale(100%) !important;
    }

    /* Nested Submenu */
    .submenu .submenu {
        left: 100%;
        top: 0;
        display: none;
        overflow: hidden;
    }

    .submenu li:hover > .submenu {
        display: block;
    }

    /* Reset List Styles */
    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }    
    </style>
</head>
<body>

    @include('frontend.partials.landing-header')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.landing-footer')

    <!-- JavaScript Files -->
    <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/swiper.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('custom.recaptcha_site_key') }}"></script>
<script>
    function protect_with_recaptcha_v3(formElement, action) {
        event.preventDefault();

        grecaptcha.ready(function () {
            grecaptcha.execute('{{ config('custom.recaptcha_site_key') }}', { action: action }).then(function (token) {
                // Create or update recaptcha_token input
                let tokenInput = formElement.querySelector('[name="recaptcha_token"]');
                if (!tokenInput) {
                    tokenInput = document.createElement('input');
                    tokenInput.type = 'hidden';
                    tokenInput.name = 'recaptcha_token';
                    formElement.appendChild(tokenInput);
                }
                tokenInput.value = token;

                //alert(token);

                // Create or update recaptcha_action input
                let actionInput = formElement.querySelector('[name="recaptcha_action"]');
                if (!actionInput) {
                    actionInput = document.createElement('input');
                    actionInput.type = 'hidden';
                    actionInput.name = 'recaptcha_action';
                    formElement.appendChild(actionInput);
                }
                actionInput.value = action;

                formElement.submit();
            });
        });
    }
</script>    

        <script>
        AOS.init({
            duration: 800, // Duration of animations
            once: true, // Whether animation should happen only once
        });
        </script>
        <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
            items: 5, // Default number of items
            loop: true, // Loop through items
            margin: 65, // Space between items
            nav: true, // Show next/prev buttons
            dots: true, // Show pagination dots
            autoplay: true, // Autoplay the carousel
            autoplayTimeout: 3000, // Autoplay interval in ms
            autoplayHoverPause: true, // Pause on mouse hover
            responsive: {
                0: {
                items: 1 // Number of items for mobile view (width 0px and up)
                },
                768: {
                items: 3 // Number of items for tablets (width 768px and up)
                },
                1024: {
                items: 3 // Number of items for desktops (width 1024px and up)
                }
            }
            });
        });
        </script>
        <script>
        Fancybox.bind("[data-fancybox]", {
            Toolbar: {
            display: ["zoom", "close"],
            },
            Thumbs: {
            autoStart: true, // Automatically display thumbnails in the popup
            },
            Carousel: {
            preload: 4, // Preload all 4 images in the group
            },
        });
        </script>
    <script>
    var a = 0;
    $(window).scroll(function () {
    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $({
            countNum: $this.text()
        }).animate(
            {
            countNum: countTo
            },
            {
            duration: 2000,
            easing: 'swing',
            step: function () {
                $this.text(Math.floor(this.countNum) + '+'); // Add the + during the count
            },
            complete: function () {
                $this.text(this.countNum + '+'); // Ensure the + is added at the end
            }
            }
        );
        });
        a = 1;
    }
    });


    $(".group_schools").owlCarousel({
        loop: !0,
        margin: 10,
        autoplay: !0,
        autoplayTimeout: 5000,
    // 	nav: !0,
    // 	navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>', ],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            960: {
                items: 1,
            },
            1200: {
                items: 1,
            },
        },
    });
    </script>

<script>
  window.addEventListener("scroll", function () {
    const topEl = document.querySelector(".top_position");
    if (window.scrollY > 60) { // adjust value as needed
      topEl.classList.add("fixed-top");
    } else {
      topEl.classList.remove("fixed-top");
    }
  });
</script>
    @yield('scripts')

</body>
</html>
