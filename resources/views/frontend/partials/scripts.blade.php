<!-- JavaScript Files -->
<script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
<script src="{{ asset('assets/frontend/js/swiper.min.js') }}"></script>
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('custom.recaptcha_site_key') }}"></script>
<script>
    function protect_with_recaptcha_v3(formElement, action) {
        event.preventDefault();
        
        // Disable submit button to prevent double click 2
        const submitButtons = formElement.querySelectorAll('button[type="submit"]');
        submitButtons.forEach(button => {
            button.disabled = true;
            button.innerHTML = 'Submitting...';
        });

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

  // $(document).ready(function() {
  //   $(".owl-carousel").owlCarousel({
  //     items: 5, // Default number of items
  //     loop: true, // Loop through items
  //     margin: 65, // Space between items
  //     nav: true, // Show next/prev buttons
  //     dots: true, // Show pagination dots
  //     autoplay: true, // Autoplay the carousel
  //     autoplayTimeout: 3000, // Autoplay interval in ms
  //     autoplayHoverPause: true, // Pause on mouse hover
  //     responsive: {
  //       0: {
  //         items: 1 // Number of items for mobile view (width 0px and up)
  //       },
  //       768: {
  //         items: 3 // Number of items for tablets (width 768px and up)
  //       },
  //       1024: {
  //         items: 3 // Number of items for desktops (width 1024px and up)
  //       }
  //     }
  //   });
  // });

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

  // var a = 0;
  // $(window).scroll(function() {
  //   var oTop = $('#counter').offset().top - window.innerHeight;
  //   if (a == 0 && $(window).scrollTop() > oTop) {
  //     $('.counter-value').each(function() {
  //       var $this = $(this),
  //           countTo = $this.attr('data-count');
  //       $( { countNum: $this.text() }).animate({ countNum: countTo }, {
  //         duration: 2000,
  //         easing: 'swing',
  //         step: function() {
  //           $this.text(Math.floor(this.countNum));
  //         },
  //         complete: function() {
  //           $this.text(this.countNum);
  //         }
  //       });
  //     });
  //     a = 1;
  //   }
  // });

//   var a = 0;
// $(window).scroll(function() {
//   var $counter = $('#counter');
//   if ($counter.length === 0) return; // exit if #counter does not exist

//   var oTop = $counter.offset().top - window.innerHeight;
//   if (a === 0 && $(window).scrollTop() > oTop) {
//     $('.counter-value').each(function() {
//       var $this = $(this),
//           countTo = $this.attr('data-count');
//       $({ countNum: $this.text() }).animate({ countNum: countTo }, {
//         duration: 2000,
//         easing: 'swing',
//         step: function() {
//           $this.text(Math.floor(this.countNum));
//         },
//         complete: function() {
//           $this.text(this.countNum);
//         }
//       });
//     });
//     a = 1;
//   }
// });

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
</script>


<script>
    $(document).ready(function(){
      $(".achievements").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 3
          },
          1024: {
            items: 4
          }
        }
      });
    });
  </script>


<script>
    $(document).ready(function(){
      $(".news_update").owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        autoplay: false,
        autoplayTimeout: 3000,
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 3
          },
          1024: {
            items: 3
          }
        }
      });
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
  
<script>
$(document).ready(function () {
    $('.submenu').hover(
        function () {
            // On hover in
            $(this).closest('li').children('a.nav-link').addClass('active');
        },
        function () {
            // On hover out
            $(this).closest('li').children('a.nav-link').removeClass('active');
        }
    );
}); 
</script>


 <script>
    function nhToggleMenu() {
      const overlay = document.getElementById('nhOverlay');
      const toggleBtn = document.getElementById('nhMenuToggle');
      const items = document.querySelectorAll('#nhOverlay ul li a');

      // OPEN
      if (!overlay.classList.contains('nh-open')) {
        overlay.classList.add('nh-open');
        toggleBtn.classList.add('nh-open');

        items.forEach((item, index) => {
          item.classList.remove('animate__animated', 'animate__fadeInUp');
          item.style.opacity = "0"; 
          void item.offsetWidth; // restart animation
          item.classList.add('animate__animated', 'animate__fadeInUp');
          item.style.animationDelay = `${0.2 * index}s`;
          item.style.opacity = "1";
        });

      } else {
        // CLOSE
        overlay.classList.remove('nh-open');
        toggleBtn.classList.remove('nh-open');

        items.forEach(item => { item.style.opacity = "0"; });
      }
    }
  </script>

  <script>
    AOS.init({ duration: 800, once: true });
  </script>

  <script defer>
  $(document).ready(function () {

    $(document).on('click', '.apply-btn', function () {

        let jobCode    = $(this).data('job-code') || '';
        let industry   = $(this).data('industry') || '';
        let admission  = $(this).data('admission-counselor') || '';
        let jobType    = $(this).data('job-type') || '';
        let contact    = $(this).data('contact-number') || '';
        let email      = $(this).data('email-id') || '';

        // Modal Title
        $('#modalJobCode').text(jobCode);
        $('#modalIndustry').text(industry);

        // Hidden Fields
        $('#modalJobCodeInput').val(jobCode);
        $('#modalIndustryInput').val(industry);
        $('#modalAdmissionCounselorInput').val(admission);
        $('#modalJobTypeInput').val(jobType);
        $('#modalContactNumberInput').val(contact);
        $('#modalEmailIdInput').val(email);

        $('#displayJobCode').text(jobCode);
        $('#displayIndustry').text(industry);
        $('#displayAdmissionCounselor').text(admission);
        $('#displayJobType').text(jobType);
        $('#displayContactNumber').text(contact);
        $('#displayEmailId').text(email);        

        // console.log({
        //     jobCode,
        //     industry,
        //     admission,
        //     jobType,
        //     contact,
        //     email
        // });
    });

});
</script>