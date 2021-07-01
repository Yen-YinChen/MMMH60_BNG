<?php include __DIR__. '/parts/config.php'; ?>
<?php
$title = '訂購完成';
?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>
<link rel="stylesheet" href="./css/BNG-paidpage_cm.css">
</head>
<?php include __DIR__ . '/parts/BNG_navbar_topButton_VV.php'; ?>
<div class="ContentVv d-none d-sm-block">
    <section class="paidpage-sectionbg-cm">
        <div class="container d-flex">
            <p class="paidpage-moretitle-cm">訂購完成</p>
            <div class="container d-flex paidpage-pb-cm">
                <div class="item paidpage-circle1-cm">1</div>
                <div class="item paidpage-dashpg-cm"> <img src="./img/new_orange_line.svg" alt=""></div>
                <div class="item paidpage-circle2-cm">2</div>
            </div>

        </div>


        <div class="container paidpage-card-cm">
            <div class="box paidpage-box-cm">
                <div class="row">
                    <div class="item">
                        <h3 class="paidpage-h3-cm">購買明細</h3>
                    </div>
                    <div class="item">
                        <p class="paidpage-ordno-cm">訂單編號 : T05E20715</p>
                    </div>
                </div>

                <div class="content" id="content">
                    <div class="row">
                        <div class="item paidpage-line-cm">
                        </div>
                    </div>

                    <div class="row">
                        <div class="item paidpage-line-cm">
                        </div>
                    </div>

                    <div class="row paidpage-row-cm">
                        <div class="col-3 paidpage-imgsize-cm">
                            <img src="./img/tours/T05E204.jpg" alt="" class="paidpage-img-cm">
                        </div>
                        <div class="col-6 paidpage-item-cm">

                            <p class="paidpage-title-cm">七星潭濱海自行車道</p>

                            <div class="row paidpage-daterow-cm">
                                <img src="./img/calender-icon.svg" alt="" class="paidpage-calender-cm">
                                <p class="paidpage-detail-cm"> 2021-07-15 至 2021-07-16</p>
                            </div>


                            <p class="paidpage-detail-cm">使用優惠卷</p>
                            <p class="paidpage-detail-cm">金額 TWD 3,000</p>
                        </div>
                        <div class="col-1 paidpage-itembtn-cm">
                            <button class="paidpage-btn-cm" onclick="backToTourpage();">回精選行程</button>
                        </div>
                    </div>



                    <div class="row">
                        <div class="item paidpage-linedash-cm">
                        </div>
                    </div>
                    <div class="row paidpage-totalamount-cm">
                        <div class="item">
                            <p class="paidpage-amount-cm">總金額</p>
                        </div>
                        <div class="item">
                            <p class="paidpage-amountd-cm">TWD 2,550</p>
                        </div>
                    </div>
                    <div class="row paidpage-btnrow-cm">
                        <!-- <div class="item paidpage-itembtn-cm">
                                <button class="paidpage-btn2-cm">回認識好友</button>
                            </div> -->
                        <div class="item paidpage-itembtn-cm">
                            <button class="paidpage-btn2-cm" onclick="backToSocial();">回認識好友</button>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
</div>
<section class="d-block d-sm-none paidpage-sectionbg-mb-cm">
    <div class="container d-flex">
        <p class="paidpage-moretitle-mb-cm">訂購完成</p>
        <div class="container d-flex paidpage-pb-mb-cm">
            <div class="item paidpage-circle1-mb-cm">1</div>
            <div class="item "> <img src="./img/orangeline_rwd.svg" alt="" class="paidpage-dashpg-mb-cm"></div>
            <div class="item paidpage-circle2-mb-cm">2</div>
        </div>
    </div>

    <div class="container paidpage-card-mb-cm">
        <div class="row paidpage-r-mb-cm">
            <div class="item">
                <h3 class="paidpage-h3-mb-cm">購買明細</h3>
            </div>
        </div>
        <div class="content">
            <div class="row">
                <div class="item paidpage-line-mb-cm">
                </div>
            </div>

            <div class="row titler-mb-cm">
                <p class="paidpage-title-mb-cm">花東美景溫泉行旅</p>
            </div>

            <div class="row detailr-mb-cm">
                <p class="paidpage-detail-mb-cm">2021-08-19 至 2021-08-21</p>
            </div>

            <div class="row detailr-mb-cm">
                <div class="col-5">
                    <p class="paidpage-detail-mb-cm paidpage-peopler-mb-cm">使用優惠卷 <br>金額 TWD 17,990 </p>
                </div>
                <div class="col-5">
                    <button type="button" class="paidpage-btn-mb-cm" onclick="backToTourpage();">回精選行程</button>
                </div>

            </div>

            <div class="row">
                <div class="item paidpage-linedash-mb-cm">
                </div>
            </div>

            <div class="row paidpage-totalamount-mb-cm">
                <div class="item">
                    <p class="paidpage-amount-mb-cm">總金額</p>
                </div>
                <div class="item">
                    <p class="paidpage-amountd-mb-cm">TWD 15,291</p>
                </div>
            </div>

            <div class="row">

                <div class="item paidpage-itembtn-mb-cm">
                    <button class="paidpage-btn2-mb-cm" onclick="backToSocial();">回認識好友</button>
                </div>
            </div>

        </div>



    </div>
</section>

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script>
    //Added by YCN
    function backToTourpage(){
        window.location = "<?php echo WEB_ROOT;?>/productList.php";
    }
    function backToSocial(){
        window.location = "<?php echo WEB_ROOT;?>/page1_YK.php";
    }

</script>

<?php include __DIR__ . '/parts/BNG_html_foot.php'; ?>