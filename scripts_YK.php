<script src="BNG.header_YK.js"></script>
<script src="https://kit.fontawesome.com/57aa3e59b9.js" crossorigin="anonymous"></script>
<script src="<?= WEB_ROOT ?>/js/jquery-3.6.0.js"></script>
<script src="<?= WEB_ROOT ?>/bootstrap-4.6.0-dist/js/bootstrap.bundle.js"></script>
<script src="<?= WEB_ROOT ?>/js/BNG_header_Vv.js"></script>
<script src="jquery-3.6.0_YK.js"></script>


<script src="./jQuery-Plugin-For-Beautifying-Checkboxes-Radio-Buttons-iCheck/icheck.min.js"></script>
<link rel="stylesheet" href="./jQuery-Plugin-For-Beautifying-Checkboxes-Radio-Buttons-iCheck/skins/square/orange.css">›


<script>
    $(document).ready(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-orange',
            radioClass: 'iradio_square-orange',
            increaseArea: '20%' // optional
        });
    });
</script>





<script>
    $('body').click(function() {
        console.log('body click');
        $('.dropDownAccountVv').addClass('hide');
        $('.memberVvSubMenu').addClass('hide');
        $('.dropDownCartVv').addClass('hide');
        $('.dropDownMenuVv').addClass('hide');
    })

    $('.accountIconVv').click(function() {
        event.stopPropagation();
        console.log('accountIconVv click');
        $('.dropDownAccountVv').removeClass('cartShow').removeClass('menuShow');

        $('.dropDownAccountVv').toggleClass('hide');

        $('.dropDownCartVv').addClass('hide').addClass('accountShow');
        $('.dropDownMenuVv').addClass('hide').addClass('accountShow');
    })

    $('.memberVv').click(function() {
        event.stopPropagation();
        console.log('memberVv click');
        $('.memberVvSubMenu').toggleClass('hide');
        $('.plusIcon').toggleClass('minus');

    })

    $('.cartIconVv').click(function() {
        event.stopPropagation();
        console.log('cartIconVv');

        // $('.dropDownMenuVv').addClass('cartShow');
        $('.dropDownCartVv').removeClass('accountShow').removeClass('menuShow');
        $('.dropDownCartVv').toggleClass('hide');
        $('.dropDownAccountVv').addClass('hide').addClass('cartShow');
        $('.dropDownMenuVv').addClass('hide').addClass('cartShow');
    })

    $('.menuIconVv').click(function() {
        event.stopPropagation();
        $('.dropDownMenuVv').removeClass('accountShow').removeClass('cartShow');
        $('.dropDownMenuVv').toggleClass('hide');
        $('.dropDownAccountVv').addClass('hide').addClass('menuShow');
        $('.dropDownCartVv').addClass('hide').addClass('menuShow');
    })

    // let scrollLast = 0;

    // $(window).scroll(function () {
    //     console.log('scroll top', $(this).scrollTop());
    //     let scrollNow = $(this).scrollTop();


    //     if (scrollNow <= 300) {
    //         $('.navBarOutVv').removeClass('hideNav');
    //     }
    //     else {
    //         if (scrollLast < scrollNow) {
    //             console.log('往下');
    //             $('.navBarOutVv').addClass('hideNav');
    //         }
    //         else {
    //             console.log('往上');
    //             $('.navBarOutVv').removeClass('hideNav');
    //         }
    //     }
    //     scrollLast = scrollNow;
    // })
</script>