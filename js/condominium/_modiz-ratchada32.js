
function addHeight(checkId){
  var checkHeight = $(checkId).height();
  $('#section-6').height(checkHeight+150);
}



$(document).ready(function(){

  $('.burger-icon').click(function(){
    $('.burger-menu').slideToggle(200);
  })


  $('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
  });

  $('#planBut a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
  });

    $('a.scroll-nav').click(function() {

      $('.burger-menu').slideUp(200);
      $('.sub-header-right ul li').removeClass('active');
      $(this).parent('li').addClass('active');


    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top-100
        }, 1000);
        return false;
      }
    }
    });






 // The slider being synced must be initialized first
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

    $('.fl-select').change(function(){
        $('.plan-img').addClass('hide');
        var sShow = $('#' + $(this).val());
        sShow.show();
        sShow.removeClass('hide');
        addHeight(sShow);
    });

    $('.u-select').change(function(){
        $('.u-img').addClass('hide');
        var sShow = $('#' + $(this).val());
        sShow.show();
        sShow.removeClass('hide');
        addHeight(sShow);
    });

        var imageslider1 = $('#showmap a').tosrus({
          buttons: 'inline',
          pagination  : {
            add     : true
          },
          slides     : {
              scale      : "fit"
           }
        });

        $('.tos-slide').click(function(){
          imageslider1.trigger("close");
        })

});

$('.gallery-image-small').on('click', function(e) {
  console.log();
  var imageURL = $(this).children().attr('src');
  $('.image-show').attr('src', imageURL)
})

function setImage(images) {
  $('.image-show').attr('src', images[0])
  for(var i = 0 ; i < images.length ; i++) {
    $('.image-small-'+(i+1)).attr('src', images[i])
  }
}

function setPercent(percent) {
  $('.arrow-status').css('width', percent+'%')
  $('.header-text.percent').html(percent+'%')
}
function setDate(date) {
  $('.gallery-content-date').html(date)
}
function setContent(content) {
  $('.gallery-content-text').html(content)
}
function setHeroBanner(image, mobileImage) {
  $('#section-1').css('background-size', 'cover')
  setInterval(function() {
    if($(window).width() <= 425) {
      $('#section-1').css('background', 'url('+mobileImage+') no-repeat right')
    }
    else {
      $('#section-1').css('background', 'url('+image+') no-repeat right')
    }
  }, 50);
}

var images = [
  '/new-backend/img/image1.jpg',
  '/new-backend/img/image2.jpg',
  '/new-backend/img/image3.jpg',
  '/new-backend/img/image4.jpg',
]

$('.gallery-image-small').on('click', function(e) {
    var imageURL = $(this).find('img').attr('src');
    console.log(imageURL);
    $('.gallery-main-thumb').css('background-image', 'url('+imageURL+')');
});

// setImage(images)
// setHeroBanner('/phahol67/new-backend/img/bgImage.jpg', '/phahol67/new-backend/img/mobile-bgImage.jpg')
$.ajax({
  url: 'http://modizcondo.com/new-backend/content.php',
  success: function(response) {
    var data = JSON.parse(response);
    setDate(data.date);
    setContent(data.content);
    setPercent(data.percent);
  },
  error: function(err) {
    console.log(err);
  }
});
