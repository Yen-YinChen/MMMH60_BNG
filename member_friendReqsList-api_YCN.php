<?php include __DIR__. '/parts/config.php'; ?>
<?php

$fr_req_output = [
    'attempt' => '更新好友邀請表單',
    'success' => false,
    'code' => 0,
    'error'=> '好友邀請表單更新失敗',
];

$fr_list_output = [
    'attempt' => '輸入好友表單',
    'success' => false,
    'code' => 0,
    'error'=> '好友表單未輸入'
];
$action = $_GET['action'];
$sender_sid = intval($_GET['sender_sid']);
$userSid = intval($_GET['userSid']);
$ref_page = $_SERVER['HTTP_REFERER'];
switch($action){
    case 'accept':
        if(!empty($sender_sid) and !empty($userSid)) {
            /*----update 'accept' into friend requests table in DB----*/
            $sql = "UPDATE `friend_requests`
            SET `outcome`= ?
            WHERE `sender`=? AND `recipient`=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'TRUE',
                $sender_sid,
                $userSid
            ]);
            $acceptRow = $stmt->fetch();
            if (!isset($acceptRow)) {
                $fr_req_output['error'] = '好友邀請更新失敗';
                echo json_encode($fr_req_output, JSON_UNESCAPED_UNICODE);
                echo json_encode($acceptRow, JSON_UNESCAPED_UNICODE);
                exit;
            } else {
                $fr_req_output['success'] = 'true';
                $fr_req_output['code'] = 1;
                $fr_req_output['error'] = '';

                /*-----Insert new friend row into "friends" table in DB-----*/
                $a_sql = "INSERT INTO `friends`(
                      `member1_sid`, `member2_sid`, `created_at`)
                      VALUES (?,?, NOW())";
                $a_stmt = $pdo->prepare($a_sql);
                $a_stmt->execute([
                    $sender_sid,
                    $userSid
                ]);
                $newFriendsRow = $a_stmt->fetch();
                if (!isset($newFriendsRow)) {
                    $fr_list_output['error'] = '好友資料輸入失敗';
                    echo json_encode($fr_list_output, JSON_UNESCAPED_UNICODE);
                    exit;
                } else {
                    /*
                    $fNameSql = "SELECT `name` from `members` WHERE `member_sid`=?";
                    $fNstmt = $pdo->prepare($fNameSql);
                    $fNstmt->execute([
                        $sender_sid
                    ]);
                    $newFriendNameRow = $fNstmt->fetch();
                    $newFriendName = $newFriendNameRow['name'];
                    */

                    $fr_list_output['success'] = 'true';
                    $fr_list_output['code'] = 1;
                    $fr_list_output['error'] = '';
                };
            }
        } else {
            $fr_req_output['error'] = '更新失敗(sender or userSid error)';
            echo json_encode($fr_req_output, JSON_UNESCAPED_UNICODE);
            exit;
        }
        echo json_encode([
            'update_FrRequest'=> $fr_req_output,
            'insert_FrList' => $fr_list_output,
//            'newFriendName'=> $newFriendName
        ], JSON_UNESCAPED_UNICODE);
        break;
    case 'decline':
        if(!empty($sender_sid) and !empty($userSid)){
            /*--update 'decline' into friend requests table--*/
            $d_sql = "UPDATE `friend_requests`
                     SET `outcome`=?
                     WHERE `sender`=? AND `recipient`=?";
            $d_stmt = $pdo->prepare($d_sql);
            $d_stmt->execute([
                'FALSE',
                $sender_sid,
                $userSid
            ]);
            $declinedRequestRow = $d_stmt->fetch();
            if (!isset($declinedRequestRow)){
                $fr_req_output['error'] = '好友邀請更新失敗';
                exit;
            } else {
                $fr_req_output['success'] = 'true';
                $fr_req_output['code'] = 1;
                $fr_req_output['error'] = '';
            }

        } else {
            $fr_req_output['error'] = '更新失敗(sender or userSid error)';
            echo json_encode($fr_req_output, JSON_UNESCAPED_UNICODE);
            exit;
        }
        echo json_encode([
            'update_FrRequest'=> $fr_req_output
        ], JSON_UNESCAPED_UNICODE);
        break;
}

?>
