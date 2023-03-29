  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider'
  });
 
  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });  
    $('#carousel2').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider2'
  });
 
  $('#slider2').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel2"
  });  
    $('#carousel3').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider3'
  });
 
  $('#slider3').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel3"
  }); 
    $('#carousel4').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#slider4'
  });
 
  $('#slider4').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel4"
  }); 



  function homescroll(){
                $('html, body').animate({
                    scrollTop: 0
                }, 600);
            
  }
    function selectscroll(){
     $('html, body').animate({
                    scrollTop: $(".sec3").offset().top - 140
                }, 600);
  }
    function regisscroll(){
    $('html, body').animate({
                    scrollTop: $(".sec2").offset().top - 140
                }, 600);
  }







