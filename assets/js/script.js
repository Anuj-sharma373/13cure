$(document).ready(function () {


  // $('.navMenu nav ul li a ').click(function () { 
  //  $(this).toggleClass('listactive');
    
  // });



    $('.dropdown').hover(function () {
        $('.dropdown-menu').toggle();
         
     }, function () {
         $('.dropdown-menu').toggle();
     }
    );

    $('.second_dropdown').hover(function () {
      $('.second_dropdown-menu').toggle();   
      }, function () {
        $('.second_dropdown-menu').toggle();
      }
    );


    $('.third_dropdown').hover(function () {
      $('.third_dropdown-menu').toggle();   
      }, function () {
        $('.third_dropdown-menu').toggle();
      }
    );

    $(".third_dropdown").click(function () { 
     $('.third_dropdown-menu').toggleClass('thirdMneuActive');
      
    });

$('.clikBtn').click(function () { 
  $('.navMenu nav').toggle(400);
  $('.main').toggleClass('main1');
  $(".humburImg").toggleClass('active_bars');
  $(".fa-xmark").toggleClass('active_X');
});

    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      navText : ['<i class="fa-solid fa-arrow-left"></i>','<i class="fa-solid fa-arrow-right"></i>'],
    
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true,
                loop:false
            }
        }
    });

    // $('.bg_color').children().css({
    //   "color":"#fff"
    // });

    $('.ourServices_cards').hover(function () {
          $(this).toggleClass('bg_color');
          $(this).children().css({
            "color":"#fff"
          });   
    
        }, function () {
            $(this).toggleClass('bg_color');
            $(this).children().css({
             "color":"#000"
              });
              $('.ourService_src .ourServices_inners .ourServices_cards p').css({
                "color":"#7d7d7d"
              }); 
        }
    );


    //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

$(".anausetoggel").click(function () { 
 $(".anauceBar").hide(300);

});



 var windowWidth = $(window).width();

 if(windowWidth < 576  ){
  $('.accorClick').click(function () { 
    console.log("I am clicking");
    var parent =  $(this).parent();
    $(parent).children(".menu-list").toggleClass("list-active");
    $(parent).find(".accorClick .fa-angle-down").toggleClass("activeI");
   });  
 }else{

 }



$(document).ready(function() {
  // Select the header element
  const header = $('.header');

  // Function to handle the scroll event
  function handleScroll() {
    // Check if the page has scrolled down 100px
    if ($(window).scrollTop() > 50) {
      header.addClass('scrolled'); // Add the 'scrolled' class
    } else {
      header.removeClass('scrolled'); // Remove the 'scrolled' class
    }
  }

  // Listen for the scroll event
  $(window).scroll(handleScroll);
});


function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
  





});