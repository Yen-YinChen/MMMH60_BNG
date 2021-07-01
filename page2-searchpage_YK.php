<?php include __DIR__. '/parts/config.php'; ?>
<?php
$limit = 9;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$area_N = isset($_GET['area_N']) ? $_GET['area_N'] : '';
$area_M =  isset($_GET['area_M']) ? $_GET['area_M'] : '';
$area_S = isset($_GET['area_S']) ? $_GET['area_S'] : '';
$area_E = isset($_GET['area_E']) ? $_GET['area_E'] : '';

if (!isset($_GET['area_N']) && !isset($_GET['area_M']) && !isset($_GET['area_S']) && !isset($_GET['area_E'])) {
    $area_N = '北區';
}

$education = isset($_GET['education']) ? $_GET['education'] : '大學';

if (empty($_GET['gender']) || $_GET['gender'] == '皆可') {
    $_GET['gender'] = '皆可';
    $man = '男';
    $woman = '女';
} else {
    if ($_GET['gender'] == '男') {
        $man = '男';
        $woman = '';
    } else {
        $man = '';
        $woman = '女';
    }
}

$ageSql = null;
$age1 = isset($_GET['age1']) ? 'and ( (age > 18 and age < 25)' : null;
if (isset($age1)) {
    $ageSql = $ageSql . $age1;
}

$age2 = isset($_GET['age2']) ? '(age > 26 and age < 33)' : null;
if (isset($age2)) {
    $ageSql = isset($ageSql) ? $ageSql . ' or ' . $age2 : ' and (' . $ageSql . $age2;
}

$age3 = isset($_GET['age3']) ? '(age > 34 and age < 41)' : null;
if (isset($age3)) {
    $ageSql = isset($ageSql) ? $ageSql . ' or ' . $age3 : ' and (' . $ageSql . $age3;
}

$age4 = isset($_GET['age4']) ? '(age > 42)' : null;
if (isset($age4)) {
    $ageSql = isset($ageSql) ? $ageSql . ' or ' . $age4 : ' and (' . $ageSql . $age4;
}

if (isset($ageSql)) {
    $ageSql = $ageSql . ')';
}


$heightSql = null;
$height1 = isset($_GET['height1']) ? 'and ( (height > 155 and height < 163)' : null;
if (isset($height1)) {
    $heightSql = $heightSql . $height1;
}

$height2 = isset($_GET['height2']) ? '(height > 164 and height < 168)' : null;
if (isset($height2)) {
    $heightSql = isset($heightSql) ? $heightSql . ' or ' . $height2 : ' and (' . $heightSql . $height2;
}

$height3 = isset($_GET['height3']) ? '(height > 169 and height < 174)' : null;
if (isset($height3)) {
    $heightSql = isset($heightSql) ? $heightSql . ' or ' . $height3 : ' and (' . $heightSql . $height3;
}

$height4 = isset($_GET['height4']) ? '(height > 175)' : null;
if (isset($height4)) {
    $heightSql = isset($heightSql) ? $heightSql . ' or ' . $height4 : ' and (' . $heightSql . $height4;
}

if (isset($heightSql)) {
    $heightSql = $heightSql . ')';
}


$start = ($page - 1) * $limit;
$query = $pdo->prepare("SELECT * FROM members where area in (?, ?, ?, ?) and education=? and gender in (?, ?) $ageSql $heightSql LIMIT $start,9");
$query->execute([$area_N, $area_M, $area_S, $area_E, $education, $man, $woman]);
$data = $query->fetchAll();


$query2 = $pdo->prepare("SELECT count(*) FROM members where area in (?, ?, ?, ?) and education=? and gender in(?, ?) $ageSql $heightSql");
$query2->execute([$area_N, $area_M, $area_S, $area_E, $education, $man, $woman]);
$total_results = $query2->fetchColumn();
$total_pages = ceil($total_results / $limit);

?>
<?php
$title = '交友搜尋';
?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>

<link rel="stylesheet" href="./bootstrap-4.6.0-dist/css/bootstrap.css">
<link rel="stylesheet" href="./css/slick-theme_YK.css">
<link rel="stylesheet" href="./css/slick_YK.css">
<link rel="stylesheet" href="./css/search_page_YK.css">
<link rel="stylesheet" href="./css/BNG_footer_Vv.css">
<link rel="stylesheet" href="./css/BNG_navbar_topButton_Vv.css">
<link rel="stylesheet" href="./icheck-1.0.3/skins/square/orange.css">


