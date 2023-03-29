$(function(){

  //Change Floor plan when select
  var planSelector = $('#house-plan-selector');
  var destFloorImg = $('#plan-image-area');

  planSelector.on('change', function () {
    var img = $(this).val();
    destFloorImg.attr('src', img);
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

  $('.gallery-image-small').on('click', function(e) {
    var imageURL = $(this).find('img').attr('src');
    console.log(imageURL);
    $('.gallery-main-thumb').css('background-image', 'url('+imageURL+')');
  });

  //Slick Video (if have more than one video on page)
  var videoSlider = $('#project-videos').find('.video-slide');
  if(videoSlider) {
    videoSlider.slick();
  }

  let gallery_count = $('#galleries .tab-content .tab-pane').length;
  let galleryThumbs = [];
  let galleryTop = [];
  let galleries = [];
  for (let i=1;i <= gallery_count; i++) {
    console.log($('#gallery-top-'+i));
    console.log($('#gallery-thumbs-'+i));
    $('#gallery-top-'+i).slick({
      slidesToShow: 1,
      infinite: true,
      arrows: false,
      asNavFor: $('#gallery-thumbs-'+i)
    });
    $('#gallery-thumbs-'+i).slick({
      slidesToShow: 5,
      infinite: true,
      focusOnSelect: true,
      asNavFor: $('#gallery-top-'+i),
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="background-image: url(https://assetwise.co.th/migrate/wp-content/themes/assetwise/images/ico/left-arrow-white.png);"></button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="background-image: url(https://assetwise.co.th/migrate/wp-content/themes/assetwise/images/ico/right-arrow-white.png);"></button>'
    });
  }

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
  $('#utm_source').val($.urlParam('utm_source'));
  $('#utm_medium').val($.urlParam('utm_medium'));
  $('#utm_campaign').val($.urlParam('utm_campaign'));
  $('#utm_term').val($.urlParam('utm_term'));
  $('#utm_content').val($.urlParam('utm_content'));

});