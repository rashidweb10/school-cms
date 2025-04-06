<!-- JavaScript Files -->
<script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
<script src="{{ asset('assets/frontend/js/swiper.min.js') }}"></script>
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>


<script>
  AOS.init({
    duration: 800, // Duration of animations
    once: true, // Whether animation should happen only once
  });

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

  // Fancybox.bind("[data-fancybox]", {
  //   Toolbar: {
  //     display: ["zoom", "close"],
  //   },
  //   Thumbs: {
  //     autoStart: true, // Automatically display thumbnails in the popup
  //   },
  //   Carousel: {
  //     preload: 4, // Preload all 4 images in the group
  //   },
  // });

  var a = 0;
  $(window).scroll(function() {
    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
      $('.counter-value').each(function() {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $( { countNum: $this.text() }).animate({ countNum: countTo }, {
          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
          }
        });
      });
      a = 1;
    }
  });
</script>