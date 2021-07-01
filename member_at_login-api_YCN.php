<?php include __DIR__ . '/parts/config.php'; ?>

<?php
$output = [
    'success' => false,
    'code' => 0,
    'error' => '帳號或密碼錯誤'
];
if(isset($_POST['email'])) {

    // TODO: 欄位資料檢查

    $a_sql = "SELECT * FROM `members` WHERE `email`=?";
    $a_stmt = $pdo->prepare($a_sql);
    $a_stmt->execute([ $_POST['email'] ]);
    $row = $a_stmt->fetch();

    if(empty($row)) {
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;  // 程式結束
    }

    if($_POST['password'] == $row['password']){
        unset($row['password']);
        unset($row['hash']);
        $_SESSION['user'] = $row;
        $output['success'] = true;
        $output['error'] = '';
    }

}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
//echo json_encode($_SESSION['user'], JSON_UNESCAPED_UNICODE);

