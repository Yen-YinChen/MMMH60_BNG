<?php include __DIR__. '/parts/config.php'; ?>
<?php
$area = isset($_GET['area']) ? $_GET['area'] : '北區';
$low_query = $pdo->prepare("SELECT * FROM members where area = ? and bng_level = ?");
$low_query->execute([$area, 1]);
$low_data = $low_query->fetchAll();

$middle_query = $pdo->prepare("SELECT * FROM members where area = ? and bng_level = ?");
$middle_query->execute([$area, 2]);
$middle_data = $middle_query->fetchAll();

$height_query = $pdo->prepare("SELECT * FROM members where area = ? and bng_level = ?");
$height_query->execute([$area, 3]);
$height_data = $height_query->fetchAll();
?>
<?php
$title = '交友首頁';
?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>


<link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./css/BNG.page1__YK.css">
<link rel="stylesheet" href="./css/BNG_footer_Vv.css">
<link rel="stylesheet" href="./css/slick_YK.css">
<link rel="stylesheet" href="./css/slick-theme_YK.css">
<link rel="stylesheet" href="./css/BNG_navbar_topButton_Vv.css">





<style>
    .page-link.active {
        background: #007bff;
    }
</style>

</head>




<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php'; ?>


<div class="rowaaa" id="rowaaa_mb">
    <div class=" container01_YK">
        <div class="container01-1_YK">幫你找到騎行的小夥伴 享受一起運動的樂趣</div>
        <div class="container01-2_YK">
            <div class="line01_YK"></div>
            <div class="line02_YK"></div>
        </div>
    </div>
</div>



<div class="letter01_YK">
    <div class="letter01-1_YK">想找哪個地區的車友？</div>
    <form class="letter01-2_YK" method="get">
        <div class="radio1_YK">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" id="flexRadioDefault1" value="北區" <?= $area == '北區' ? 'checked' : '' ?>>
                <label class="form-check-label" for="flexRadioDefault1">
                    北區
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" value="中區" id="flexRadioDefault2" <?= $area == '中區' ? 'checked' : '' ?>>
                <label class="form-check-label" for="flexRadioDefault2">
                    中區
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" value="南區" id="flexRadioDefault3" <?= $area == '南區' ? 'checked' : '' ?>>
                <label class="form-check-label" for="flexRadioDefault3">
                    南區
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="area" value="東區" id="flexRadioDefault4" <?= $area == '東區' ? 'checked' : '' ?>>
                <label class="form-check-label" for="flexRadioDefault4">
                    東區
                </label>
            </div>
        </div>
        <div class="button_YK d-none d-sm-block">
            <button type="submit" class="btn btn-danger btn01_YK">搜尋更多好友</button>
            <!-- <button type="submit" class="btn btn-danger btn02_YK">進入我的行程找車友</button> -->
        </div>

    </form>
    <button type="submit" class="btn btn-danger btn01_YK btn01_YK_mb d-block d-sm-none ">搜尋更多好友</button>
</div>
<div class="container-fluid space_YK"></div>

<!-- 桌機 -->

<div class="biga0mountain_YK">
    <div class="a0commountain01_YK d-none d-sm-block">

    </div>
    <div class="a0mountain01-1-line_YK  d-none d-sm-block"></div>
</div>





<!-- 初階車手 -->
<div class="hashtag01_YK">
    <div class="hashtag01-1_YK">新手入門</div>
    <div class="hashtag01-2_YK" onclick="page2YK();" style="cursor: pointer;">看更多</div>
</div>

<div class="letter02_YK">『　平日熱愛騎自行車到處趴趴走，但對專業自行車不是很了解　』</div>



