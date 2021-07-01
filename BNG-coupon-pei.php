<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '優惠券'; //可將BNG改寫為自己頁面的名稱

if (!isset($_SESSION['user'])) {
    //redirect visitor to Login page
    header('Location: member_at_login_YCN.php');
    exit;
};

?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>

<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/css/BNG-coupon-pei.css">
<title>coupon</title>
</head>
<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php'; ?>

<!-- 以下為五顆按鈕 -->
<div class="couponlistPei">

    <div class="dialogboxPei">
        <img src="./img/images-pei/dialogboxPei.png" alt="">
        <p class="dialogTxtPei">會員中心</p>
    </div>

    <div class="centreBtPei">

        <div class="personPei">
            <div class="personImgPei">
                <img id="personImgPei" src="./img/images-pei/personal.svg" alt="">
            </div>
            <p>個人頁面</p>
        </div>

        <div class="friendsPei">
            <div class="friendsImgPei">
                <img id="friendsImgPei" src="./img/images-pei/friends.svg" alt="">
            </div>
            <p>好友</p>
        </div>

        <div class="mailrPei">
            <div class="mailImgPei">
                <img id="mailImgPei" src="./img/images-pei/mail.svg" alt="">
            </div>
            <p>信件</p>
        </div>

        <div class="couponPei">
            <div class="couponImgPei">
                <img id="couponImgPei" src="./img/images-pei/coupon.svg" alt="">
            </div>
            <p>優惠券</p>
        </div>

        <div class="historicalOrdersPei">
            <div class="historicalOrdersImgPei">
                <img id="historicalOrdersImgPei" src="./img/images-pei/historical-orders-pei.svg" alt="">

            </div>
            <p>歷史訂單</p>
        </div>





    </div>
</div>

<!-- 以下為優惠券 -->
<div class="ticketPei">
    <div class="couponBoxPei">
        <!-- web -->
        <div class="couponPei d-none d-sm-block">
            <img src="./img/images-pei/ticket.png" alt="">
        </div>

        <div class="pdcouponPei d-none d-sm-block">
            <img src="<?php echo WEB_ROOT; ?>/img/tours/T06E203.jpg" alt="">
        </div>

        <!-- phone -->
        <div class="couponPhonePei d-block d-sm-none">
            <img src="./img/images-pei/phone-ticket.png" alt="">
        </div>


        <div class="couponNameBoxPei">
            <div class="couponNamePei">
                <h3>
                    關山環鎮自行車道<br>

                </h3>
            </div>

            <div class="couponIdBoxPei">
                <p class="couponIdPei">團號：T06E2</p>
                <p class="couponTimePei">有效期限：2022-07-15</p>
            </div>

            <div class="couponSalesBoxPei">
                <p class="couponSalesTxtPei"><span class="couponSalesPei">85</span>折 </p>
                <!-- <p class="couponSalesLeftTxtPei"> 剩餘 <span class="couponSalesLeftPei">3</span>張</p> -->
            </div>

            <div class="couponGiveBoxPei">
                <h6 class="couponGivePei">發送</h6>
            </div>

        </div>
    </div>


    <div class="couponBoxPei">
        <!-- web -->
        <div class="couponPei d-none d-sm-block">
            <img src="./img/images-pei/ticket.png" alt="">
        </div>

        <div class="pdcouponPei d-none d-sm-block">
            <img src="<?php echo WEB_ROOT; ?>/img/tours/T19E302.jpg" alt="">
        </div>

        <!-- phone -->
        <div class="couponPhonePei d-block d-sm-none">
            <img src="./img/images-pei/phone-ticket.png" alt="">
        </div>


        <div class="couponNameBoxPei">
            <div class="couponNamePei">
                <h3>
                    花東美景溫泉行旅<br>

                </h3>
            </div>

            <div class="couponIdBoxPei">
                <p class="couponIdPei">團號：T19E3</p>
                <p class="couponTimePei">有效期限：2022-05-01</p>
            </div>

            <div class="couponSalesBoxPei">
                <p class="couponSalesTxtPei"><span class="couponSalesPei">85</span>折 </p>
                <!-- <p class="couponSalesLeftTxtPei"> 剩餘 <span class="couponSalesLeftPei">3</span>張</p> -->
            </div>

            <div class="couponGiveBoxPei">
                <h6 class="couponGivePei">發送</h6>
            </div>

        </div>
    </div>


    <div class="couponBoxPei">
        <!-- web -->
        <!-- <div class="couponPei d-none d-sm-block">
            <img src="./img/images-pei/ticket.png" alt="">
        </div>

        <div class="pdcouponPei d-none d-sm-block">
            <img src="./img/images-pei/pdcoupon-01.png" alt="">
        </div> -->

        <!-- phone -->
        <!-- <div class="couponPhonePei d-block d-sm-none">
            <img src="./img/images-pei/phone-ticket.png" alt="">
        </div> -->


        <!-- <div class="couponNameBoxPei">
            <div class="couponNamePei">
                <h3>
                    舊山線自行車．<br>
                    浪漫桐花客家庄2日「休閒型」
                </h3>
            </div>

            <div class="couponIdBoxPei">
                <p class="couponIdPei">團號：123456789</p>
                <p class="couponTimePei">有效期限：2022-05-01</p>
            </div>

            <div class="couponSalesBoxPei">
                <p class="couponSalesTxtPei"><span class="couponSalesPei">85</span>折 </p>
                <p class="couponSalesLeftTxtPei"> 剩餘 <span class="couponSalesLeftPei">3</span>張</p>
            </div>

            <div class="couponGiveBoxPei">
                <h6 class="couponGivePei">發送</h6>
            </div>

        </div> -->
    </div>





