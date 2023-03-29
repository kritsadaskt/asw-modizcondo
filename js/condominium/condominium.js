$(function(){

  //Customize Form Select Element
  let x, i, j, l, ll, selElmnt, a, b, c;
  /* Look for any elements with the class "custom-select": */
  x = document.getElementsByClassName("custom-select");
  l = x.length;
  for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
      /* For each option in the original select element,
      create a new DIV that will act as an option item: */
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        let y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML === this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
      /* When the select box is clicked, close any other select boxes,
      and open/close the current select box: */
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
  }

  function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    let x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
      if (elmnt === y[i]) {
        arrNo.push(i)
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < xl; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }

  /* If the user clicks anywhere outside the select box,
  then close all select boxes: */
  document.addEventListener("click", closeAllSelect);

  //Change Floor plan when select
  var destFloorImg = $('#plan-image-show');
  var destUnitImg = $('#unit-image-show');
  var floorSelector = $('#floor-selector');
  var unitSelector = $('#unit-selector');
  var registerForm = $('#reg-form');

  //Define demo user
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');

      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
      }
    }
  };

  var isDemo = getUrlParameter('test');

  if(isDemo === '1') {
    registerForm.find('#name').val('upztest');
    registerForm.find('#surname').val('upztest');
    registerForm.find('#tel').val('0899999999');
    registerForm.find('#email').val('kritsada@uppercuz.com');
  }

  floorSelector.on('change', function () {
    var img = $(this).val();
    destFloorImg.attr('src', img);
  });

  unitSelector.on('change', function () {
    var img = $(this).val();
    destUnitImg.attr('src', img);
  });

  // The slider being synced must be initialized first
  $('#main-gallery-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#main-gallery-carousel"
  });

  $('#main-gallery-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#main-gallery-slider'
  });

  $('#unit-gallery-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#unit-gallery-carousel"
  });

  $('#unit-gallery-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#unit-gallery-slider'
  });

  $('#addition-gallery-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#addition-gallery-carousel"
  });

  $('#addition-gallery-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
    itemMargin: 5,
    asNavFor: '#addition-gallery-slider'
  });

  $('.gallery-image-small').on('click', function(e) {
    var imageURL = $(this).find('img').attr('src');
    //console.log(imageURL);
    $('.gallery-main-thumb').css('background-image', 'url('+imageURL+')');
  });

  //Slick Video (if have more than one video on page)
  var videoSlider = $('#project-videos').find('.video-slide');
  if(videoSlider) {
    videoSlider.slick({
      draggable: true
    });
  }

  //Set Price range value
  var priceRange = $('#price_range ul.dropdown-menu').find('li');
  var priceRangeBtn = $('button#price_capacity_dropdown .txt');
  var roomType = $('#roomType ul.dropdown-menu').find('li');
  var roomTypeBtn = $('button#room_type_dropdown .txt');

  priceRange.on('click touch', function () {
    var selectedRange = $(this).text();
    priceRangeBtn.text(selectedRange);
    $('#priceRangeVal').val(selectedRange);
  });

  roomType.on('click touch', function () {
    var selectedRoom = $(this).text();
    roomTypeBtn.text(selectedRoom);
    $('#roomTypeVal').val(selectedRoom);
  });

  // Swiper Init
  // let gallery_count = $('#galleries .tab-content .tab-pane').length;
  // let galleryThumbs = [];
  // let galleryTop = [];
  // let galleries = [];
  // for (let i=1;i <= gallery_count; i++) {
  //   //console.log($('#gallery-top-'+i));
  //   //console.log($('#gallery-thumbs-'+i));
  //   $('#gallery-top-'+i).slick({
  //     slidesToShow: 1,
  //     infinite: true,
  //     arrows: false,
  //     asNavFor: $('#gallery-thumbs-'+i)
  //   });
  //   $('#gallery-thumbs-'+i).slick({
  //     slidesToShow: 5,
  //     infinite: true,
  //     focusOnSelect: true,
  //     asNavFor: $('#gallery-top-'+i),
  //     prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="background-image: url(https://assetwise.co.th/migrate/wp-content/themes/assetwise/images/ico/left-arrow-white.png);"></button>',
  //     nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="background-image: url(https://assetwise.co.th/migrate/wp-content/themes/assetwise/images/ico/right-arrow-white.png);"></button>'
  //   });
  //}

  //Progress Gallery

  let progress_gallery_top = $('#progress_gallery .progress-gallery-top');
  let progress_gallery_thumbs = $('#progress_gallery .progress-gallery-thumbs');

  progress_gallery_top.slick({
    slidesToShow: 1,
    arrows: false,
    dots: false,
    asNavFor: progress_gallery_thumbs,
  });

  progress_gallery_thumbs.slick({
    slidesToShow: 5,
    arrows: true,
    dots: false,
    focusOnSelect: true,
    asNavFor: progress_gallery_top,
    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="background-image: url(https://assetwise.co.th/migrate/wp-content/themes/assetwise/images/ico/left-arrow-dark_blue.png);"></button>',
    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="background-image: url(https://assetwise.co.th/migrate/wp-content/themes/assetwise/images/ico/right-arrow-dark_blue.png);"></button>'
  })

  let new_condo_hero_d = $('#hero_slider_d');
  let new_condo_hero_m = $('#hero_slider_m');
  if (new_condo_hero_d.length) {
    new_condo_hero_d.slick({
      autoplay: true,
      autoplaySpeed: 6000,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg></button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg></button>'
    });
  }
  if (new_condo_hero_m.length) {
    new_condo_hero_m.slick({
      autoplay: true,
      autoplaySpeed: 6000,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg></button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg></button>'
    });
  }

  if ($(window).width() < 768) {
    if ($('#concept_m').length > 0) {
      let conceptM_Slider = new Swiper('#concept_m', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        loop: true,
        autoHeight: true,
        grabCursor: true,
        centeredSlides: true,
        pagination: {
          el: '#concept_m .swiper-pagination',
        }
      });
    }
    if ($('#facSlider_m').find('.swiper-wrapper').children().length > 0) {
      let facSlider = new Swiper('#facSlider_m', {
        slidesPerView: 'auto',
        spaceBetween: 10,
        loop: true,
        autoHeight: true,
        grabCursor: true,
        centeredSlides: true,
        pagination: {
          el: '#facSlider_m .swiper-pagination',
        }
      });
    }
  }

  if ($('#top_menu').length) {
    $('body').scrollspy({ target:'#top_bar', offset: 250});
  }

  let tabBtn = $('.tab-btn');
  tabBtn.on('click', function () {
    openTab(event, $(this).data('toggle'));
  });

  function openTab(e, tabName) {
    let i;
    let x = document.getElementsByClassName("floor-unit-tab");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    let tabLinks = document.getElementsByClassName("tab-btn");
    for (i = 0; i < x.length; i++) {
      tabLinks[i].className = tabLinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    e.currentTarget.className += " active";
  }

  const floorPlanShow = $('#floorPlanShow');
  const floorPlanLightbox = $('#floorPlanLightbox');
  const unitPlanShow = $('#unitPlanShow');
  const unitPlanLightbox = $('#unitPlanLightbox');

  let floorSelectDropdown = $('#floorSelectDropdown');
  let unitSelectDropdown = $('#unitSelectDropdown');

  $('#floor_plan .custom-select .select-items>div').on('click', function (e) {
    floorPlanShow.attr('src', floorSelectDropdown.val());
    floorPlanLightbox.attr('href', floorSelectDropdown.val());
  });
  $('#unit_plan .custom-select .select-items>div').on('click', function (e) {
    unitPlanShow.attr('src', unitSelectDropdown.val());
    unitPlanLightbox.attr('href', unitSelectDropdown.val());
  });

  //Get UTM from Url
  $.urlParam = function (name) {
    let results = new RegExp('[\?&]' + name + '=([^&#]*)')
      .exec(window.location.search);
    return (results !== null) ? results[1] : "";
  }
  //Place UTM in CF7 Fields
  if ($.urlParam('utm_source')) {
    $('input[name="ref"]').val($.urlParam('utm_source'));
    $('#utm_source').val($.urlParam('utm_source'));
  } else {
    $('input[name="ref"]').val('direct');
    $('#utm_source').val('direct');
  }
  //$('#utm_source').val($.urlParam('utm_source'));
  $('#utm_medium').val($.urlParam('utm_medium'));
  $('#utm_campaign').val($.urlParam('utm_campaign'));
  $('#utm_term').val($.urlParam('utm_term'));
  $('#utm_content').val($.urlParam('utm_content'));

  $('.mdr-slick').slick({arrows: false, dots: true});

  //$('#icon_listed').find('.fac-item').matchHeight({byRow:false});

  let fac_icon = $('#icon_listed');
  fac_icon.find('.fac-item').matchHeight({byRow:false});
  let fac_h = fac_icon.find('.fac-item').outerHeight();
  let fac_count = fac_icon.find('.fac-item').length;
  let fac_icon_full_h = fac_h * Math.round(fac_count / 3);
  let fac_h_hide = fac_h * 3;
  let fac_show_label = $('#toggle_fac_icon .showAll');
  let fac_hide_label = $('#toggle_fac_icon .hideThem');
  if ($(window).width() < 520) {
    fac_icon.css('height', fac_h_hide);
  }

  $('#toggle_fac_icon').on('click touch', function (e) {
    if (fac_icon.hasClass('show-all')) {
      fac_icon.removeClass('show-all');
      fac_show_label.show();
      fac_hide_label.hide();
      fac_icon.animate({
        height: fac_h_hide,
      }, 600);
    } else {
      fac_icon.addClass('show-all');
      fac_hide_label.show();
      fac_show_label.hide();
      fac_icon.animate({
        height: fac_icon_full_h,
      }, 600);
    }
  });

  $('input.wpcf7-submit').on('click touch', function (e) {
    cf7_get_timestamp();
    $('#loader').show();
  });

  // Get Current CF7 current submit date
  const cf7_date_field = $('#time_submit');
  function cf7_get_timestamp() {
    let d = new Date();
    let months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    let timestamp = d.getDate()+' '+months[d.getMonth()]+' '+d.getFullYear()+', '+d.getHours()+':'+d.getMinutes();
    cf7_date_field.val(timestamp);
  }

  //let wcf7form = document.querySelector('.wpcf7-form');
  document.addEventListener('wpcf7invalid', function (e) {
    $('#loader').hide();
  }, false);

  //Videos Section Load more Button
  let vdo_reveal = $('#vdo').find('.videos-reveal-btn');
  vdo_reveal.on('click touch', function () {
    let reveal_box = $('.videos-wrapper');
    let curHeight = reveal_box.height();
    console.log(curHeight);
    $(reveal_box).css('height', 'auto');
    let autoHeight = $(reveal_box).height();
    $(reveal_box).height(curHeight).animate({height: autoHeight}, 800);
    reveal_box.addClass('unfold');
    $(this).hide();
  });

  //Show appointment date & time picker if check the checkbox
  const appointment_checkbox = $('#FlagContactAccept');
  const appointment_box = $('#appointment_box');
  appointment_checkbox.on('change', function () {
    let openAppointmentBox = $(this).is(':checked');
    if (openAppointmentBox) {
      appointment_box.collapse('show');
    } else {
      appointment_box.collapse('hide');
    }
  });
});
