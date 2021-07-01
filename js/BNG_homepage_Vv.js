// 以下為banner輪播
let hpBannerVv = 0
let bannerWidthVv = $('.hpBannerWrapVv').width();
let myInterValvv;

$(window).resize(function () {
    bannerWidthVv = $('.hpBannerWrapVv').width();
    $('.imgWrapVv').css('left', hpBannerVv * - bannerWidthVv + 'px');
})

$('.hpSliderDotsVv li').eq(hpBannerVv).css('backgroundColor', '#FF7300').siblings().css('backgroundColor', 'rgba(256, 256, 256, 0.56)');

$('.hpSliderDotsVv li').hover(function () {
    hpBannerVv = $(this).index();

    $(this).css('backgroundColor', '#FF7300').siblings().css('backgroundColor', 'rgba(256, 256, 256, 0.56)');

    $('.imgWrapVv').css('left', $(this).index() * - bannerWidthVv + 'px');
});

$('.imgWrapVv li').click(function () {
    console.log($(this).index());
});

function startCarouselvv() {
    myInterValvv = setInterval(() => {
        hpBannerVv = hpBannerVv + 1;
        // console.log('hpBannerVv', hpBannerVv);
        if (hpBannerVv > 2) {
            hpBannerVv = 0;
        }

        changeCarouselViewvv();
    }, 2000);
}

startCarouselvv();

$('.hpBannerArrowLeftVv').click(function () {
    hpBannerVv--;
    if (hpBannerVv < 0) {
        hpBannerVv = 2;
    }
    changeCarouselViewvv()
    // console.log('hpBannerVv-1', (hpBannerVv))
})

$('.hpBannerArrowRightVv').click(function () {
    hpBannerVv++;
    if (hpBannerVv > 2) {
        hpBannerVv = 0;
    }
    changeCarouselViewvv();
    // console.log('hpBannerVv+1', (hpBannerVv))
})

$('.hpBannerWrapVv').mouseenter(function () {
    clearInterval(myInterValvv);
})

$('.hpBannerWrapVv').mouseleave(function () {
    startCarouselvv();
})

function changeCarouselViewvv() {
    $('.imgWrapVv').css('left', hpBannerVv * - bannerWidthVv + 'px');


    $('.hpSliderDotsVv li').eq(hpBannerVv).css('backgroundColor', '#FF7300').siblings().css('backgroundColor', 'rgba(256, 256, 256, 0.56)');
}

// $(window).scroll(function () {
//     console.log('windowHeight', $(window).height());
//     if ($(window).scrollTop() > $(window).height() * 1 / 2) {
//         $('.topButtonWrapVv').addClass('show');
//     }
//     else {
//         $('.topButtonWrapVv').removeClass('show');
//     };
// });


// 以下為topButton
$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        $('.topButtonWrapVv').addClass('show');
    }
    else {
        $('.topButtonWrapVv').removeClass('show');
    };
});

$('.topButtonWrapVv').click(function () {
    $('html, body').animate({ scrollTop: 0 }, '300')
    // console.log('topButtonWrapVv a click');
    // $('h1').html('從這開始放你的內123');
});



// 對話框動畫
// $(window).scroll(function () {
//     console.log('windowScrollTopVv', $(this).scrollTop());

//     if (scrollTop>=750){
//         $('.hpAboutContentWrapVv').css(trans)
//     }
// })

// $('.hpAboutUsVv .hpTitleMarkVv').offset(function () {
//     console.log($(this).offset());
// })


let totalHeightVv = $('body').height();
let sawHeightVv = $(window).height();

let intervalVv0;
let numberCountVv = 0;
let number0Vv = 9867;

let intervalVv1;
let numberCount1Vv = 0;
let number1Vv = 15248;

let intervalVv2;
let numberCount2Vv = 0;
let number2Vv = 2490;

