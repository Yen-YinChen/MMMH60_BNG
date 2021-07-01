<?php include __DIR__. '/parts/config.php'; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/SMTP.php';

//Load Composer's autoloader
//require 'vendor/autoload.php';

//check if email account exist in MySQL DB
$output = [
    'success' => false,
    'code' => 0,
    'error' => '帳號錯誤 請重新輸入或註冊會員'
];
//if(isset($_POST['email'])) {

    // TODO: 欄位資料檢查

    $a_sql = "SELECT * FROM `members` WHERE `email`=?";
    $a_stmt = $pdo->prepare($a_sql);
    $a_stmt->execute([$_POST['email']]);
    $row = $a_stmt->fetch();

    if (empty($row)) {
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;  // 程式結束
    }



//Sending email using PHPMailer:
    $email = $_POST['email'];
    $name = $row['name'];
    $subject = 'PW Reset';
    $hash = $row['hash'];
    $body = 'Hi '. $row['name'] . 'please click the link below to reset your password: '. '<br>' . 'http://localhost/MMMH60_BNG/member_at_resetPW_YCN.php?h=' . $row['hash'] ;


//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'bikengo2021@gmail.com';                     //SMTP username
    $mail->Password   = 'bng2021go';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('bikengo2021@gmail.com', 'BIKENGO');
    $mail->addAddress($email, $name);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $output['success'] = true;
    $output['error'] = '';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}










