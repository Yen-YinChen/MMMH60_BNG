<?php include __DIR__ . '/parts/config.php'; ?>
<?php

$title = '我的收藏行程';
$pageName = 'BNG-collecttourpg_cm-new';

$sql = "SELECT * FROM collect_tour_table";
$row = $pdo->query($sql)->fetchAll();

?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" href="./slick-1.8.1/slick/slick-theme.css">
<link rel="stylesheet" href="./css/BNG-collecttourpg_cm.css">
</head>

<?php include __DIR__ . '/parts/BNG_navbar_topButton_VV.php'; ?>
<div class="contentCm d-none d-sm-block">
    <section class="collecttourpg-sectionbg-cm d-none d-sm-block">

        <div class="container collecttourpg-card-cm">
            <div class="box collecttourpg-box-cm">
                <div class="row">
                    <div class="item">
                        <button class="collecttourpg-arrow-cm" onclick="myFunction()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg"></button>
                    </div>
                    <div class="item">
                        <h3 class="collecttourpg-h3-cm">我的收藏行程</h3>
                    </div>

                </div>

                <div class="content" id="content">
                    <div class="row">
                        <div class="item collecttourpg-line-cm">
                        </div>
                    </div>

                    <?php
                    foreach ($row as $r) { ?>

                        <div class="row1_content" id="row1_content" data-tourSid="<?php echo $r['tour_id']; ?>">
                            <div class="row collecttourpg-row-cm">

                                <div class="col-2 collecttourpg-imgsize-cm">
                                    <img src="/MMMH60_BNG/img/tours/<?= $r['tour_img'] ?>.jpg" alt="" class="collecttourpg-img-cm">
                                </div>

                                <div class="col-6 collecttourpg-item-cm">
                                    <p class="collecttourpg-title-cm"><?= $r['tourname'] ?></p>
                                </div>

                                <div class="col-3 collecttourpg-d-cm">
                                    <p class="collecttourpg-amount1-cm">TWD <?= $r['price'] ?></p>
                                    <button class="collecttourpg-btn2-cm" onclick="goToCart();">立即報名</button>
                                </div>

                                <div class="col-1">
                                    <button class="collecttourpg-trash-cm" onclick="myTrash()"><img src="./svgs/trash_cm.svg" alt=""></button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="item collecttourpg-line2-cm">
                                </div>
                            </div>
                        </div>

                    <?php }

                    ?>

                </div>



            </div>
        </div>

        <div class="container">
            <p class="collecttourpg-moretitle-cm">猜您可能也喜歡...</p>
        </div>

        <div class="container">
            <div class="row collecttourpg-morepd-cm carousel-cm">
                <div class="card collecttourpg-cardsp-cm" style="width: 260px;">
                    <img src="./img/tours/T18E301.jpg" class="card-img-top" alt="">
                    <div class="card-body collecttourpg-cardbody-cm">
                        <div class="row tag-row">
                            <div class="tag1">
                                <p class="tag1-text">東區</p>
                            </div>
                            <div class="tag2">挑戰級</div>
                            <p class="card-title collecttourpg-price-style">$15,990</p>
                        </div>

                        <p class="card-text">2021/07/08<br>抹茶山山海越野行</p>
                        <hr class="collecttourpg-hr-cm">
                        <a href="" class="collecttourpg-viewmore-cm">VIEW MORE</a>
                    </div>
                </div>

                <div class="card collecttourpg-cardsp-cm" style="width: 260px;">
                    <img src="./img/tours/T31E201.jpg" class="card-img-top" alt="">
                    <div class="card-body collecttourpg-cardbody-cm">
                        <div class="row tag-row">
                            <div class="tag1">
                                <p class="tag1-text">東區</p>
                            </div>
                            <div class="tag2">運動級</div>
                            <p class="card-title collecttourpg-price-style">$6,990</p>
                        </div>

                        <p class="card-text">2021/08/01<br>花蓮濱海輕健行</p>
                        <hr class="collecttourpg-hr-cm">
                        <a href="" class="collecttourpg-viewmore-cm">VIEW MORE</a>
                    </div>
                </div>

                <div class="card collecttourpg-cardsp-cm" style="width: 260px;">
                    <img src="./img/tours/T38E101.jpg" class="card-img-top" alt="">
                    <div class="card-body collecttourpg-cardbody-cm">
                        <div class="row tag-row">
                            <div class="tag1">
                                <p class="tag1-text">東區</p>
                            </div>
                            <div class="tag2">輕鬆級</div>
                            <p class="card-title collecttourpg-price-style">$6,199</p>
                        </div>

                        <p class="card-text">2021/08/18<br>台東池上風光騎旅</p>
                        <hr class="collecttourpg-hr-cm">
                        <a href="" class="collecttourpg-viewmore-cm">VIEW MORE</a>
                    </div>
                </div>

                <div class="card collecttourpg-cardsp-cm" style="width: 260px;">
                    <img src="./img/tours/T40E101.jpg" class="card-img-top" alt="">
                    <div class="card-body collecttourpg-cardbody-cm">
                        <div class="row tag-row">
                            <div class="tag1">
                                <p class="tag1-text">東區</p>
                            </div>
                            <div class="tag2">輕鬆級</div>
                            <p class="card-title collecttourpg-price-style">$13,299</p>
                        </div>

                        <p class="card-text">2021/08/30<br>縱騎花東四日漫遊</p>
                        <hr class="collecttourpg-hr-cm">
                        <a href="" class="collecttourpg-viewmore-cm">VIEW MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>

