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


  function tab1(){
    $('.sec3 .tab-container .tab-item').removeClass('active');
    $('.sec3 .tab-container .tab-item.esta').addClass('active');
    $('.condo-tab').css('display','none');
    $('.condo-tab.esta-tab').css('display','block')
  }  
  function tab2(){
    $('.sec3 .tab-container .tab-item').removeClass('active');
    $('.sec3 .tab-container .tab-item.h-2').addClass('active');
    $('.condo-tab').css('display','none');
    $('.condo-tab.h2-tab').css('display','block')
  }  
  function tab3(){
    $('.sec3 .tab-container .tab-item').removeClass('active');
    $('.sec3 .tab-container .tab-item.campus').addClass('active');
    $('.condo-tab').css('display','none');
    $('.condo-tab.campus-tab').css('display','block')
  }  
  function tab4(){
    $('.sec3 .tab-container .tab-item').removeClass('active');
    $('.sec3 .tab-container .tab-item.modiz').addClass('active');
    $('.condo-tab').css('display','none');
    $('.condo-tab.modiz-tab').css('display','block')

  }  

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







