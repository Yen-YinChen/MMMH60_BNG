<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '填寫資料與付款';
?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>/css/BNG-billingpage_cm.css">
<link href="<?php echo WEB_ROOT;?>/icheck-1.0.3/skins/square/orange.css" rel="stylesheet">
</head>

<?php include __DIR__ . '/parts/BNG_navbar_topButton_VV.php'; ?>
<div class="ContentCm d-none d-sm-block">
    <section class="billing-sectionbg-cm d-none d-sm-block">
        <div class="container d-flex">
            <p class="billingpage-moretitle-cm">填寫資料與付款</p>
            <div class="container d-flex billingpage-pb-cm">
                <div class="item billingpage-circle1-cm">1</div>
                <div class="item billingpage-dashpg-cm"> <img src="./img/dash.svg" alt=""></div>
                <div class="item billingpage-circle2-cm">2</div>
            </div>
        </div>
        <div class="container billingpage-card-cm billingpage-veryfirstcard-cm">
            <div class="box billingpage-box-cm">
                <div class="row">
                    <div class="item">
                        <h3 class="billingpage-h3-cm">付款明細</h3>
                    </div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="item billingpage-purchaser-cm">
                        </div>
                    </div>
                    <div class="row billingpage-row-cm">
                        <div class="col-3 billingpage-imgsize-cm">
                            <img src="./img/tours/T19E302.jpg" alt="" class="billingpage-img-cm">
                        </div>
                        <div class="col-6 billingpage-item-cm">

                            <p class="billingpage-title-cm">花東美景溫泉行旅</p>

                            <div class="row billingpage-daterow-cm">
                                <img src="./img/calender-icon.svg" alt="" class="billingpage-calender-cm">
                                <p class="billingpage-detail-cm"> 2021-08-09 至 2021-08-11</p>
                            </div>


                            <p class="billingpage-detail-cm">人數 x 1</p>
                            <p class="billingpage-detail-cm">金額 TWD 17,990</p>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="container billingpage-card-cm">
            <div class="box billingpage-box-cm">
                <div class="row">
                    <div class="item">
                        <button class="billingpage-arrow-cm" onclick="myFunction()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg"></button>
                    </div>
                    <div class="item">
                        <h3 class="billingpage-h3-cm">訂購人資料</h3>
                    </div>
                </div>

                <form class="content needs-validation" id="content" novalidate>
                    <div class="row">
                        <div class="item billingpage-purchaser-cm">
                        </div>
                    </div>
                    <div class="form-row billingpage-formr-cm">
                        <div class="col-4">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">姓氏 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="name" class="form-control form-control-lg" id="lastname" placeholder="例 : 鄭" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">名字 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="name" class="form-control form-control-lg" id="firstname" placeholder="例 : 小明" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="form-row billingpage-formr-cm">
                        <div class="col-4">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">身分證字號 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="password" class="form-control form-control-lg" id="id1" placeholder="請輸入身分證字號" required>
                            <!-- pattern="/[A-Z]\d[0-9]{8}/g" -->
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">聯絡電話 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="phone1" placeholder="請輸入聯絡電話" pattern="/\d{2}\-\d{8}/g" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row billingpage-formr-cm">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="billingpage-labelstyle-cm">電子郵件信箱 <span class="billingpage-starstyle-cm">*</span></label>
                                <input type="email" class="form-control form-control-lg" id="email1" aria-describedby="emailHelp" placeholder="請輸入常用電子郵件信箱" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row billingpage-checkboxr-cm">
                        <div class="form-group form-check billingpage-checkbox-style-cm">
                            <input type="checkbox" name="iCheck" class="form-check-input" id="autoinfo">
                            <label class="form-check-label billingpage-ckecklabelsty-cm" for="exampleCheck1">同會員資料</label>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="item">
                            <button type="submit" class="btn btn-primary">繼續</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <h3 class="billingpage-h3-cm billingpage-h3-2">旅客資料</h3>

        <div class="container billingpage-card-cm">
            <div class="box billingpage-box-cm">
                <div class="row billingpage-row1style-cm">
                    <div class="item">
                        <button class="billingpage-arrow-cm" onclick="myButton()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg2"></button>
                    </div>
                    <div class="item billingpage-imgstyle-cm">
                        <img src="./img/tours/T05E204.jpg" alt="" class="billingpage-img">
                    </div>
                    <div class="item">
                        <h4 class="billingpage-title-cm">花東美景溫泉行旅</h4>
                        <p class="billingpage-date1-cm">2021-08-09 <span class="billingpage-pl1-cm">人數 x 1</span>
                        </p>
                    </div>
                </div>

                <form class="content needs-validation" id="content2" novalidate>
                    <div class="row">
                        <div class="item billingpage-purchaser-cm">
                        </div>
                    </div>
                    <div class="form-row billingpage-row2-cm">
                        <div class="col-3">
                            <p class="billingpage-title2-cm">旅客代表人</p>
                        </div>
                        <div class="col-3">
                            <div class="form-group form-check">
                                <input type="checkbox" name="iCheck" class="form-check-input" id="autoinfo1">
                                <label class="form-check-label billingpage-ckecklabelsty-cm " for="exampleCheck1" id="billingpage-samewithpurchaser">同訂購人資料</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row billingpage-formr-cm">
                        <div class="col">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">姓名 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="name" class="form-control form-control-lg" id="name1" placeholder="例 : 鄭小明" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleInputId" class="billingpage-labelstyle-cm">身分證字號 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="id2" placeholder="請輸入身分證字號" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleInputId" class="billingpage-labelstyle-cm">出生年月日 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="date" class="form-control form-control-lg" id="birthday" placeholder="西元年/月/日" max="2003-05-31" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row billingpage-formr-cm">
                        <div class="col">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">聯絡電話 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="tel" class="form-control form-control-lg" id="phone2" placeholder="請輸入聯絡電話" pattern="/\d{2}\-\d{8}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">緊急聯絡人 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="name" class="form-control form-control-lg" id="emergencyname" placeholder="請輸入緊急聯絡人" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col">
                            <label for="exampleInputName" class="billingpage-labelstyle-cm">緊急聯絡人電話 <span class="billingpage-starstyle-cm">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="emergencyphone" placeholder="請輸入緊急聯絡人電話" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row billingpage-formr-cm">
                        <div class="col-7">
                            <label for="exampleFormControlTextarea1" class="billingpage-labelstyle-cm">訂單備註</label>
                            <textarea class="form-control billingpage-remarks-cm" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-row billingpage-formr-cm">

                        <div class="item billingpage-continuebtn-cm">
                            <button type="submit" class="btn btn-primary">繼續</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <h3 class="billingpage-h3-cm billingpage-h3-3">付款</h3>

        <div class="container billingpage-card-cm">
            <form class="box billingpage-box-cm needs-validation" method="post" novalidate>
                <div class="row">
                    <div class="item">
                        <button class="billingpage-arrow-cm" onclick="myButtonTwo()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg3"></button>
                    </div>
                    <div class="item">
                        <h3 class="billingpage-h3-cm">請選擇付款方式</h3>
                    </div>
                </div>
                <div class="content" id="content3">
                    <div class="row">
                        <div class="item billingpage-purchaser-cm">
                        </div>
                    </div>
                    <div class="form-row billingpage-payr-cm">
                        <div class="col-3">
                            <input type="radio" name="iCheck" required>
                            <label class="custom-control-label billingpage-labelstyle-cm" for="customRadio1">LINE
                                PAY</label>
                        </div>
                        <div class="col-3">
                            <div class="item billingpage-linepay-cm">
                                <img src="./svgs/ic_linepay_2.svg" alt="">
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="item billingpage-purchaser-cm">
                        </div>
                    </div>

                    <div class="form-row billingpage-payr-cm">
                        <div class="col-3">
                            <input type="radio" name="iCheck" required>
                            <label class="custom-control-label billingpage-labelstyle-cm" for="customRadio2">信用卡</label>
                        </div>
                        <div class="col-1">
                            <div class="item billingpage-jcb-cm">
                                <img src="./svgs/ic_jcb.svg" alt="">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="item billingpage-jcb-cm">
                                <img src="./svgs/ic_master.svg" alt="">
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="item billingpage-jcb-cm">
                                <img src="./svgs/ic_visa.svg" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="item billingpage-purchaser-cm">
                        </div>
                    </div>

                    <div class="bigbox d-flex">
                        <div class="form billingpage-creditcrdr-cm">
                            <div id="front">
                                <div class="col-8 cd-inputstyle-cm">
                                    <label for="name" class="billingpage-labelstyle-cm">姓名</label>
                                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Zheng Xiao Ming" maxlength="24" autocomplete="off" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-8 cd-inputstyle-cm">
                                    <label for="number" class="billingpage-labelstyle-cm">信用卡號碼</label>
                                    <input type="text" class="form-control form-control-lg" id="number" placeholder="oooo oooo oooo oooo" type="text" maxlength="16" autocomplete="off" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-8 cd-inputstyle-cm">
                                    <label for="month" class="billingpage-labelstyle-cm">有效期限</label>
                                    <div class="box d-flex">
                                        <input type="text" class="form-control form-control-lg" id="month" placeholder="MM" maxlength="2" autocomplete="off" required><span class="slash-cm">/</span><input id="year" type="text" maxlength="2" class="form-control form-control-lg" placeholder="YY" autocomplete="off" required />
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>

                                </div>
                            </div>
                            <div id="back">
                                <div class="col-8">
                                    <label for="cvv" class="billingpage-labelstyle-cm">背面末三碼</label>
                                    <input type="text" class="form-control form-control-lg" id="cvv" placeholder="CVC or CVV" type="text" maxlength="3" autocomplete="off" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="creditcard_box">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="front">
                                        <div class="card">
                                            <div class="card__sim"></div>
                                            <div class="card__number">
                                                ****************
                                            </div>
                                            <div class="card__little-number">
                                                1234
                                            </div>
                                            <div class="card__little-letter">
                                                Good Thru
                                            </div>
                                            <div class="card__expiration">
                                                <div class="card__month">
                                                    XX
                                                </div>
                                                <span>/</span>
                                                <div class="card__year">
                                                    XX
                                                </div>
                                            </div>
                                            <div class="card__name">
                                                XXXXXX
                                            </div>
                                            <div class="card__type">
                                                <!-- <img id="card__image"></img> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="card">
                                            <div class="card__black"></div>
                                            <div class="card__skyblue"></div>
                                            <div class="card__cvv">
                                                XXX
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="item billingpage-purchaser-cm " id="billingpage-lastboxline-cm">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-2">
                            <button type="button" class="btn btn-primary billingpage-btnstyle-cm billingpage-couponbtn-cm" onclick="disp_confirm()">領取優惠卷</button>
                        </div>
                        <div class="col-4 billingpage-couponinput-cm"><input type="text" class="form-control form-control-lg" type="text" placeholder="填寫優惠卷號碼" autocomplete="off"></div>
                        <div class="col-4">
                            <p class="billingpage-smallword-cm">※使用優惠卷有八五折優惠</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="item billingpage-purchaser-cm ">
                        </div>
                    </div>
                    <div class="row billingpage-btnr-cm">
                        <div class="item billingpage-lastbtn-cm">
                            <input type="submit" class="btn btn-primary bp-lastbtn-cm" value="確認付款" onclick=""></input>
                        </div>
                        <p class="billingpage-coupontotalvalue-cm"></p>
                    </div>

                </div>




            </form>
        </div>
    </section>
