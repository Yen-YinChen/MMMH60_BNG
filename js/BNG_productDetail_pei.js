// 以下為看完整行程表
const openDetal = document.getElementById("showDayDetaiPei");
const openDetalHeight = $('#showDayDetaiPei').height();
$('#showDayDetaiPei').height(0)
console.log('openDetalHeight', openDetalHeight);

let openDetalPeiPosition = 0;


$(window).resize(function () {
    // $('#showDayDetaiPei').height('100%');
    // openDetalHeight = $('#showDayDetaiPei').height();
    // if ($('#showDayDetaiPei').height() === 0) {
    //     $('#showDayDetaiPei').css('transition', '1s').height('2000px');
    // }

})

$('#showDayDetaiPei').on('transitionend', function () {
    console.log('hi');
    if ($('#showDayDetaiPei').height() !== 0) {
        $('#showDayDetaiPei').css('transition', '1s').height('100%');
    }
    else {
        $('html, body').animate({ scrollTop: $('.descriptionPei').offset().top }, 500);
    }

})


function openDetalPei() {
    if ($('#showDayDetaiPei').height() === 0) {
        $(".detalPei").html('收起行程表\n<i class="fas fa-angle-up"></i>');
        $('#showDayDetaiPei').css('transition', '1s').height('2000px');

        openDetalPeiPosition = $(document).scrollTop();
    }
    else {
        openDetalPeiPosition = 0;
        $(".detalPei").html('看完整行程表\n<i class="fas fa-angle-down"></i>');


        $('#showDayDetaiPei').css('transition', '.3s').height('0')
    }

    // let openDetal = document.getElementById("showDayDetaiPei");

    // openDetal.classList.toggle("extendDayDetaiPei");
}



function closeDetalPei() {
    $(".detalPei").html('看完整行程表\n<i class="fas fa-angle-down"></i>');


    $('#showDayDetaiPei').css('transition', '0.1s').height(0);




    // let closeDetal = document.getElementById("showDayDetaiPei");

    // openDetal.classList.toggle("closeDayDetaiPei");
}




// 以下為timeline效果
$(window).scroll(function () {
    console.log('$(document).scrollTop', $(document).scrollTop());

    // 行程展開
    if (openDetalPeiPosition !== 0) {
        // 第一天的橘色線條
        $('.card-body-timeline-day1').css('height', -50 + $(document).scrollTop() - openDetalPeiPosition + 'px');

        // 第二天的橘色線條
        $('.card-body-timeline-day2').css('height', -2000 + $(document).scrollTop() - openDetalPeiPosition + 'px');

        // 第三天的橘色線條
        $('.card-body-timeline-day3').css('height', -3950 + $(document).scrollTop() - openDetalPeiPosition + 'px');

        // 第四天的橘色線條
        $('.card-body-timeline-day4').css('height', -5900 + $(document).scrollTop() - openDetalPeiPosition + 'px');

        // 第五天的橘色線條
        $('.card-body-timeline-day5').css('height', -7850 + $(document).scrollTop() - openDetalPeiPosition + 'px');

    }

    // 橘色線條超過第一天灰色線條底部時，不再繼續長高
    if ($('.card-body-timeline-day1').height() >= $('.timeline').eq(0).outerHeight()) {
        $('.card-body-timeline-day1').height($('.timeline').eq(0).outerHeight())
    }

    // 橘色線條超過第二天灰色線條底部時，不再繼續長高
    if ($('.card-body-timeline-day2').height() >= $('.timeline').eq(1).outerHeight()) {
        $('.card-body-timeline-day2').height($('.timeline').eq(1).outerHeight())
    }

    // 橘色線條超過第三天灰色線條底部時，不再繼續長高
    if ($('.card-body-timeline-day3').height() >= $('.timeline').eq(2).outerHeight()) {
        $('.card-body-timeline-day3').height($('.timeline').eq(2).outerHeight())
    }

    // 橘色線條超過第四天灰色線條底部時，不再繼續長高
    if ($('.card-body-timeline-day4').height() >= $('.timeline').eq(3).outerHeight()) {
        $('.card-body-timeline-day4').height($('.timeline').eq(3).outerHeight())
    }

    // 橘色線條超過第五天灰色線條底部時，不再繼續長高
    if ($('.card-body-timeline-day5').height() >= $('.timeline').eq(4).outerHeight()) {
        $('.card-body-timeline-day5').height($('.timeline').eq(4).outerHeight())
    }





    // 第一天行程的圓圈變色
    if (parseInt($('.card-body-timeline-day1').css('height')) >= 25) {
        $('.eventdotPei').eq(0).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(0).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day1').css('height')) >= 100) {
        $('.eventdotPei').eq(1).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(1).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day1').css('height')) >= 600) {
        $('.eventdotPei').eq(2).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(2).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day1').css('height')) >= 1100) {
        $('.eventdotPei').eq(3).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(3).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day1').css('height')) >= 1600) {
        $('.eventdotPei').eq(4).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(4).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }




    // 第二天行程的圓圈變色
    if (parseInt($('.card-body-timeline-day2').css('height')) >= 25) {
        $('.eventdotPei').eq(5).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(5).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day2').css('height')) >= 100) {
        $('.eventdotPei').eq(6).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(6).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day2').css('height')) >= 600) {
        $('.eventdotPei').eq(7).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(7).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day2').css('height')) >= 1100) {
        $('.eventdotPei').eq(8).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(8).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day2').css('height')) >= 1600) {
        $('.eventdotPei').eq(9).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(9).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }



    // 第三天行程的圓圈變色
    if (parseInt($('.card-body-timeline-day3').css('height')) >= 25) {
        $('.eventdotPei').eq(10).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(10).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day3').css('height')) >= 100) {
        $('.eventdotPei').eq(11).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(11).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day3').css('height')) >= 600) {
        $('.eventdotPei').eq(12).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(12).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day3').css('height')) >= 1100) {
        $('.eventdotPei').eq(13).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(13).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day3').css('height')) >= 1600) {
        $('.eventdotPei').eq(14).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(14).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    // 第四天行程的圓圈變色
    if (parseInt($('.card-body-timeline-day4').css('height')) >= 25) {
        $('.eventdotPei').eq(15).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(15).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day4').css('height')) >= 100) {
        $('.eventdotPei').eq(16).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(16).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day4').css('height')) >= 600) {
        $('.eventdotPei').eq(17).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(17).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day4').css('height')) >= 1100) {
        $('.eventdotPei').eq(18).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(18).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day4').css('height')) >= 1600) {
        $('.eventdotPei').eq(19).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(19).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    // 第五天行程的圓圈變色
    if (parseInt($('.card-body-timeline-day5').css('height')) >= 25) {
        $('.eventdotPei').eq(20).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(20).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day5').css('height')) >= 100) {
        $('.eventdotPei').eq(21).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(21).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day5').css('height')) >= 600) {
        $('.eventdotPei').eq(22).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(22).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day5').css('height')) >= 1100) {
        $('.eventdotPei').eq(23).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(23).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

    if (parseInt($('.card-body-timeline-day5').css('height')) >= 1600) {
        $('.eventdotPei').eq(24).addClass('active').addClass('animate__animated animate__bounceIn');
    }
    else {
        $('.eventdotPei').eq(24).removeClass('active').removeClass('animate__animated animate__bounceIn');
    }

})


