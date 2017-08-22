/**
 * Created by xxh on 2017/8/4.
 */


function KingSwape(paramObj) {
    $('.swape_box .btn').hide();
    $('.swape_box').hover(function () {
        $('.swape_box .btn').show();
        clearInterval(timer);
    }, function () {
        $('.swape_box .btn').hide();
        timeInterval();
    });

    var swape_box_width = $('.swape_box').width();
    var swape_box_height = $('.swape_box').height();
    var pos = 0;
    var width = swape_box_width;
    $('.swape_box img').width(width);
    var img_first = $('.swape_box  .img:first').clone();
    $('.swape_box .imgs').append(img_first);
    var img_cnt = $('.swape_box .img').size();
    for(var i=0; i < img_cnt - 1; i++) {
        var circle = '<div class="circle" data-rel="'+i +'"></div>';
        $('.swape_box .circles').append(circle);
    }

    showCircle();

    timeInterval();
    function timeInterval() {
        timer = setInterval(function () {
            pos--;
            move();
        }, paramObj.time);
    }

    function move() {
        if(pos == -img_cnt) {
            pos = -1;
            $('.swape_box .imgs').css({left: 0});
        }
        else if(pos == 1) {
            pos = -img_cnt + 2;
            $('.swape_box .imgs').css({left: (pos-1)*width});
        }

        $('.swape_box .imgs').animate({left: pos*width},500);
        showCircle();
    }

    function showCircle() {
        var idx = -pos;
        if(idx == img_cnt - 1)
            idx = 0;
        var circles = $('.swape_box .circle');
        $(circles).removeClass('active');
        var circle = circles[idx];
        $(circle).addClass('active');
    }
    $('.swape_box .left').click(function () {
        pos--;
        move();
    });

    $('.swape_box .right').click(function () {
        pos++;
        move();
    });

    $('.swape_box .circle').click(function () {
        pos = $(this).attr('data-rel');
        $('.swape_box .imgs').animate({left: -pos*width},500);
        pos=-pos;
        showCircle();
        //$('.imgs').css({left: -pos*width});

    });
}