</div>

<section class="d-block d-sm-none billingpage-sectionbg-mb-cm">
    <div class="container d-flex ">
        <p class="billingpage-moretitle-mb-cm">填寫資料與付款</p>
        <div class="container d-flex billingpage-pb-mb-cm">
            <div class="item billingpage-circle1-mb-cm">1</div>
            <div class="item "> <img src="./img/linedash_rwd.svg" alt="" class="billingpage-dashpg-mb-cm"></div>
            <div class="item billingpage-circle2-mb-cm">2</div>
        </div>
    </div>
    <div class="container billingpage-card2-mb-cm">
        <div class="row billingpage-r-mb-cm">
            <div class="item">
                <h3 class="billingpage-h3-title-mb-cm">付款明細</h3>
            </div>
        </div>

        <div class="row">
            <div class="item billingpage-line-mb-cm">
            </div>
        </div>
        <p class="billingpage-title-mb-cm">花東美景溫泉行旅</p>
        <div class="row billingpage-daterow-mb-cm">
            <img src="./img/calender-icon.svg" alt="" class="billingpage-calender-mb-cm">
            <p class="billingpage-detail-mb-cm"> 2021-08-19 至 2021-08-21</p>
        </div>
        <p class="billingpage-people-mb-cm">人數 x 1</p>
        <p class="billingpage-detail-mb-cm billingpage-detail-amount-mb-cm">金額 TWD 17,990</p>
    </div>


    <div class="container billingpage-card-mb-cm">
        <div class="row billingpage-r-mb-cm">
            <div class="item">
                <button class="billingpage-arrow-mb-cm" onclick="myFox()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg_mb"></button>
            </div>
            <div class="item">
                <h3 class="billingpage-h3-mb-cm">訂購人資料</h3>
            </div>
        </div>
        <div class="content" id="content_mb">
            <div class="row">
                <div class="item billingpage-line-mb-cm">
                </div>
            </div>
            <form class="needs-validation" novalidate>
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">姓氏 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="name" class="form-control form-control-sm form-control-cm" id="exampleInputLastName" placeholder="例 : 鄭">

                <label for="exampleInputName" class="billingpage-labelstyle1-cm">名字 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="name" class="form-control form-control-sm form-control-cm" placeholder="例 : 小明">
                <label for="ID" class="billingpage-labelstyle1-cm">身分證字號 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="text" class="form-control form-control-sm form-control-cm" id="ID" placeholder="請輸入身分證字號">
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">聯絡電話 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="text" class="form-control form-control-sm form-control-cm" id="exampleInputPhoneNumber" placeholder="請輸入聯絡電話">
                <label for="Email" class="billingpage-labelstyle1-cm">電子郵件信箱 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="email" class="form-control form-control-sm form-control-cm" id="EMAIL" aria-describedby="emailHelp" placeholder="請輸入常用電子郵件信箱">
                <div class="row billingpage-checkboxr-mb-cm">
                    <input type="checkbox" class="form-check-input form-check-input-mb-cm" id="exampleCheck1">
                    <label class="form-check-label billingpage-ckecklabelsty-cm" for="exampleCheck1">同會員資料</label>
                </div>
                <button type="submit" class="btn btn-primary btn-primary-cm">繼續</button>
            </form>

        </div>
    </div>

    <div class="container billingpage-card3-mb-cm">
        <div class="row billingpage-r-mb-cm">
            <div class="item">
                <button class="billingpage-arrow-mb-cm" onclick="myButon()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg2_mb"></button>
            </div>
            <div class="item">
                <h3 class="billingpage-h3-mb-cm">旅客資料</h3>
            </div>
        </div>
        <div class="content" id="content2_mb">
            <div class="row">
                <div class="item billingpage-line-mb-cm">
                </div>
            </div>
            <p class="billingpage-title-mb-cm">花東美景溫泉行旅</p>
            <div class="row billingpage-dater-mb-cm">
                <p class="billingpage-date-mb-cm">2021-08-19</p>
                <p class="billingpage-people-mb-cm">人數 x 1</p>
            </div>
            <div class="row">
                <div class="item billingpage-line-mb-cm">
                </div>
            </div>
            <div class="row">
                <p class="billingpage-title2-mb-cm">旅客代表人</p>
                <div class="box billingpage-box-checkboxr-mb-cm">
                    <input type="checkbox" class="form-check-input " id="exampleCheck1">
                    <label class="form-check-label billingpage-ckecklabelsty2-cm" for="exampleCheck1">同訂購人資料</label>
                </div>

            </div>
            <form class="needs-validation" novalidate>
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">姓名 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="name" class="form-control form-control-sm form-control-cm" id="exampleInputFirstName" placeholder="例 : 鄭小明">
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">身分證字號 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="text" class="form-control form-control-sm form-control-cm" placeholder="請輸入身分證字號">
                <label for="birthday" class="billingpage-labelstyle1-cm">出生年月日 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="date" class="form-control form-control-sm form-control-cm" placeholder="西元年/月/日">
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">聯絡電話 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="text" class="form-control form-control-sm form-control-cm" placeholder="請輸入聯絡電話">
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">緊急聯絡人 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="name" class="form-control form-control-sm form-control-cm" placeholder="例 : 鄭小明">
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">緊急聯絡人電話 <span class="billingpage-starstyle-cm">*</span></label>
                <input type="text" class="form-control form-control-sm form-control-cm" placeholder="請輸入緊急聯絡人電話">
                <label for="exampleFormControlTextarea1" class="billingpage-labelstyle1-cm">訂單備註</label>
                <textarea class="form-control form-control-sm form-control-cm" id="exampleFormControlTextarea1" rows="4"></textarea>
                <div class="row billingpage-btnr-mb-cm">
                    <button type="submit" class="btn btn-primary btn-primary2-cm">繼續</button>
                </div>
            </form>

        </div>

    </div>



    <div class="container billingpage-card4-mb-cm">
        <div class="row billingpage-r-mb-cm">
            <div class="item">
                <button class="billingpage-arrow-mb-cm" onclick="myButonTwo()"><img src="./img/Icon - icon-arrow-left.svg" alt="" id="arrowimg3_mb"></button>
            </div>
            <div class="item">
                <h3 class="billingpage-h3-mb-cm">請選擇付款方式</h3>
            </div>
        </div>
        <div class="content" id="content3_mb">
            <div class="row">
                <div class="item billingpage-line-mb-cm">
                </div>
            </div>
            <div class="row billingpage-linepayr-mb-cm">
                <div class="col">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label billingpage-labelstyle-cm" for="customRadio1">LINE
                        PAY</label>
                </div>
                <div class="col">
                    <div class="item billingpage-linepay-mb-cm">
                        <img src="./svgs/ic_linepay_2.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item billingpage-line-mb-cm">
                </div>
            </div>
            <div class="row billingpage-creditcdr-mb-cm">
                <div class="col-4">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                    <label class="custom-control-label billingpage-labelstyle-cm creditcard-label" for="customRadio2">信用卡</label>
                </div>
                <div class="col-2">
                    <div class="item billingpage-jcb-cm">
                        <img src="./svgs/ic_jcb.svg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="item billingpage-jcb-cm">
                        <img src="./svgs/ic_master.svg" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="item billingpage-jcb-cm">
                        <img src="./svgs/ic_visa.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item billingpage-line-mb-cm">
                </div>
            </div>
            <form class="needs-validation" data-form="goCart" novalidate>
                <label for="exampleInputCardN" class="billingpage-labelstyle1-cm">信用卡號碼</label>
                <input type="text" class="form-control form-control-sm form-control-cm" placeholder="oooo oooo oooo oooo">
                <label for="" class="billingpage-labelstyle1-cm">有效期限</label>
                <input type="text" class="form-control form-control-sm form-control-cm" placeholder="MM / YY">
                <label for="exampleInputName" class="billingpage-labelstyle1-cm">背面末三碼</label>
                <input type="text" class="form-control form-control-sm form-control-cm billingpage-cvc-mb-cm" placeholder="CVC / CVV">
                <div class="row">
                    <div class="item billingpage-line-mb-cm">
                    </div>
                </div>
                <label for="" class="billingpage-labelstyle1-cm">優惠卷</label>
                <input type="text" class="form-control form-control-sm form-control-cm" placeholder="填寫優惠卷號碼">
                <small class="billingpage-smallword-mb-cm">※使用優惠卷有八五折優惠</small>
                <div class="row">
                    <div class="item billingpage-dashline-mb-cm">
                    </div>
                </div>
                <div class="row">
                    <p class="billingpage-coupontotalvalue-mb-cm"></p>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-primary billingpage-btnstyle-mb-cm" onclick="disp_confirm_mb()">領取優惠卷</button>
                    <button type="submit" class="btn btn-primary btn-primary-cm" onmouseup="myOrders();">確認付款</button>
                </div>

            </form>
        </div>
    </div>
</section>

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>

<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script src="<?php echo WEB_ROOT;?>/icheck-1.0.3/icheck.js"></script>
<script src="<?php echo WEB_ROOT; ?>/js/BNG-billingpage_cm.js"></script>
<script>
    function myOrders(){
        window.location ="<?php echo WEB_ROOT;?>/BNG-paidpage_cm.php";
    }

    //let formMobile = document.getElementById('formMobile');
    //formMobile.addEventListener('submit', function(event){
    //    window.location ="<?php //echo WEB_ROOT;?>///BNG-paidpage_cm.php";
    //})


</script>
<?php include __DIR__ . '/parts/BNG_html_foot.php'; ?>