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

    $('#carousel-mobile').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 110,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    $('#slider2').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel2"
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

    $('#carousel-mobile2').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 110,
        itemMargin: 5,
        asNavFor: '#slider2'
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

$('.tab-bar a.to-gallery1').on('shown.bs.tab', function(event){
    $('#slider').resize();
    $('#carousel').resize();
    $('#carousel-mobile').resize();
});
$('.tab-bar a.to-gallery2').on('shown.bs.tab', function(event){
    $('#slider2').resize();
    $('#carousel2').resize();
    $('#carousel-mobile2').resize();
});

$(window).scroll(function(d,h) {

    z = $(window).scrollTop() ;
    if (z >= ($(".hilight-item1").offset().top - $(window).height() + 100)){
        $(".hilight-item1").addClass('active');
        $(".hilight-item1").delay(200).queue(function() {
            $(".hilight-item2").addClass('active');
            $(".hilight-item2").delay(200).queue(function() {
                $(".hilight-item3").addClass('active');
                $(".hilight-item3").delay(200).queue(function() {
                    $(".hilight-item4").addClass('active');
                    $(".hilight-item3").dequeue();
                });
                $(".hilight-item2").dequeue();
            });
            $(".hilight-item1").dequeue();
        });
    }
    if (z >= ($(".hilight-item5").offset().top - $(window).height() + 100)){
        $(".hilight-item5").addClass('active');
        $(".hilight-item5").delay(200).queue(function() {
            $(".hilight-item6").addClass('active');
            $(".hilight-item6").delay(200).queue(function() {
                $(".hilight-item7").addClass('active');
                $(".hilight-item7").delay(200).queue(function() {
                    $(".hilight-item8").addClass('active');
                    $(".hilight-item7").dequeue();
                });
                $(".hilight-item6").dequeue();
            });
            $(".hilight-item5").dequeue();
        });
    }
    if (z >= ($(".hilight-item9").offset().top - $(window).height() + 100)){
        $(".hilight-item9").addClass('active');
        $(".hilight-item9").delay(200).queue(function() {
            $(".hilight-item10").addClass('active');
            $(".hilight-item10").delay(200).queue(function() {
                $(".hilight-item11").addClass('active');
                $(".hilight-item11").delay(200).queue(function() {
                    $(".hilight-item12").addClass('active');
                    $(".hilight-item11").dequeue();
                });
                $(".hilight-item10").dequeue();
            });
            $(".hilight-item9").dequeue();
        });
    }
    if (z >= ($(".hilight-item13").offset().top - $(window).height() + 100)){
        $(".hilight-item13").addClass('active');
        $(".hilight-item13").delay(200).queue(function() {
            $(".hilight-item14").addClass('active');
            $(".hilight-item14").delay(200).queue(function() {
                $(".hilight-item15").addClass('active');
                $(".hilight-item15").delay(200).queue(function() {
                    $(".hilight-item16").addClass('active');
                    $(".hilight-item15").dequeue();
                });
                $(".hilight-item14").dequeue();
            });
            $(".hilight-item13").dequeue();
        });
    }


    if (z < $( window ).height())
    {

    }
});
