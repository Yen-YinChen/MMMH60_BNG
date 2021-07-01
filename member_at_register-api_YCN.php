<?php include __DIR__ . '/parts/config.php'; ?>
<?php

$output = [
    'success' => false,
    'code' => 0,
    'error'=> '註冊失敗',
];

if(isset($_POST['email'])){
    $a_sql = "SELECT `email` FROM `members` WHERE `email`=?";
    $a_stmt = $pdo->prepare($a_sql);
    $a_stmt -> execute([$_POST['email']]);
    if($a_stmt->rowCount()){
        $output['error'] = 'email has been registered';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

    $hash = sha1($_POST['email']. uniqid());

    $sql = "INSERT INTO `members`(
                           `email`, `password`, `hash`, `created_at`)
                           VALUES ( ?, ?, ?, NOW() )";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute([
        $_POST['email'],
        $_POST['password'],
        $hash
    ]);
    if($stmt->rowCount()){
        $output['success'] = true;
        $output['error'] = '';
    } else{
        $output['error'] = '註冊錯誤';
    }
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>