



$(document).ready(function(){

	$('.burger-icon').click(function(){
		$('.burger-menu').slideToggle(200);
	})


	$('#myTabs a').click(function (e) {
	e.preventDefault()
		$(this).tab('show');
	});

	$('#planBut a').eq(0).click(function (e) {
	e.preventDefault()
		$(this).tab('show');
		floor_show();
	});
	$('#planBut a').eq(1).click(function (e) {
	e.preventDefault()
		$(this).tab('show');
		unit_show();
	});

	function floor_show(){
		$('.fl-select').css('display','inline-block');
		$('.u-select').css('display','none');
	}
	function unit_show(){
		$('.fl-select').css('display','none');
		$('.u-select').css('display','inline-block');
	}

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
