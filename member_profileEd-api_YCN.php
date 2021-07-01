<?php include __DIR__. '/parts/config.php'; ?>
<?php

$output = [
    'success' => false,
    'code' => 0,
    'error'=> '更新失敗',
];

$name = $_POST['name'];
$age = $_POST['age'];
$location = $_POST['location'];
$job = $_POST['job'];
$intro = $_POST['intro'];
$gender = $_POST['gender'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$birthday = $_POST['birthday'];
$horoscope = $_POST['horoscope'];
$area = $_POST['area'];
$education = $_POST['education'];
$my_bike = $_POST['my_bike'];
$hobby = $_POST['hobby'];
$specialty = $_POST['specialty'];

if (isset($_SESSION['user']['email'])){
    $a_sql = "SELECT * FROM `members` WHERE `email`=?";
    $a_stmt = $pdo->prepare($a_sql);
    $a_stmt -> execute([$_SESSION['user']['email']]);
    $row = $a_stmt->fetch();
    $email = $row['email'];
    if (empty($row) or ($_SESSION['user']['email'] !== $row['email'])) {
        $output['error'] = 'error';
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    } else {
        /*
        $name = empty($_POST['name'])? $row['name']: $_POST['name'];
        $age  = empty($_POST['age'])? $row['age']: $_POST['age'];
        $location = empty($_POST['location'])? $row['location']: $_POST['location'];
        $job = empty($_POST['job'])? $row['job']: $_POST['job'];
        $intro = empty($_POST['intro'])? $row['intro']: $_POST['intro'];
        $gender = empty($_POST['gender'])? $row['gender']: $_POST['gender'];
        $weight = empty($_POST['weight'])? $row['weight']: $_POST['weight'];
        $birthday = empty($_POST['birthday'])? $row['birthday']: $_POST['birthday'];
        $horoscope = empty($_POST['horoscope'])? $row['horoscope']: $_POST['horoscope'];
        $area = empty($_POST['area'])? $row['area']: $_POST['area'];
        $education = empty($_POST['education'])? $row['education']: $_POST['education'];
        $my_bike = empty($_POST['my_bike'])? $row['my_bike']: $_POST['my_bike'];
        $hobby = empty($_POST['hobby'])? $row['hobby']: $_POST['hobby'];
        $specialty = empty($_POST['specialty'])? $row['specialty']: $_POST['specialty'];
        */



        /* -- Updating the member's data ----*/
        $sql = "UPDATE `members` 
                SET `name`= ?,
                    `age` = ?,
                    `location`= ?,
                    `job`= ?,
                    `intro`= ?,
                    `gender`= ?,
                    `height`= ?,
                    `weight`= ?,
                    `birthday`= ?,
                    `horoscope`= ?,
                    `area`= ?,
                    `education`= ?,
                    `my_bike`= ?,
                    `hobby`= ?,
                    `specialty`= ?
                WHERE `email`= ?";

        $stmt = $pdo->prepare($sql);
        $stmt -> execute([
            $name,
            $age,
            $location,
            $job,
            $intro,
            $gender,
            $height,
            $weight,
            $birthday,
            $horoscope,
            $area,
            $education,
            $my_bike,
            $hobby,
            $specialty,
            $email
        ]);

        /*--- check and show if update is successful------*/
        if($stmt->rowCount()){
            $output['success'] = true;
            $output['error'] = '';
        } else {
            $output['error'] = '更新資料錯誤';
        }
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
    }
} else {
    /*--- if $_POST['user']['email] is empty, echo error and exit---*/
    $output['error'] = 'error';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

?>