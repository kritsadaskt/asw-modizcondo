$(function () {
  const blogs_nav = $('#blogs-nav');
  const blog_nav = blogs_nav.find('ul.nav');
  const blog_cat = $('#blogs-wrapper').find('.blogs-left-column');
  const blog_featured = $('#featured-wrapper');
  let nav_offset = blogs_nav.offset().top;
  let nav_space = $('#blog-nav-space');

  nav_space.css('height', blogs_nav.height());

  $(window).on('load resize', function (e) {
    if($(window).width() <= 520) {
      blog_nav.slick({
        slidesToShow: 1,
        dots: false,
        asNavFor: blog_cat,
        prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg></button>',
        nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg></button>'
      });
      blog_cat.slick({
        dots: false,
        arrows: false,
        adaptiveHeight: true,
        asNavFor: blog_nav,
      });
      blog_featured.slick({
        arrows: false,
        dots: true,
      })
    } else {
      $('.slick-slider').slick('unslick');
    }
  });
  $(window).on('load resize scroll', function () {
    if ($(window).width() > 520) {
      //console.log($(window).scrollTop());
      if ($(window).scrollTop() >= 980) {
        nav_space.show();
        blogs_nav.addClass('fixed');
      } else {
        nav_space.hide();
        blogs_nav.removeClass('fixed');
      }
    }
  })
});