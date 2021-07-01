
// 以下為navBar下拉選單
$('body').click(function () {
    console.log('body click');
    $('.dropDownAccountVv').addClass('hide');
    $('.memberVvSubMenu').addClass('hide');
    $('.dropDownCartVv').addClass('hide');
    $('.dropDownMenuVv').addClass('hide');
    $('.dropDownAccountVv').removeClass('dropDownAccountVvTotalHeightVv');
    $('.plusIcon').removeClass('minus');
    $('#accountIconVv').attr('src', './img/account.svg');
    $('#cartIconVv').attr('src', './img/cart.svg');

})

$('.accountIconVv').click(function () {
    event.stopPropagation();
    console.log('accountIconVv click');
    $('.dropDownAccountVv').removeClass('cartShow').removeClass('menuShow');

    $('.dropDownAccountVv').toggleClass('hide');

    $('.dropDownCartVv').addClass('hide').addClass('accountShow');
    $('.dropDownMenuVv').addClass('hide').addClass('accountShow');
    $('.dropDownAccountVv').removeClass('dropDownAccountVvTotalHeightVv');
    $('.plusIcon').removeClass('minus');
    $('#accountIconVv').attr('src', './img/accountOrange.svg');
    $('#cartIconVv').attr('src', './img/cart.svg');
})



// $('.memberVv').click(function () {
//     event.stopPropagation();
//     console.log('memberVv click');
//     $('.memberVvSubMenu').toggleClass('hide');
//     $('.plusIcon').toggleClass('minus');
//     $('.dropDownAccountVv').toggleClass('dropDownAccountVvTotalHeightVv')
// })

$('.cartIconVv').click(function () {
    event.stopPropagation();
    console.log('cartIconVv');
    // $('.dropDownMenuVv').addClass('cartShow');
    $('.dropDownCartVv').removeClass('accountShow').removeClass('menuShow');
    $('.dropDownCartVv').toggleClass('hide');
    $('.dropDownAccountVv').addClass('hide').addClass('cartShow');
    $('.dropDownMenuVv').addClass('hide').addClass('cartShow');
    $('.dropDownAccountVv').removeClass('dropDownAccountVvTotalHeightVv');
    $('.plusIcon').removeClass('minus');
    $('#cartIconVv').attr('src', './img/cartOrange.svg');
    $('#accountIconVv').attr('src', './img/account.svg');
})




$('.menuIconVv').click(function () {
    event.stopPropagation();
    $('.dropDownMenuVv').removeClass('accountShow').removeClass('cartShow');
    $('.dropDownMenuVv').toggleClass('hide');
    $('.dropDownAccountVv').addClass('hide').addClass('menuShow');
    $('.dropDownCartVv').addClass('hide').addClass('menuShow');
    $('.dropDownAccountVv').removeClass('dropDownAccountVvTotalHeightVv');
    $('.plusIcon').removeClass('minus');
})

// 以下為navBar fixed and show/hide
let scrollLast = 0;

$(window).scroll(function () {
    // console.log('scroll top', $(this).scrollTop());
    let scrollNow = $(this).scrollTop();


    if (scrollNow <= 300) {
        $('.navBarOutVv').removeClass('hideNav');
    }
    else {
        if (scrollLast < scrollNow) {
            // console.log('往下');
            $('.navBarOutVv').addClass('hideNav');
        }
        else {
            // console.log('往上');
            $('.navBarOutVv').removeClass('hideNav');
        }
    }
    scrollLast = scrollNow;
})

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