</div>

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script>
    // 以下為改變五顆按鈕顏色
    // $('#personImgPei').mouseenter(function () {
    //     $('.centreBtPei img').each(function () {
    //         $(this).attr('src', $(this).attr('src').replace('-check', ''));
    //     })
    //     $('#personImgPei').attr('src', './images-pei/personal-check.svg')
    // })

    // $('#friendsImgPei').mouseenter(function () {
    //     $('.centreBtPei img').each(function () {
    //         $(this).attr('src', $(this).attr('src').replace('-check', ''));
    //     })
    //     $('#friendsImgPei').attr('src', './images-pei/friends-check.svg')
    // })

    // $('#mailImgPei').mouseenter(function () {
    //     $('.centreBtPei img').each(function () {
    //         $(this).attr('src', $(this).attr('src').replace('-check', ''));
    //     })
    //     $('#mailImgPei').attr('src', './images-pei/mail-check.svg')
    // })

    // $('#couponImgPei').mouseenter(function () {
    //     $('.centreBtPei img').each(function () {
    //         $(this).attr('src', $(this).attr('src').replace('-check', ''));
    //     })
    //     $('#couponImgPei').attr('src', './images-pei/coupon-check.svg')
    // })

    // $('#historicalOrdersImgPei').mouseenter(function () {
    //     $('.centreBtPei img').each(function () {
    //         $(this).attr('src', $(this).attr('src').replace('-check', ''));
    //     })
    //     $('#historicalOrdersImgPei').attr('src', './images-pei/historical-orders-pei-check.svg')
    // })


    //Set 'shop history icon' as orange when loading the page -- code added by YCN
    $('#couponImgPei').attr('src', './img/images-pei/coupon-check.svg');

    //orignial code by Pei:
    $('#personImgPei').click(function() {
        $('.centreBtPei img').each(function() {
            $(this).attr('src', $(this).attr('src').replace('-check', ''));
        })
        $('#personImgPei').attr('src', './img/images-pei/personal-check.svg')
    })

    $('#friendsImgPei').click(function() {
        $('.centreBtPei img').each(function() {
            $(this).attr('src', $(this).attr('src').replace('-check', ''));
        })
        $('#friendsImgPei').attr('src', './img/images-pei/friends-check.svg')
    })

    $('#mailImgPei').click(function() {
        $('.centreBtPei img').each(function() {
            $(this).attr('src', $(this).attr('src').replace('-check', ''));
        })
        $('#mailImgPei').attr('src', './img/images-pei/mail-check.svg')
    })

    $('#couponImgPei').click(function() {
        $('.centreBtPei img').each(function() {
            $(this).attr('src', $(this).attr('src').replace('-check', ''));
        })
        $('#couponImgPei').attr('src', './img/images-pei/coupon-check.svg')
    })

    $('#historicalOrdersImgPei').click(function() {
        $('.centreBtPei img').each(function() {
            $(this).attr('src', $(this).attr('src').replace('-check', ''));
        })
        $('#historicalOrdersImgPei').attr('src', './img/images-pei/historical-orders-pei-check.svg')
    })


    //Setting up Icon links:
    let profileIcon = document.querySelectorAll("div.personPei")[0];
    profileIcon.addEventListener("click", () => {
        window.location = "<?php echo WEB_ROOT; ?>/member_profile_YCN.php";
    });

    let friendIcon = document.querySelectorAll("div.friendsPei")[0];
    friendIcon.addEventListener("click", () => {
        window.location = "<?php echo WEB_ROOT; ?>/member_friendList_YCN.php";
    });

    let mailIcon = document.querySelectorAll("div.mailrPei")[0];
    mailIcon.addEventListener("click", () => {
        window.location = "<?php echo WEB_ROOT; ?>/member_inbox_YCN.php";
    });

    let couponIcon = document.querySelectorAll("div.couponPei")[0];
    couponIcon.addEventListener("click", () => {
        window.location = "<?php echo WEB_ROOT; ?>/BNG-coupon-pei.php";
    });

    let myOrdersIcon = document.querySelectorAll("div.historicalOrdersPei")[0];
    myOrdersIcon.addEventListener("click", () => {
        window.location = "<?php echo WEB_ROOT; ?>/BNG-myorders_cm.php";
    });
</script>
<?php include  __DIR__ . '/parts/BNG_html_foot.php'; ?>