$(window).scroll(function () {

    // console.log('scrollTop', $(this).scrollTop());
    // console.log('height', $(window).height());
    // console.log('%', Math.round($(this).scrollTop() / (totalHeightVv - sawHeightVv) * 100));

    // let width = Math.round($(this).scrollTop() / (totalHeightVv - sawHeightVv) * 100) + '%';
    // $('.progressBar').css('width', width);

    // 對話框動畫
    let windowScrollTopVvVv = $(this).scrollTop();
    let windowWidthVv = $(window).width();


    if (windowWidthVv > 576) {
        if (windowScrollTopVvVv > 750) {

            $('.hpAboutContentWrapVv').css('transform', 'translateX(0)')
        }


        else {
            $('.hpAboutContentWrapVv').css('transform', 'translateX(2000px)')
        }

    }
    else {
        $('.hpAboutContentWrapVv').css('transform', 'translateX(0)')
    }

    $(window).resize(function () {

        windowWidthVv = $(window).width();

        if (windowWidthVv > 576) {
            if (windowScrollTopVvVv > 750) {

                $('.hpAboutContentWrapVv').css('transition', '.3s').css('transform', 'translateX(0)')
            }


            else {
                $('.hpAboutContentWrapVv').css('transition', '.3s').css('transform', 'translateX(2000px)')
            }

        }
        else {
            $('.hpAboutContentWrapVv').css('transition', 'none').css('transform', 'translateX(0)')
        }

    });


    // 虛線背景動畫
    const scrollAndWindowHeightVv = $(this).scrollTop() + $(window).height();
    const navAndBannerHeightVv = $('.navBarOutVv').height() + $('.hpBannerWrapVv').height();

    if (scrollAndWindowHeightVv > navAndBannerHeightVv) {

        const dashedHeightVv = scrollAndWindowHeightVv - navAndBannerHeightVv - 200;

        $('.hpDashLineBgVv').css('height', dashedHeightVv + 'px');
    }

    // 數字自動增加動畫
    if (windowScrollTopVvVv > 5400) {

        clearInterval(intervalVv0);
        clearInterval(intervalVv1);
        clearInterval(intervalVv2);
        numberRun();
    }

    if (windowScrollTopVvVv < 5200) {
        numberCountVv = 0;
        numberCount1Vv = 0;
        numberCount2Vv = 0;
    }

})


function numberRun() {
    if (numberCountVv < number0Vv) {
        intervalVv0 = setInterval(() => {
            $('.hpNumberVv').eq(0).text(numberCountVv);
            numberCountVv += 168;
            if (numberCountVv > number0Vv) {
                clearInterval(intervalVv0);
            }
        }, 50);
    }

    if (numberCount1Vv < number1Vv) {
        intervalVv1 = setInterval(() => {
            $('.hpNumberVv').eq(1).text(numberCount1Vv);
            numberCount1Vv += 188;
            if (numberCount1Vv > number1Vv) {
                clearInterval(intervalVv1);
            }
        }, 50);
    }

    if (numberCount2Vv < number2Vv) {
        intervalVv2 = setInterval(() => {
            $('.hpNumberVv').eq(2).text(numberCount2Vv);
            numberCount2Vv += 38;
            if (numberCount2Vv > number2Vv) {
                clearInterval(intervalVv2);
            }
        }, 50);
    }


}






// <!--hpFriendCarouselVv -->


$('.hpFriendCarouselVv').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                dots: true,
                arrows: false
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: false
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});



// <!--hpReviewCarouselVv -->


$('.hpReviewCarouselVv').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 3,
    responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 3
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]
});



// google map 高度調整
$(document).ready(function () {
    console.log('hi', $('.hpContactUsFormVv').height());
    $("iframe").height($('.hpContactUsFormVv').height());
    // $("iframe").width($(window).width());

    $(window).resize(function () {
        $("iframe").height($('.hpContactUsFormVv').height());
        // $("iframe").width($(window).width());

    });
});

// 表單一鍵輸入
$('.hpDogWrapVv').click(function (event) {
    event.preventDefault();
    event.stopPropagation();
    $('#nameVv').val('Ivy');
    $('#contactVv').val('0988168888')
    $('#e-mailVv').val('imivy@gmail.com');
    $('#commentsVv').val('BikeNGo真的好棒!');
})

$('.hpSendButtonWrapVv').click(function () {
    $('#nameVv').val('');
    $('#contactVv').val('')
    $('#e-mailVv').val('');
    $('#commentsVv').val('');
    Swal.fire({
        position: 'center-center',
        icon: 'success',
        title: '您的建議我們收到了!',
        showConfirmButton: false,
        timer: 1500
    })
})