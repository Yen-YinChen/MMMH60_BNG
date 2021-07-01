<?php include __DIR__. '/parts/config.php'; ?>
<?php
$output = [
    'success' => false,
    'filename' => '',
    'error' => '沒有上傳檔案',
    'file' => '',
];

$exts = [
    'image/png' => '.png',
    'image/jpeg' => '.jpg',
];

if(isset($_FILES['avatar'])){
    if( empty($exts[$_FILES['avatar']['type']])){
        $output['error'] = '只接受 png, jpg';
    } else {
        $ext = $exts[$_FILES['avatar']['type']];  // 取得副檔名1
        $output['file'] = $_FILES['avatar'];
        $dir = __DIR__. '/img/members/';  // 存放的路徑
        $fname =  uniqid(). rand(100, 999). $ext;  // 儲存的檔名
        $output['filename'] = $fname;

        if( move_uploaded_file($_FILES['avatar']['tmp_name'], $dir. $fname) ){
            $output['success'] = true;
            $output['error'] = '';

            $email = $_SESSION['user']['email'];
            $a_sql = "UPDATE `members`
            SET `profile_pic01`=?
            WHERE `email`= ?";
            $a_stmt = $pdo->prepare($a_sql);
            $a_stmt -> execute([
                $fname,
                $email
            ]);

            if($a_stmt->rowCount()){
                $output['success'] = true;
                $output['error'] = '';
            } else {
                $output['error'] = '資料沒有修改';
            }

        }
    }
}
header('Content-Type: application/json');
echo json_encode($output, JSON_UNESCAPED_UNICODE);