<section class="d-block d-sm-none collecttourpg-sectionbg-mb-cm">
    <div class="container collecttourpg-card-mb-cm">
        <div class="row collecttourpg-r-mb-cm">
            <div class="item">
                <button class="collecttourpage-arrow-mb-cm" onclick="myFuntion()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimgmb"></button>
            </div>
            <div class="item">
                <h3 class="collecttourpage-h3-mb-cm">我的收藏行程</h3>
            </div>
        </div>
        <div class="content" id="contentmb">
            <div id="row1_content_mb">
                <div class="row">
                    <div class="item collecttourpg-line-mb-cm">
                    </div>
                </div>

                <div class="row titler-mb-cm">
                    <p class="collecttourpg-title-mb-cm">關山環鎮自行車道<span class="whiteword-mb-cm">是空</span></p>
                    <div class="item">
                        <button class="collecttourpg-trash-mb-cm" onclick="myTrashMb()"><img src="./svgs/trash_cm.svg" alt=""></button>
                    </div>
                </div>

                <div class="row detailr-mb-cm">
                    <p class="collecttourpg-detail-mb-cm">2021-08-06 至 2021-08-08</p>
                </div>

                <div class="row collecttourpg-amountr-mb-cm">
                    <p class="collecttourpg-amount1-mb-cm">TWD 4,200</p>
                    <div class="item">
                        <button class="collecttourpg-btn2-mb-cm">立即購買</button>
                    </div>
                </div>
            </div>

            <div id="row5_content_mb">
                <div class="row collecttourpg-line2-mb-cm">
                    <div class="item collecttourpg-line-mb-cm">
                    </div>
                </div>


                <div class="row titler-mb-cm">
                    <p class="collecttourpg-title-mb-cm">花東美景溫泉行旅<span class="whiteword-mb-cm">是空</span></p>
                    <div class="item">
                        <button class="collecttourpg-trash-mb-cm" onclick="myLitterMb()"><img src="./svgs/trash_cm.svg" alt=""></button>
                    </div>
                </div>

                <div class="row detailr-mb-cm">
                    <p class="collecttourpg-detail-mb-cm">2021-08-19 至 2021-08-21</p>
                </div>

                <div class="row collecttourpg-amountr-mb-cm">
                    <p class="collecttourpg-amount1-mb-cm">TWD 17,990</p>
                    <div class="item">
                        <button class="collecttourpg-btn2-mb-cm" onclick="goECart();">立即購買</button>
                    </div>
                </div>
            </div>

            <div id="row2_content_mb">
                <div class="row collecttourpg-line2-mb-cm">
                    <div class="item collecttourpg-line-mb-cm">
                    </div>
                </div>

                <div class="row titler-mb-cm">
                    <p class="collecttourpg-title-mb-cm">花蓮騎旅挑戰行<span class="whiteword-mb-cm">是空的</span></p>
                    <div class="item">
                        <button class="collecttourpg-trash-mb-cm" onclick="myWasteMb()"><img src="./svgs/trash_cm.svg" alt=""></button>
                    </div>
                </div>

                <div class="row detailr-mb-cm">
                    <p class="collecttourpg-detail-mb-cm">2021-08-13 至 2021-08-15</p>
                </div>

                <div class="row collecttourpg-amountr-mb-cm">
                    <p class="collecttourpg-amount1-mb-cm">TWD 15,390</p>
                    <div class="item">
                        <button class="collecttourpg-btn2-mb-cm">立即購買</button>
                    </div>
                </div>
            </div>

            <div id="row3_content_mb">
                <div class="row collecttourpg-line2-mb-cm">
                    <div class="item collecttourpg-line-mb-cm">
                    </div>
                </div>

                <div class="row titler-mb-cm">
                    <p class="collecttourpg-title-mb-cm">南投武嶺單車圓夢團<span class="whiteword-mb-cm">是</span></p>
                    <div class="item">
                        <button class="collecttourpg-trash-mb-cm" onclick="myJunkMb()"><img src="./svgs/trash_cm.svg" alt=""></button>
                    </div>
                </div>

                <div class="row detailr-mb-cm">
                    <p class="collecttourpg-detail-mb-cm">2021-08-20 至 2021-08-21</p>
                </div>

                <div class="row collecttourpg-amountr-mb-cm">
                    <p class="collecttourpg-amount1-mb-cm">TWD 7,600</p>
                    <div class="item">
                        <button class="collecttourpg-btn2-mb-cm">立即購買</button>
                    </div>
                </div>

            </div>

            <div id="row4_content_mb">
                <div class="row collecttourpg-line2-mb-cm">
                    <div class="item collecttourpg-line-mb-cm">
                    </div>
                </div>

                <div class="row titler-mb-cm">
                    <p class="collecttourpg-title-mb-cm">東進武嶺團<span class="whiteword-mb-cm">是空的的的</span></p>
                    <div class="item">
                        <button class="collecttourpg-trash-mb-cm" onclick="myGarbageMb()"><img src="./svgs/trash_cm.svg" alt=""></button>
                    </div>
                </div>

                <div class="row detailr-mb-cm">
                    <p class="collecttourpg-detail-mb-cm">2021-08-16 至 2021-08-18</p>
                </div>

                <div class="row collecttourpg-amountr-mb-cm">
                    <p class="collecttourpg-amount1-mb-cm">TWD 14,000</p>
                    <div class="item">
                        <button class="collecttourpg-btn2-mb-cm">立即購買</button>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <div class="container">
        <p class="collecttourpg-moretitle-mb-cm">猜您可能也喜歡...</p>
    </div>

    <div class="container ">
        <div class="row">
            <div class="card collecttourpg-cardsp-cm" style="width: 260px;">
                <img src="./img/tours/T40E101.jpg" class="card-img-top" alt="">
                <div class="card-body collecttourpg-cardbody-cm">
                    <div class="row">
                        <div class="tag1">
                            <p class="tag1-text">東區</p>
                        </div>
                        <div class="tag2">輕鬆級</div>
                        <p class="card-title collecttourpg-price-style">$13,299</p>
                    </div>

                    <p class="card-text">2021/08/30<br>縱騎花東四日漫遊</p>
                    <hr class="collecttourpg-hr-cm">
                    <a href="" class="collecttourpg-viewmore-cm">VIEW MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="./js/BNG-collecttourpg_cm.js"></script>
<script>
    function goToCart() {
        let tourSid = event.currentTarget.closest("div#row1_content");
        if (tourSid.getAttribute("data-tourSid") == 'T19E30809') {
            window.location = "<?php echo WEB_ROOT; ?>/BNG-T19E30809_billingpage_cm.php";
        }
    }

    function goECart() {
        window.location = "<?php echo WEB_ROOT; ?>/BNG-T19E30809_billingpage_cm.php";
    }
</script>

<?php include __DIR__ . '/parts/BNG_html_foot.php'; ?>