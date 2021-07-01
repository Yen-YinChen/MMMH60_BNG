<?php include __DIR__. '/parts/config.php'; ?>
<?php
$output = array(
    'success' => false,
    'code' => 0,
    'error' => '修改密碼失敗',
    'pw' => $_POST['inputResetPW01'],
    'hash' => $_POST['hash']
);
$inputHash = $_POST['hash'];

$a_sql = "SELECT * FROM `members` WHERE `hash`=?";
$a_stmt = $pdo->prepare($a_sql);
$a_stmt->execute([$inputHash]);
$row = $a_stmt->fetch();

if (empty($row)) {
    $output['error'] = '無資料';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;  // 程式結束
}

$hash = $row['hash'];
$inputNewPW = $_POST['inputResetPW01'];

$sql = "UPDATE `members`
        SET `password`=?
        WHERE `hash`= ?";
$stmt = $pdo->prepare($sql);
$stmt -> execute([
    $inputNewPW,
    $hash
]);

if ($stmt->rowCount()) {
    $output['success'] = true;
    $output['error'] = '';
} else {
    $output['error'] = '修改失敗';
}
echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>

