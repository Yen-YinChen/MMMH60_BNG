<?php
include __DIR__. '/parts/config.php'; 




// 1. 列表 2. 加入 3. 變更數量 4. 移除項目
// 1. list 2. add 3. update 4. delete

$action = isset($_GET['action']) ? $_GET['action'] : 'list'; //操作的動作
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0; //商品id
$type = isset($_GET['type']) ? intval($_GET['type']) : 2; //商品id

$output = [
    'success' => false,
    'addOrDel' => '',
    'result' => 0,
];

if (empty($_SESSION['user'])) {
    $output['result'] = -1;
} else {
    // switch ($action) {
    //     case 'add':
    $output['result'] = 1;


    //如果沒有抓到pid
    if (!empty($pid)) {
        $sql = "SELECT * FROM favorites WHERE member_id =? AND `type`=? AND  `target_id`=?"; // 查詢資料表
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $_SESSION['user']['id'],
            $type,
            $pid
            ]);

        $row = $stmt->fetch(); //撈出一筆資料
        $output['result'] = ($row);


        if (empty($row)) {

            // $s_sql = "SELECT * FROM favorites WHERE target_id=$pid"; // 查詢資料表
            // // $s_row = $pdo->query($sql)->fetch(); //撈出一筆資料
            // $stmt = $pdo->prepare($s_sql);
            // $stmt->execute();

            // if ($stmt->rowCount()) {
            //     $output['result'] = 4;
            //     // 如果有　就刪除
            //     $target_id = $pid;
            //     $df_sql = "DELETE FROM favorites WHERE member_id =2 AND `target_id`= $target_id";
            //     $df_stmt = $pdo->prepare($df_sql);
            //     $df_stmt->execute();
            // } else {
            $output['result'] = 5;
            $output['addOrDel'] = 'add';
            // 沒有　就新增
            // $_SESSION['user']['id'] = 2;

            //
            $target_id = $pid;
            $f_sql = "INSERT INTO favorites ( `member_id`, `type`, `target_id`, `date`)
                                            VALUES ( ?, ?, ?, NOW())";
            $f_stmt = $pdo->prepare($f_sql);
            $f_stmt->execute([
                $_SESSION['user']['id'],
                $type,
                $target_id
            ]);

            //     $favorite_sid = $pdo->lastInsertId();
            // }
        } else {
            $output['addOrDel'] = 'del';
            $target_id = $pid;
            $df_sql = "DELETE FROM favorites WHERE member_id =? AND `type`=? AND  `target_id`= $target_id";
            $df_stmt = $pdo->prepare($df_sql);
            $df_stmt->execute([
                $_SESSION['user']['id'],
                $type
                ]);
        }
    }
}
//         break;


//     case 'delete':
//         if (!empty($pid)) {
//             // $where = " WHERE member_id = $_SESSION['user']['id'] ";
//             // $where
//             $target_id = $pid;
//             $df_sql = "DELETE FROM favorites WHERE member_id =2 AND `target_id`= $target_id";
//             $df_stmt = $pdo->prepare($df_sql);
//             $df_stmt->execute();
//         }
//         break;

//     default:
//     case 'list':
// }

echo json_encode($output, JSON_UNESCAPED_UNICODE);
