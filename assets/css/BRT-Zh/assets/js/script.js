jQuery(document).ready(function($) {
    // Initialize Slick slider
    $('.slickSlidr').slick({
        slidesToShow: 3,    // Default slides to show
        slidesToScroll: 1,
        arrows: true,
        margin: '0 15px',
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 2    // Show 2 slides on screens <= 1023px
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1    // Show 1 slide on screens <= 575px
                }
            }
        ]
    });
});



jQuery(document).ready(function() {
  jQuery('#s').attr('placeholder', 'Please type here to search');
});




jQuery(document).ready(function() {
  jQuery('#playButton').click(function() {
      jQuery(this).hide(); // Hide the play button
      jQuery('.heroImgeBanner').hide(); // Hide the hero image banner
      jQuery('#bannerVideoContainer').show(); // Show the banner video container
      jQuery('#videoPlayer')[0].src += "&autoplay=1"; // Autoplay the video
  });
});


jQuery(document).ready(function(){
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("activate");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
});




// SLIDER Testimonial page
jQuery(document).ready(function(){
  jQuery('.testimonial-slider-main').slick({
    dots: true, 
    infinite: true,
    speed: 300,
    arrows: true,
    slidesToShow: 3, 
    slidesToScroll: 3, 
    rows: 2, 

    responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          rows: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          rows: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          rows: 2,
          infinite: true,
          dots: true
        }
      }
    ]
  });
});

  jQuery(document).ready(function($) {
    $('#myTab a').on('click', function (e) {
      e.preventDefault();
      $(this).tab('show');
    });
  });




jQuery(document).ready(function(){
jQuery('.slide-please').slick({
    dots: true,
    infinite: false,
    speed: 300,
	arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: false,
          dots: false
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
		  infinite: false,
          slidesToScroll: 1,
          dots: false
        }
      },
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 1,
		  infinite: false,
          slidesToScroll: 1,
		  dots: false
		
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
		  infinite: false,
          slidesToScroll: 1,
		  dots: false
        }
      }
    ]
  });
});


jQuery(document).ready(function($) {
    // Hide comments form initially
    $('#commentform').hide();

    // Toggle comments form on button click
    $('#write-review-button').on('click', function(e) {
        e.preventDefault();
        $('#commentform').slideToggle();
    });

    // Optional: Validate rating selection before submitting the form
    $('#commentform').on('submit', function() {
        if ($('#rating').val() == '') {
            alert('Please select a rating before submitting your review.');
            return false;
        }
    });
});


    jQuery(document).ready(function($) {
        // Wait for the carousel to be fully loaded
        $('#carouselExampleControls').on('slid.bs.carousel', function () {
            var carouselData = $(this).data('bs.carousel');
            var currentIndex = carouselData.getItemIndex(carouselData.$element.find('.carousel-item.active'));

            // Remove 'active' class from all items except the current one
            $('#carouselExampleControls .carousel-item').removeClass('active');
            $('#carouselExampleControls .carousel-item').eq(currentIndex).addClass('active');
        });

        // Ensure only the first item is initially active
        $('#carouselExampleControls .carousel-item').first().addClass('active');
    });


jQuery(document).ready(function(){
	document.addEventListener('DOMContentLoaded', function() {
    const reviewsPerPage = 3;
    const comments = document.querySelectorAll('.comment-item');
    const paginationButtons = document.querySelectorAll('.pagination-button');

    function showPage(page) {
        const start = (page - 1) * reviewsPerPage;
        const end = start + reviewsPerPage;

        comments.forEach((comment, index) => {
            if (index >= start && index < end) {
                comment.style.display = 'block';
            } else {
                comment.style.display = 'none';
            }
        });

        paginationButtons.forEach(button => {
            button.classList.remove('active');
        });
        document.querySelector(`.pagination-button[data-page="${page}"]`).classList.add('active');
    }

    paginationButtons.forEach(button => {
        button.addEventListener('click', function() {
            const page = parseInt(this.getAttribute('data-page'));
            showPage(page);
        });
    });

    // Show the first page initially
    showPage(1);
});
})


jQuery(document).ready(function($) {
  $('#back-to-top').on('click', function(event) {
      event.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 'slow');
  });

  $('.tab-button').on('click', function() {
    var index = $(this).data('index');

    // Hide all tab content
    $('.tab-content').hide();

    // Show the selected tab content
    $('.tab-content[data-index="' + index + '"]').show();

    // Remove active class from all tab buttons
    $('.tab-button').removeClass('active');

    // Add active class to the clicked tab button
    $(this).addClass('active');
});

});

jQuery(document).ready(function() {
  jQuery(window).on('load', function() {
      jQuery('.loader').each(function() {
          const percentage = parseFloat(jQuery(this).attr('data-percentage'));
          const remainingCircle = jQuery(this).find('.remaining');
          const circumference = 2 * Math.PI * 40;

          // Set initial stroke dashoffset to full circumference
          remainingCircle.css('stroke-dashoffset', circumference);

          // Animate stroke dashoffset to the calculated remaining offset
          setTimeout(() => {
              const remainingOffset = circumference * (1 - percentage / 100);
              remainingCircle.css('stroke-dashoffset', remainingOffset);

              // Update the percentage text dynamically
              const percentageElement = jQuery(this).find('.percentage');
              percentageElement.text(percentage.toFixed(2) + '%');
          }, 100); // Adjust timing as needed
      });
  });
});


jQuery(document).ready(function($) {
  $('.menu-toggle').click(function() {
      $('.main-navigation').toggleClass('toggled');
  });
});


