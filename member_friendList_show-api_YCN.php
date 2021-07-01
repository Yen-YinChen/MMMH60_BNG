<?php include __DIR__. '/parts/config.php'; ?>
<?php
$output = [
    'success' => false,
    'code' => 0,
    'error' => ' 讀取失敗'
];

//if (isset($_POST['showFriendSid'])){
//    unset($_SESSION['showSid']);
//    $_SESSION['showSid'] = $_POST['showFriendSid'];
//}

$sql = "SELECT * FROM `members` WHERE `member_sid`=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_GET['showFriendSid']]);
$fRow = $stmt->fetch();
if(empty($fRow)) {
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
} else{
    if(empty($fRow['profile_pic01'])){
        $fRow['profile_pic01'] = $fRow['member_id'] . '.jpg';
    }
    $output['success'] = true;
    $output['code'] = 1;
    $output['error'] = '';
}

echo json_encode([
    'output'=> $output,
    'fRow'=> $fRow
], JSON_UNESCAPED_UNICODE);
?>