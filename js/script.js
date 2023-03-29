$(function () {
  //Vars
  let menuToggle = $(".line-1 .menu-toggle");
  let bottomBanner = $("#bottom-banner");
  let topSlider = $("#top-slider");
  let homeTabContent = $(".tab-pane");
  let mainGallery = $("#main-gallery");
  let projectsFilterSlider = $(".logo-slider");
  let currentS = 0;
  let aboutUsGallery = $('#gallery').find('.about-gallery-slide-wrapper');
  let registerForm = $('#reg-form');

  function goToThankyouPage() {
    let currentLocation = window.location.href;
    let c = currentLocation.split('/');
    c.splice(-1, 1);
    c = c.join('/');
    if(currentLocation.indexOf('lang=en') !== -1) {
      document.location.href = c + '/thank-you/?lang=en';
    } else if (currentLocation.indexOf('lang=zh') !== -1) {
      document.location.href = c + '/thank-you/?lang=zh-hans';
    } else {
      console.log(c + '/thank-you/');
      document.location.href = c + '/thank-you/';
    }
  }

  //Define demo user
  let getUrlParameter = function getUrlParameter(sParam) {
    let sPageURL = window.location.search.substring(1),
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

  let isDemo = getUrlParameter('test');
  let demoForm = $('form');

  //Set Demo User details
  if(isDemo === '1') {
    demoForm.find('#name').val('upztest');
    demoForm.find('#surname').val('upztest');
    demoForm.find('#tel').val('0899999999');
    demoForm.find('#email').val('kritsada@uppercuz.com');
  }

  //Project Register
  //----------------
  registerForm.submit(function (e) {
    e.preventDefault();

    let name = $('#name').val();
    let surname = $('#surname').val();
    let tel = $('#tel').val();
    let email = $('#email').val();
    let ref = $('#ref').val();
    let property = $('#property').val();
    let propertyName = $('#propertyName').val();
    let sendSMS = $('#isSendSms').val();
    let smsText = $('#sms_text').val();
    let smsSender = $('#sms_sender').val();
    let projectName = $('#smsProjectName').val();
    let projectCode = $('#project-code').val();
    let projectDesc = $('#smsProjectDesc').val();
    let projectLineAt = $('#smsLineAt').val();
    let projectTel = $('#smsTel').val();
    let thankyouImageLink = $('#thanksImageLink').val();
    let priceRange = $('#priceRangeVal').val();
    let roomType = $('#roomTypeVal').val();
    //let gResponse = grecaptcha.getResponse();

    let refId;

    if(ref === 'Direct') {
      refId = 1; // Direct source
    } else {
      refId = 2; // Other source
    }

    let mailingList = '';
    if ($('#mailingList').val() !== '') {
      //console.log(mailingList);
      mailingList = $('#mailingList').val().split(",");
    } else {
      mailingList = "dev@uppercuz.com";
    }

    let dataJSON = {};

    if (sendSMS === 'yes') {
      dataJSON = {
        'action': 'submit_register',
        'projectCode' : projectCode,
        'refId' : refId,
        'name': name,
        'surname': surname,
        'tel': tel,
        'email': email,
        'ref': ref,
        'property': property,
        'sendSMS': 'yes',
        'smsText': smsText,
        'smsSender': smsSender,
        'propertyName': propertyName,
        'mailingList': mailingList,
        'thankyouImageLink': thankyouImageLink,
        'priceRange' : priceRange,
        'roomType' : roomType,
        //'gResponse' : gResponse
      };
    }
    else {
      dataJSON = {
        'action': 'submit_register',
        'projectCode' : projectCode,
        'refId' : refId,
        'name': name,
        'surname': surname,
        'tel': tel,
        'email': email,
        'ref': ref,
        'property': property,
        'propertyName': propertyName,
        'sendSMS': 'no',
        'mailingList': mailingList,
        'thankyouImageLink': thankyouImageLink,
        'priceRange' : priceRange,
        'roomType' : roomType,
        //'gResponse' : gResponse
      };
    }

    $('.loading').fadeIn(200);
    $('button#submit').attr('disabled', true);

    $.ajax({
      cache: false,
      type: "POST",
      url: wp_ajax.ajax_url,
      data: dataJSON,
      success: function (response) {
        // console.log(response);
        // return false;
        goToThankyouPage();
      },
      error: function (xhr, status, error) {
        console.log('Status: ' + xhr.status);
        console.log('Error: ' + xhr.responseText);
      }
    });

    // if(gResponse !== '') {
    //   $('.loading').fadeIn(200);
    //   $('button#submit').attr('disabled', true);
    //
    //   $.ajax({
    //     cache: false,
    //     type: "POST",
    //     url: wp_ajax.ajax_url,
    //     data: dataJSON,
    //     success: function (response) {
    //       goToThankyouPage();
    //     },
    //     error: function (xhr, status, error) {
    //       console.log('Status: ' + xhr.status);
    //       console.log('Error: ' + xhr.responseText);
    //     }
    //   });
    // } else {
    //   Swal.fire({
    //     type: 'error',
    //     title: 'เกิดข้อผิดพลาด',
    //     text: 'กรุณายืนยันตัวตน'
    //   })
    // }
  });

  //AssetWise Club Load more
  let loadMoreBtn = $('button.loadmore-item');

  function loadClubItems(args) {
    let currentLoadMoreBtn = $('button.btn.loadmore-item');
    currentLoadMoreBtn.html('Loading...');
    jQuery.ajax({
      url: loadMore.ajax_url,
      type: "post",
      data: {
        action: "load_more",
        post_offset: args.offset,
        post_type: args.type,
        category_name: args.category
      },
      success: function (response) {
        if (response.data) {
          let dataObj = response.data;
          for (let i = 0, len = dataObj.length; i < len; i++) {
            let item = "";
            if(dataObj[i].post_type === 'blog') {
              item += "<div class='load_project news-item-container col-sm-4'>";
              item += "<a target='_blank' class='news-item' href='" + dataObj[i].permalink + "' title='" + dataObj[i].title + "'>";
              item += "<div class='news-img-container'><div class='news-img-inner' style='background-image: url(" + dataObj[i].thumbnail + ");'></div></div>";
              item += "<div class='desc-container'>";
              item += "<h2 class='head-text'>"+ dataObj[i].title +"</h2>";
              item += "<h3 class='date'>"+ dataObj[i].date +"</h3><div class='line'></div>";
              item += "<p>"+ dataObj[i].excerpt +"</p>";
              item += "</div></a>";
              item += "<div class='social-container'>";
              item += "<a class='share-twitter' target='_blank' href='https://twitter.com/share?url="+ dataObj[i].permalink +"'>";
              item += "<i class='fa fa-twitter' aria-hidden='true'></i></a>";
              item += "<a class='share-facebook' target='_blank' href='https://twitter.com/share?url="+ dataObj[i].permalink +"'>";
              item += "<i class='fa fa-facebook' aria-hidden='true'></i></a>";
              item += "</div>";
            } else {
              item += "<div class='load_project item col-sm-4'>";
              item += "<a target='_blank' href='" + dataObj[i].permalink + "' title='" + dataObj[i].title + "'>";
              item += "<div class='inner'>";
              item += "<div class='thumb' style='background-image: url("+ dataObj[i].thumbnail +");'></div>";
              item += "<div class='intro'>";
              item += "<span class='category'>" + dataObj[i].category[0].name + "</span>";
              item += "<h3 class='title'>" + dataObj[i].title + "</h3>";
              item += "<p class='date'>" + dataObj[i].date + "</p>";
              item += "<div class='line'></div>";
              item += "<p>" + dataObj[i].excerpt + "</p>";
              item += "</div></div></a></div>";
            }
            if(args.container === 'blog') {
              if (dataObj.length < 3) {
                $('#news').find(currentLoadMoreBtn).hide();
              }
              $('.blog.desktop').append(item);
            } else {
              $('.' + args.container + '.desktop').append(item);

              if (dataObj.length < 3) {
                $('.' + args.container).parent('.tab-pane.active').find(currentLoadMoreBtn).hide();
              }
            }
          }
        } else {
          currentLoadMoreBtn.hide();
        }
      },
      error: function (jqXHR, status, err) {
        console.log(jqXHR.responseText);
      },
      complete: function () {

        //Match Height of Existing items and new items
        if (args.container === 'blog') {
          $('.'+args.container+' .news-item').matchHeight({byRow: false});
        } else if (args.container === 'news-wrapper' || args.container === 'activity-wrapper' || args.container === 'privileges-wrapper') {
          $('.'+args.container+' .item .inner').matchHeight({byRow: false});
        }

        //Increase loaded count Value
        let post_offset = parseInt(args.offset);
        post_offset+=3;
        if(args.container === 'blog') {
          $('button[data-container="blog"]').attr('data-offset', post_offset);
        } else {
          $('.'+args.container).parent('.tab-pane').find(currentLoadMoreBtn).attr('data-offset', post_offset);
        }

        //Set Button text back
        currentLoadMoreBtn.html('Load More');

        //Scroll to new loaded items
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
      }
    }).fail(function (jqXHR, textStatus, error) {
      console.log("Post error: " + error);
    });
  }

  // Load more items when button clicked
  loadMoreBtn.on('click', function () {
    let args = {
      'type' : $(this).attr('data-post-type'),
      'category' : $(this).attr('data-cat'),
      'offset' : $(this).attr('data-offset'),
      'container' : $(this).attr('data-container')
    };
    //Call function to load more item based on Category
    loadClubItems(args);
  });

  $("#new_projects_load_more").click(function () {
    let post_offset = $("#new_projects").data("show");
    jQuery.ajax({
      url: newProjectsLoadmore.ajax_url,
      type: "post",
      data: {
        action: "new_projects_load_more",
        post_offset: post_offset
      },
      success: function (response) {
        console.log(response);
        $("#new_projects").find('.desktop-list').append(response);
        $(".loadproject").matchHeight();
      },
      error: function (jqXHR, status, err) {
        console.log(jqXHR.responseText);
      }
    }).fail(function (jqXHR, textStatus, error) {
      console.log("Post error: " + error);
    });
  });

  //Slick Content
  topSlider.slick({
    arrows: true,
    dots: true,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 6000,
    pauseOnFocus: true,
    lazyLoad: 'progressive',
    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg></button>',
    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg></button>'
  });

  homeTabContent.find(".mob-list").slick({
    arrows: true,
    dots: true
  });

  bottomBanner.find(".banner-wrapper.slide").slick({
    arrows: true,
    dots: true,
    autoPlay: true,
    autoplaySpeed: 3000,
    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg></button>',
    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg></button>'
  });

  function projects_list_slide_toggle($param) {
    if ($param === "on") {
      projectsFilterSlider.slick({
        slidesToShow: 3,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
          {
            breakpoint: 520,
            settings: {
              slidesToShow: 1,
              centerMode: true,
              focusOnSelect: true
            }
          }
        ]
      });
      if (currentS) {
        //console.log(currentS);
        projectsFilterSlider.slick('slickGoTo', currentS);
      } else {
        //console.log('no current slide record');
        projectsFilterSlider.slick('slickGoTo', 0);
      }
    } else if ($param === "off") {
      setTimeout(function () {
        projectsFilterSlider.slick('unslick');
      }, 300);
    }
  }

  mainGallery.slick();

  $("#news").find(".news-item-container").find("a.news-item").matchHeight();

  $("#club").find(".item").find(".inner").matchHeight();

  $("#home").find(".featured-news-item").matchHeight();

  $(".project").matchHeight({byRow:false});

  //Toggle Hamburger Menu
  menuToggle.click(function () {
    $(this).toggleClass("is-active", "");
    if ($(window).width() < 768) {
      $(".line-2").toggleClass("open", "");
    }
  });

  //Filter Manager
  let filterTabMenu = $("#condo_nav").find("a");
  let filterPane = $(".filter_area_pane");

  filterPane.hide();

  //Toggle Filter Pane when nav got click second times
  filterTabMenu.on('click', function (e) {
    let activeTab = $(($(e.target).attr('href')));
    if (activeTab.find(filterPane).is(':visible')) {
      activeTab.find(filterPane).slideUp();
    } else {
      activeTab.find(filterPane).slideDown();
    }
  });

  filterTabMenu.on('shown.bs.tab', function (e) {
    let activeTab = $(($(e.target).attr('href')));
    let prevTab = $(($(e.relatedTarget).attr('href')));

    activeTab.find(filterPane).slideDown();

    if (activeTab.find(projectsFilterSlider).length) {
      projects_list_slide_toggle('on');
    }

    prevTab.find(filterPane).hide();

    if (prevTab.find(projectsFilterSlider).length) {
      projects_list_slide_toggle('off');
    }
  });

  function fadeOutProjectItem(target) {
    let divs = target.find(".project");
    let index = 0;
    let delay = setInterval(function () {
      if (index <= divs.length) {
        $(divs[index]).addClass('not-show');
        index += 1;
      } else {
        clearInterval(delay);
      }
    }, 100);
  }

  function fadeInProjectItem(target) {
    let divs = target.find(".project.not-show");
    //console.log(divs);
    let index = 0;
    let delay = setInterval(function () {
      if (index <= divs.length) {
        $(divs[index]).removeClass('not-show');
        index += 1;
      } else {
        clearInterval(delay);
      }
    }, 200);
    setTimeout(function () {
      $('#filter_area.tab-pane .project .item-wrapper').matchHeight({byRows:false});
    }, divs.length*400);
  }

  //Slick When tab switch in Mobile screen
  if($(window).width() < 767) {
    $(".featured-news-wrapper").find(".row").slick({
      slidesToShow: 1,
      arrows: true,
      infinite: true,
      dots: true,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 2,
            arrows: false
          }
        },
        {
          breakpoint: 520,
          settings: {
            slidesToShow: 1,
            arrows: false
          }
        }
      ]
    });
  }

  if ($(window).width() < 520) {
    $(document).find(".desktop-list").slick({
      slidesToShow: 1,
      arrows: false,
      dots: true,
      infinite: true
    });

    //Slick News blog
    $("#blog").find("#news .mobile-blog").slick({
      slidesToShow: 1,
      arrows: true,
      infinite: true,
      dots: false,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg></button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg></button>',
    });

    $("#house").find("#house-listed").slick({
      slidesToShow: 1,
      arrows: false,
      infinite: true,
      dots: true
    });

    $("#assetwise-club").find(".tab-content .mob").slick({
      slidesToShow: 1,
      arrows: true,
      infinite: true,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"/></svg></button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"/></svg></button>',
    });

    $('#highlight').find('.highlight-wrapper').slick({
      slidesToShow: 1,
      arrows: false,
      infinite: true,
      dots: true
    })
  }

  //Get data when checkbox is checked
  filterPane.find("#filter_area_submit_btn").click(function () {
    $(".navbar-collapse").collapse('hide');
    let val = [];
    $(":checkbox:checked").each(function (i) {
      val[i] = $(this).val().toString();
    });

    let filterArea = $("#filter_area");

    $.ajax({
      url: callajax.ajax_url, // change callajax to url ajax to do
      type: 'post',
      data: {
        action: 'filterByLocations', // function to call
        val: val
      },
      beforeSend: function (xhr) {
        fadeOutProjectItem(filterArea);
        if ($(window).width() < 520) {
          filterArea.find(".desktop-list").slick("unslick");
        }
      },
      success: function (response) {
        filterArea.find(".desktop-list").html(response);
        fadeInProjectItem(filterArea);
        if ($(window).width() < 520) {
          filterArea.find(".desktop-list").slick({
            slidesToShow: 1,
            arrows: false,
            dots: true,
            infinite: true
          });
        }
        filterPane.slideUp();
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.responseText);
        console.log(thrownError);
      }
    });

  });

  //Close the filter pane
  let closeFilter = filterPane.find(".close");

  closeFilter.on("click touch", function () {
    closeFilter.parent().slideUp();
  });

  //Get Data When brand slider was changed
  projectsFilterSlider.on("afterChange", function (event, slick, currentSlide) {
    let brand = projectsFilterSlider.find(".slick-current").attr("data-name");
    let ourProjectsArea = $("#our_projects");
    currentS = currentSlide;
    //console.log(current);
    $(".navbar-collapse").collapse('hide');
    $.ajax({
      url: callajax.ajax_url, // change callajax to url ajax to do
      type: 'post',
      data: {
        action: 'filterByBrand', // function to call
        brand: brand
      },
      beforeSend: function (xhr) {
        fadeOutProjectItem(ourProjectsArea);
        if ($(window).width() < 520) {
          ourProjectsArea.find(".desktop-list").slick("unslick");
        }
      },
      success: function (response) {
        ourProjectsArea.find(".desktop-list").html(response);
        fadeInProjectItem(ourProjectsArea);
        if ($(window).width() < 520) {
          ourProjectsArea.find(".desktop-list").slick({
            slidesToShow: 1,
            arrows: false,
            dots: true,
            infinite: true
          });
        }
        //ourProjectsArea.find('.project a').matchHeight();
        filterPane.slideUp();
      },
      error: function (xhr, ajaxOptions, thrownError) {
        console.log(xhr.responseText);
        console.log(thrownError);
      }
    });
  });

  //Main projects page script
  // ------------------------

  //Top nav
  if($(window).width() < 480) {
    $('#project-top-listed').find('.slide-m').slick ({
      slidesToShow: 1,
      centerMode: true,
      focusOnSelect: true,
      variableWidth: true,
      autoplay: true,
      autoplaySpeed: 4000,
      infinite: true,
      arrows: false,
      dots: false
    });

    $('#our-projects').find('.row').slick({
      arrows: false,
      dots: true
    });
  }

  //Back to top
  let backToTopBtn = $('#back-to-top');
  backToTopBtn.on('click', function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });

  let docHeight = $(document).height();

  $(window).on('scroll', function (e) {
    if(($(window).scrollTop() + (docHeight/2)) > docHeight/2) {
      backToTopBtn.fadeIn();
    } else {
      backToTopBtn.fadeOut();
    }
  });

  let footer_toggle = $('#toggle-site-map');
  let footer_wrapper = $('#footer-wrapper');

  footer_toggle.on('click touch', function () {
    footer_wrapper.slideToggle();
    footer_toggle.toggleClass('active');
  });

  //Set Cookies
  let cookiePopup = $("#cookie-accept-popup");

  function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
  }

  if(getCookie('visited') === undefined || getCookie('visited') === '') {
    cookiePopup.show();
  }

  function setCookie() {
    if(getCookie('visited') === undefined || getCookie('visited') === '') {
      //console.log('cookie was not set');
      //cookiePopup.show();
      let now = new Date();
      let visitedTime = new Date();
      now.setMonth(now.getMonth()+1);

      document.cookie = "visited="+ visitedTime.toUTCString() +"; expires=" + now.toUTCString() + "; path=/";
    }
  }

  function delCookie(name) {
    document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  }

  $("#acceptCookie").on('click touch', function () {
    setCookie();
    cookiePopup.fadeOut(320);
  });

  $("#notAcceptCookie").on('click touch', function () {
    cookiePopup.fadeOut(320);
  });

  $("#acceptPolicyCheckbox").on("click touch", function (e) {
    e.preventDefault();
    return false;
  });
  
  $('#our-projects .our-project .details').matchHeight();

  //=== Smooth Scroll ===//
  // Select all links with hashes
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .not('#ability-calc-toggle')
    .not('#amount-calc-toggle')
    .not('#new_project_menu')
    .not('#ready_menu')
    .not('#filter_menu')
    .not('#our_project_menu')
    .not('[role=tab]')
    .not('[data-toggle=tab]')
    .not('.club-nav')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
        &&
        location.hostname === this.hostname
      ) {
        // Figure out element to scroll to
        let target = $(this.hash);
        //let offsetPageTop = 0;
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          // if ($(window).width() > 520) {
          //   offsetPageTop = target.offset().top - 150;
          // } else {
          //   offsetPageTop = target.offset().top - 150;
          // }
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top - 200
          }, 1000);
        }
      }
    });
});