<!-- 人物圖 -->
<div class="container">
    <div class="carousel">
        <!-- <div class="box "> -->

        <?php
        foreach ($low_data as $row) {
            $gender = $row['gender'] == '男' ? 'M' : 'F';
        ?>
            <div class="col-6 col-md-3">

                <div class="smbox">
                    <div class="container02-1-1_YK" style="background-image: url('./img/members/<?= $row['member_id'] ?>.jpg')">
                        <div class="areabox_YK"><?= $row['location'] ?></div>
                    </div>

                    <div class="container02-1-2_YK"><?= $row['name'] ?></div>
                    <div class="container02-1-3_YK">
                        <div class="container02-1-3-1_YK"><?= $row['age'] ?>歲</div>
                        <div class="container02-1-3-2_YK">新手入門</div>
                    </div>
                    <div class="container02-1-4_YK">
                        <div class="container02-1-4-1_YK"></div>
                        <div class="container02-1-4-2_YK"></div>
                        <div class="container02-1-4-3_YK"></div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <!-- </div> -->
    </div>
</div>




<!-- 中階車手 -->
<div class="hashtag01_YK ww">
    <div class="hashtag01-1_YK">中階車手</div>
    <div class="hashtag01-2_YK" onclick="page2YK();" style="cursor: pointer;">看更多</div>
</div>

<div class="letter02_YK">『　曾有騎過專業自行車，且對專業自行車有一定程度的了解　』</div>



<!-- 人物圖 -->
<div class="container">
    <div class="carousel">
        <!-- <div class="box "> -->
        <?php
        foreach ($middle_data as $row) {
            $gender = $row['gender'] == '男' ? 'M' : 'F';
        ?>
            <div class="col-6 col-md-3">

                <div class="smbox">
                    <div class="container02-1-1_YK" style="background-image: url('./img/members/<?= $row['member_id'] ?>.jpg')">
                        <div class="areabox_YK"><?= $row['location'] ?></div>
                    </div>

                    <div class="container02-1-2_YK"><?= $row['name'] ?></div>
                    <div class="container02-1-3_YK">
                        <div class="container02-1-3-1_YK"><?= $row['age'] ?>歲</div>
                        <div class="container02-1-3-2_YK">中階車手</div>
                    </div>
                    <div class="container02-1-4_YK">
                        <div class="container02-1-4-1_YK"></div>
                        <div class="container02-1-4-2_YK"></div>
                        <div class="container02-1-4-3_YK"></div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>


    </div>
</div>

<!-- 高階車手 -->
<div class="hashtag01_YK">
    <div class="hashtag01-1_YK">專業騎行</div>
    <div class="hashtag01-2_YK" onclick="page2YK();" style="cursor: pointer;">看更多</div>
</div>

<div class="letter02_YK">『　有騎過專業自行車經歷約三年，且有參加過專業團騎活動　』</div>



<!-- 人物圖 -->
<div class="container">
    <div class="carousel">
        <!-- <div class="box "> -->
        <?php
        foreach ($height_data as $row) {
            $gender = $row['gender'] == '男' ? 'M' : 'F';
        ?>
            <div class="col-6 col-md-3">

                <div class="smbox">
                    <div class="container02-1-1_YK" style="background-image: url('./img/members/<?= $row['member_id'] ?>.jpg')">
                        <div class="areabox_YK"><?= $row['location'] ?></div>
                    </div>

                    <div class="container02-1-2_YK"><?= $row['name'] ?></div>
                    <div class="container02-1-3_YK">
                        <div class="container02-1-3-1_YK"><?= $row['age'] ?>歲</div>
                        <div class="container02-1-3-2_YK">專業騎行</div>
                    </div>
                    <div class="container02-1-4_YK">
                        <div class="container02-1-4-1_YK"></div>
                        <div class="container02-1-4-2_YK"></div>
                        <div class="container02-1-4-3_YK"></div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>

<div class="container-fluid container001_YK"></div>

<div class="picbike_YK"></div>

<!-- 真實案例 1-->
<div class="hashtag01_YK gg ">
    <div class="hashtag01-1_YK ">真實案例
    </div>

</div>


<!-- phone -->
<div class="a1phone_YK d-block d-sm-none">
    <img src="./img/picmarry_YK.png" alt="" class="picmarry_YK_phone" style="width: 100%;">
</div>
<div class="a2phone_box01_YK d-block d-sm-none">『　我們的愛情，就從BikeNGo開始　』</div>
<div class="a3phone_box02_YK d-block d-sm-none">在茫茫網海裡，要遇見對的人需要機運，衷心感謝BikeNGo 給了我這樣的機運，讓我在2015年的秋天認識了他，且在2018年的秋天，他成為了陪我走一輩子的真命天子！謝謝他當初在BikeNGo發給我的讚，也謝謝BikeNGo提供了這樣的交友平台，讓因工作因素而交友圈都不算大的我們有機會認識彼此。祝福還在茫茫人海中尋找另一半的你，也能遇見屬於你的緣分！</div>

<div class="a4phone_YK d-block d-sm-none">

</div>
<div class="a5phone_box01_YK d-block d-sm-none">『　真沒料到我會在這裡遇到志同 道合的好友！　』</div>
<div class="a6phone_box02_YK d-block d-sm-none">我一直很喜歡騎單車，也把它當成休閒娛樂的一部分，由於平時忙於工作,且生活圈狹小也沒什麼機會認識新朋友，剛好看到BikeNGo 的廣告就想說試試看囉!</div>

<!-- computer -->

<div class="a1box_YK">
    <div class="a1box01_YK d-none d-sm-block">
        <div class="a1box01-1_YK d-none d-sm-block">我們的愛情，就從BikeNGo開始</div>
        <div class="a1boxline01_YK"></div>
        <div class="a1box01-2_YK d-none d-sm-block">在茫茫網海裡，要遇見對的人需要機運，<br> 衷心感謝BikeNGo給了我這樣的機運，<br>
            讓我在2015年的秋天認識了他，且在2018年的秋天，<br> 他成為了陪我走一輩子的真命天子！<br> 謝謝他當初在BikeNGo發給我的讚，<br> 也謝謝BikeNGo提供了這樣的交友平台，
            讓因工作因素而交友圈都不算大的我們有機會認識彼此。<br> 祝福還在茫茫人海中尋找另一半的你，<br> 也能遇見屬於你的緣分！</div>
    </div>
    <div class="a1box02_YK  d-none d-sm-block ">

    </div>

</div>
<div class="a2box_YK">
    <div class="a2box02_YK  d-none d-sm-block ">

    </div>
    <div class="a2box01_YK d-none d-sm-block">
        <div class="a2box01-1_YK d-none d-sm-block">真沒料到我會在這裡遇到志同道合的好友！　</div>
        <div class="a2boxline02_YK"></div>
        <div class="a2box01-2_YK d-none d-sm-block">我一直很喜歡騎單車，也把它當成休閒娛樂的一部分，<br> 由於平時忙於工作，且生活圈狹小也沒什麼機會認識新朋友，<br>
            剛好看到BikeNGo的廣告就想說試試看囉!<br> 在一開始跟他談話的過程中，發覺他很有禮貌 <br>且一直有共同話題可聊，就決定跟他參加同個行程約騎看看。<br>等實際見面騎車後，發現他會默默的照顧大家，<br> 就覺得是位好車友!
            覺得可以在上面遇到志同道合的朋友，<br> 一起揪團一起玩，讓我們每一次都在期待下一次跟 <br>大家出來參加BikeNGo行程的時間! 　
        </div>
    </div>


</div>
<div class="a0mountain03 hp_dec_same_tourmate_left_cm d-none d-sm-block"></div>

<!-- computer -->
<!-- 標籤 -->
<div class="a3comtag_YK d-none d-sm-block">最佳首選</div>
<div class="a4comword_YK  d-none d-sm-block">『　為什麼選擇BikeNGo交友？　』</div>




<div class="biga5comtag_YK">
    <div class="a5comtag_YK  d-none d-sm-block ">
        <div class="a5comtag01_YK"></div>
        <div class="a5comtag02_YK">安全</div>
        <div class="a5comtag03_YK">BikeNGo 提供的是健全的交車友平台，為了提供會員安心、安全的交友空間，我們致力於嚴格的審查、24小時巡邏，但還是需要用戶加強保護自己的安全意識。</div>

    </div>
    <div class="a5comtag_YK  d-none d-sm-block ">
        <div class="a5comtag01-2_YK"></div>
        <div class="a5comtag02_YK">興趣相投</div>
        <div class="a5comtag03_YK">有別於傳統的交友網站，BikeNGo 站上會員水準高於一般，在這裡能找到興趣相投的朋友，分享生活點滴和騎乘的樂趣。
        </div>

    </div>
    <div class="a5comtag_YK  d-none d-sm-block ">
        <div class="a5comtag01-3_YK"></div>
        <div class="a5comtag02_YK">優質</div>
        <div class="a5comtag03_YK">BikeNGo 是個優質的品牌，團隊成員各個都具有高水準的編程技術及跨領域的專業背景，因此打造出超友善人性化介面。

        </div>

    </div>
</div>

<div class="a6comdashed_YK   d-none d-sm-block"></div>

<div class="bigsquare_YK">
    <div class="a7comsquare1_YK squaregray  d-none d-sm-block"></div>
    <div class="a7comsquare2_YK   squaredipgray d-none d-sm-block"></div>
    <div class="a7comsquare3_YK  squaregray  d-none d-sm-block"></div>
    <div class="a7comsquare4_YK    squaredipgray d-none d-sm-block"></div>
    <div class="a7comsquare5_YK   squaregray d-none d-sm-block"></div>
</div>

<div class="bigsolgan_YK">
    <div class="a8comslogan1_YK  d-none d-sm-block"></div>
    <div class="a8comslogan2_YK  d-none d-sm-block"><span class="hightlightslogan_YK">他們都在BikeNGo 開啟愛情與友情的旅程</span></div>
    <div class="a8comslogan3_YK  d-none d-sm-block"></div>
</div>




<!-- computer -->
<!-- 人類標籤 -->

<div class="a9comhuman_YK  d-none d-sm-flex">
    <div class="a9com1_YK d-none d-sm-block"></div>
    <div class="a9com2_YK d-none d-sm-block"></div>
    <div class="a9com3_YK d-none d-sm-block"></div>
</div>







<!-- phone -->
<!-- 人類 -->
<div class="human_YK d-flex d-sm-none">
    <div class=" woman_YK d-block d-sm-none"></div>
    <div class="man_YK d-block d-sm-none"></div>
</div>




<!-- ........底車車....... -->

<div class="container04_YK d-block d-sm-none">



    <div class="hashtag03_YK">最佳首選</div>
    <div class="letter05_YK">『　為什麼選擇BikeNGo交友?　』</div>

    <div class="Bigcontent_YK">
        <div class="biginfo01_YK">
            <div class="info01_YK">
                <div class="info01-1_YK"></div>
                <div class="info01-2_YK"></div>
                <div class="info01-3_YK"></div>
            </div>
            <div class="info02_YK">
                <div class="info02-1_YK">
                    <div class="info02-1-1_YK">安全</div>
                    <div class="info02-1-2_YK">BikeNGo 提供的是健全的交車友平台，為了提供會員安心、安全的交友空間，我們致力於嚴格的審查、24小時巡邏，但還是需要用戶加強保護自己的安全意識。
                    </div>
                </div>
                <div class="info02-1_YK">
                    <div class="info02-1-1_YK">興趣相投</div>
                    <div class="info02-1-2_YK">有別於傳統的交友網站，BikeNGo 站上會員水準高於一般，在這裡能找到興趣相投的朋友，分享生活點滴和騎乘的樂趣。</div>
                </div>
                <div class="info02-1_YK">
                    <div class="info02-1-1_YK">優質</div>
                    <div class="info02-1-2_YK">BikeNGo 是個優質的品牌，團隊成員各個都具有高水準的編程技術及跨領域的專業背景，因此打造出超友善人性化介面。</div>
                </div>
            </div>
        </div>
    </div>

</div>




<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script src="js/jquery-3.6.0_YK.js"></script>
<script src="js/BNG_navbar_topButton_Vv.js"></script>
<script src="js/slick.min_YK.js"></script>



<script>
    $(document).ready(function() {
        $('.carousel').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        });
    });
    $('.container02-1-4-1_YK').click(function() {
        $(this).css('background-image', "url('./img/icon-user-add2.svg')")
    });
    //Page
    function page2YK(){
        window.location = "<?php echo WEB_ROOT;?>/page2-searchpage_YK.php";
    }
</script>



<?php include __DIR__ . '/parts/BNG_html_foot.php'; ?>