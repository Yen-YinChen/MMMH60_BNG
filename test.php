<?php include __DIR__. '/parts/config.php'; ?>
<?php
$title = 'BNG'; //可將BNG改寫為自己頁面的名稱
?>

<?php include __DIR__. '/parts/BNG_head_Vv.php'; ?>


    </head>
<?php include __DIR__. '/parts/BNG_navbar_topButton_Vv.php'; ?>
<div style="width: 800px; height:300px; background-color:red;"></div>
    <div style="font-size: 20px; color:blue;"><?= $_SESSION['user']['member_id'] ?> </div>

<?php include __DIR__. '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__. '/parts/BNG_scripts_Vv.php'; ?>
    <script>
        /* 請放入自己頁面的js程式碼或者掛上js檔連結，檔案請存放在js資料夾中*/
    </script>
<?php include  __DIR__. '/parts/BNG_html_foot.php' ;?>