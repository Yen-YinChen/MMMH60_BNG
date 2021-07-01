<?php include __DIR__. '/parts/config.php'; ?>
<?php
$title = '我的行程';
?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>
<link rel="stylesheet" href="<?php echo WEB_ROOT; ?>/css/BNG-mytourpage_cm.css">
</head>
<?php include __DIR__ . '/parts/BNG_navbar_topButton_VV.php'; ?>
<div class="contentCm d-none d-sm-block">
    <section class="mytourpage-sectionbg-cm d-none d-sm-block">
        <div class="container mytourpage-card-cm d-none d-sm-block">
            <div class="box mytourpage-box-cm">
                <div class="row">
                    <div class="item">
                        <button class="mytourpage-arrow-cm" onclick="myFunction()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg"></button>
                    </div>
                    <div class="item">
                        <h3 class="mytourpage-h3-cm">我的行程</h3>
                    </div>

                </div>

            </div>
        </div>

        <div class="content" id="content">
            <div class="container mytourpage-card1-cm d-none d-sm-block">
                <div class="box mytourpage-box-cm">
                    <div class="row">
                        <div class="col">
                            <div class="item mytourpage-imgitem-cm">
                            </div>
                        </div>

                        <div class="col-5 mytourpage-cl-cm">
                            <p class="mytourpage-title-cm">七星潭濱海自行車道</p>
                            <p class="mytourpage-detail-cm">去程 : 2021-07-15<span><span class="mytourpage-whiteword-cm">123</span> 回程 : 2021-07-16</span>
                            </p>
                            <p class="mytourpage-people-cm">人數 x 1</p>
                            <p class="mytourpage-amount-cm">總金額 TWD 2,550</p>
                        </div>

                        <div class="mytourpage-linedash-cm"></div>


                        <div class="col">
                            <div class="item mytourpage-itembtn-cm">
                                <button class="mytourpage-btn2-cm" onclick="sameTour();">查看同行車友</button>
                            </div>
                            <p class="mytourpage-myorderno-cm">訂單編號 :T05E20715</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<section class="d-block d-sm-none mytourpage-sectionbg-mb-cm">
    <div class="container mytourpage-card-mb-cm ">
        <div class="box">
            <div class="row mytourpage-r-mb-cm">
                <div class="item">
                    <button class="mytourpage-arrow-mb-cm" onclick="myFuntion()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimgmb"></button>
                </div>
                <div class="item">
                    <h3 class="mytourpage-h3-mb-cm">我的行程</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="content" id="contentmb">
        <div class="container mytourpage-card1-mb-cm">
            <div class="row mytourpage-row-mb-cm">
                <div class="col-7">
                    <p class="mytourpage-title-mb-cm">七星潭濱海自行車道</p>
                    <p class="mytourpage-detail-mb-cm">去程 : 2021-07-15 <br> 回程 : 2021-07-16</p>
                    <p class="mytourpage-myorderno-mb-cm">訂單編號 : T05E20715</p>
                </div>
                <div class="col-5">
                    <div class="item mytourpage-itembtn-mb-cm">
                        <button class="mytourpage-btn2-mb-cm" onclick="sameTour();">查看同行車友</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mytourpage-card1-mb-cm">
            <div class="row mytourpage-row-mb-cm">
                <div class="col-7">
                    <p class="mytourpage-title-mb-cm">花東美景溫泉行旅</p>
                    <p class="mytourpage-detail-mb-cm">去程 : 2021-08-19 <br> 回程 : 2021-08-21</p>
                    <p class="mytourpage-myorderno-mb-cm">訂單編號 : T19E30819</p>
                </div>
                <div class="col-5">
                    <div class="item mytourpage-itembtn-mb-cm">
                        <button class="mytourpage-btn2-mb-cm">查看同行車友</button>
                    </div>
                </div>
            </div>
        </div>




    </div>

</section>
<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>

<script src="<?php echo WEB_ROOT;?>/js/BNG-mytourpage_cm.js"></script>
<script>
    //link added by YCN
    function sameTour(){
        window.location = "<?php echo WEB_ROOT;?>/BNG-sametour_cm_.php"
    }

</script>
<?php include __DIR__ . '/parts/BNG_html_foot.php'; ?>