</head>

<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php'; ?>
<style>
    .page-link.active {
        background: #007bff;
    }
</style>


<div class="container friend-profile-page-anne search-section-YK">

    <div class="row">

        <!-- 左側menu -->
        <section class="menu-list-anne col-12 col-md-5 col-lg-3">

            <!-- 麵包屑 -->
            <div class="menu mt-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#index-list-anne"> 首頁 > <a></li>
                        <li class="breadcrumb-item"><a href="#profile-index"> 交友主頁 > <a></li>
                        <li class="breadcrumb-item"><a href="#profile-search"> 交友搜尋 > <a></li>
                        <li class="breadcrumb-item active" aria-current="page">北區</li>
                    </ol>
                </nav>

                <form name="form" method="get" class="menubar-anne">
                    <div class="list-group">
                        <h3 class="menu-list">搜尋</h3>


                        <h4 class="menu-content-anne">地區</h4>
                        <div class="form-anne">
                            <!-- checked checkbox color to orange -->
                            <input type="checkbox" name="area_N" class="form-check-input-anne" value="北區" onChange="submitform()" <?= $area_N == '北區' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleCheck1">北區</label>
                        </div>
                        <div class="form-anne">
                            <input type="checkbox" name="area_M" class="form-check-input-anne" value="中區" onChange="submitform()" <?= $area_M == '中區' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleCheck1">中區</label>
                        </div>
                        <div class="form-anne">
                            <input type="checkbox" name="area_S" class="form-check-input-anne" value="南區" onChange="submitform()" <?= $area_S == '南區' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleCheck1">南區</label>
                        </div>
                        <div class="form-anne">
                            <input type="checkbox" name="area_E" class="form-check-input-anne" value="東區" onChange="submitform()" <?= $area_E == '東區' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="exampleCheck1">東區</label>
                        </div>


                        <h4 class="menu-content-anne">性別</h4>
                        <div class="form-anne">
                            <input type="radio" name="gender" class="form-check-input" name="flexRadioDefault" id="gender1" value="男" onChange="submitform()" <?= $_GET['gender'] == '男' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="gender1">男性</label>
                        </div>
                        <div class="form-anne">
                            <input type="radio" name="gender" class="form-check-input" name="flexRadioDefault" id="gender2" value="女" onChange="submitform()" <?= $_GET['gender'] == '女' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="gender2">女性</label>
                        </div>
                        <div class="form-anne">
                            <input type="radio" name="gender" class="form-check-input" name="flexRadioDefault" id="gender3" value="皆可" onChange="submitform()" <?= $_GET['gender'] == "皆可" ? 'checked' : '' ?>>
                            <label class="form-check-label" for="gender3">皆可</label>
                        </div>

                        <h4 class="menu-content-anne">年齡</h4>
                        <div class="form-anne">

                            <div class="form-bar-anne">
                                <div class="form-anne">
                                    <input type="checkbox" name="age1" class="form-check-input-anne" id="age1" value="age1" onChange="submitform()" <?= isset($_GET['age1']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="age1">18 - 25 </label>
                                </div>
                                <div class="form-anne">
                                    <input type="checkbox" name="age2" class="form-check-input-anne" id="age2" value="age2" onChange="submitform()" <?= isset($_GET['age2']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="age2">26 - 33 </label>
                                </div>
                                <div class="form-anne">
                                    <input type="checkbox" name="age3" class="form-check-input-anne" id="age3" value="age3" onChange="submitform()" <?= isset($_GET['age3']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="age3">34 - 41 </label>
                                </div>
                                <div class="form-anne">
                                    <input type="checkbox" name="age4" class="form-check-input-anne" id="age4" value="age4" onChange="submitform()" <?= isset($_GET['age4']) ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="age4">42 - 50+ </label>
                                </div>
                            </div>




                        </div>


                        <h4 class="menu-content-anne">身高</h4>


                        <div class="form-anne">
                            <input type="checkbox" name="height1" class="form-check-input-anne" id="height1" value="height1" onChange="submitform()" <?= isset($_GET['height1']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="height1">155 - 163 </label>
                        </div>

                        <div class="form-anne">
                            <input type="checkbox" name="height2" class="form-check-input-anne" id="height2" value="height2" onChange="submitform()" <?= isset($_GET['height2']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="height2">164 - 168 </label>
                        </div>


                        <div class="form-anne">
                            <input type="checkbox" name="height3" class="form-check-input-anne" id="height2" value="height3" onChange="submitform()" <?= isset($_GET['height3']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="height3">169 - 174 </label>
                        </div>

                        <div class="form-anne">
                            <input type="checkbox" name="height4" class="form-check-input-anne" id="height4" value="height4" onChange="submitform()" <?= isset($_GET['height4']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="height4">175 - 181+ </label>
                        </div>




                        <h4 class="menu-content-anne">最高學歷</h4>

                        <div class="form-anne">
                            <input type="radio" name="education" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault" value="博士" onChange="submitform()" <?= $education == '博士' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault">博士</label>
                        </div>
                        <div class="form-anne">
                            <input type="radio" name="education" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault2" value="研究所" onChange="submitform()" <?= $education == '研究所' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault2">研究所</label>
                        </div>
                        <div class="form-anne">
                            <input type="radio" name="education" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault3" value="大學" onChange="submitform()" <?= $education == '大學' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault3">大學</label>
                        </div>
                        <div class="form-anne">
                            <input type="radio" name="education" class="form-check-input" name="flexRadioDefault" id="flexRadioDefault4" value="高中" onChange="submitform()" <?= $education == '高中' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="flexRadioDefault4">高中</label>
                        </div>
                    </div>
                </form>

            </div>




        </section>

        <!-- 右側交友列表 -->
        <section class="profile-list-anne col-12 col-md-7 col-lg-9">


            <div class="area-title">
                <!--                    <h3 class="profile-page-title">北區 </h3>-->

                <div class="card-list row">
                    <?php
                    foreach ($data as $row) {
                        $gender = $row['gender'] == '男' ? 'M' : 'F';
                        switch ($row['bng_level']) {
                            case 1:
                                $level = '新手入門';
                                break;
                            case 2:
                                $level = '中階車手';
                                break;
                            case 3:
                                $level = '高階車手';
                                break;
                        }
                    ?>
                        <div class="card align-items-center" style="width: 260px; ">
                            <img src="./img/members/<?= $row['member_id'] ?>.jpg" class="card-img-top">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= $row['name'] ?></h5>
                                <p class="card-text"><?= $row['age'] ?>歲 <?= $level ?></p>
                                <div class="btn-media-anne mt-3">
                                    <a href=""><i class="fas fa-user-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>



                <div class="page-btn ">
                    <nav aria-label="profile-Page navigation ">
                        <ul class="pagination ">
                            <?php
                            if ($page > 1) {
                            ?>
                                <li class="page-item ">
                                    <a class="page-link" href='?<?php echo $_SERVER['QUERY_STRING']; ?>&page=<?= ($page - 1) ?>' aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                            ?>
                                <li class="page-item"><a class="page-link <?= ($page == $i) ? 'active' : '' ?>" href='?<?php echo $_SERVER['QUERY_STRING']; ?>&page=<?= $i ?>'><?= $i ?></a></li>
                            <?php } ?>
                            <?php
                            if ($total_pages > $page) {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href='?<?php echo $_SERVER['QUERY_STRING']; ?>&page=<?= ($page + 1) ?>' aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </nav>
                </div>

            </div>

        </section>











    </div>






</div>

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://kit.fontawesome.com/57aa3e59b9.js" crossorigin="anonymous"></script>
<script src="icheck-1.0.3/icheck.js"></script>
<script src="js/BNG_navbar_topButton_Vv.js"></script>
<script src="./scripts_YK.php"></script>

<script>
    $(document).ready(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-orange',
            radioClass: 'iradio_square-orange',
            increaseArea: '20%' // optional
        });
    });
</script>


<script type="text/javascript">
    function submitform() {
        document.form.submit();
    }
</script>

<?php include __DIR__ . '/parts/BNG_html_foot.php'; ?>