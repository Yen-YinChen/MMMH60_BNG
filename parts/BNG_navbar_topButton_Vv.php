<body>

<div class="navBarOutVv">
        <div class="navBarVv">
            <div class="logoWrapVv">
                <a href="<?php echo WEB_ROOT;?>/BNG_homepag_Vv.php"><img class="img100Vv" src="./img/logo.svg" alt=""></a>
            </div>
            <div class="navBarRightVv">
                <div class="mainMenuVv">
                    <ul class="mainMenuUlVv">
                        <li><a class="AVv" href="<?php echo WEB_ROOT;?>/BNG_homepag_Vv.php#hpAboutUsVv">關於我們</a></li>
                        <li><a class="AVv" href="<?php echo WEB_ROOT;?>/productList.php">精選行程</a></li>
                        <li><a class="AVv" href="<?php echo WEB_ROOT;?>/page1_YK.php">認識好友</a></li>
                        <li><a class="AVv" href="<?php echo WEB_ROOT;?>/BNG_homepag_Vv.php#hpContactUsVv">聯絡我們</a></li>
                    </ul>
                </div>
                <div class="iconWrapVv">
                    <ul class="iconWrapUlVv">
                        <li class="accountIconVv">
                            <a href="#">
                                <img class="img100Vv" id="accountIconVv" src="./img/account.svg" alt="">
                            </a>
                            <ul class="dropDownAccountVv hide">
                                <?php if (isset($_SESSION['user'])): ?>
                                    <li>
                                        <a class="AVv">Hi, <?php echo $_SESSION['user']['name'];?></a>
                                    </li>
                                <?php else: ?>
                                    <li>
                                        <a class="AVv" href="<?php echo WEB_ROOT ;?>/member_at_login_YCN.php">登入/註冊</a>
                                    </li>
                                <?php endif; ?>
                                <!-- <li class="memberVv">會員中心<div class="plusIcon "></div> -->
                                <ul class="memberVvSubMenu">
                                    <li><a class="AVv" href="<?php echo WEB_ROOT ;?>/member_friendList_YCN.php">好友</a></li>
                                    <li><a class="AVv" href="<?php echo WEB_ROOT;?>/member_inbox_YCN.php">信件</a></li>
                                    <li><a class="AVv" href="<?php echo WEB_ROOT;?>/BNG-coupon-pei.php">優惠券</a></li>
                                    <li><a class="AVv" href="<?php echo WEB_ROOT ;?>/member_profile_YCN.php">個人頁面</a></li>
                                    <li><a class="AVv" href="<?php echo WEB_ROOT ;?>/BNG-myorders_cm.php">歷史訂單</a></li>
                                </ul>
                        </li>
                        <li>
                            <a class="AVv" href="<?php echo WEB_ROOT ;?>/member_at_logout_YCN.php">登出</a>
                        </li>
                    </ul>
                    </li>

                    <li class="cartIconVv">
                        <a class="AVv" href="#">
                            <img class="img100Vv" id="cartIconVv"
                                src="./img/cart.svg" alt="">
                        </a>
                        <ul class="dropDownCartVv hide">
                            <li><a class="AVv" href="<?php echo WEB_ROOT ;?>/BNG-mytourpage_cm.php">已購買行程</a></li>
                            <li><a class="AVv" href="<?php echo WEB_ROOT ;?>/BNG-collecttourpg_cm.php">收藏行程</a></li>
                        </ul>
                    </li>
                    <li class="menuIconVv"><a class="AVv" href="#">
                            <img class="img100Vv" id="menuIconVv" src="./img/menu.svg" alt="">
                        </a>
                        <ul class="dropDownMenuVv hide">
                            <li><a class="AVv" href="<?php echo WEB_ROOT;?>/BNG_homepag_Vv.php#hpAboutUsVv">關於我們</a></li>
                            <li><a class="AVv" href="<?php echo WEB_ROOT;?>/productList.php">精選行程</a></li>
                            <li><a class="AVv" href="<?php echo WEB_ROOT;?>/page1_YK.php">認識好友</a></li>
                            <li><a class="AVv" href="<?php echo WEB_ROOT;?>/BNG_homepag_Vv.php#hpContactUsVv">聯絡我們</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    

    <div class="topButtonWrapVv">
    </div>
<!-- 頁內連結只能放#id，JQ click的權限通常較大，除非a換頁才不會被JQ的權限覆蓋-->

<!-- <div class="contentVv">
    <h1>從這開始放你的內容</h1>
</div> -->
<!-- 請改為自己的ClassName，並在此class下padding-top:100px-->