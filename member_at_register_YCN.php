<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員註冊';
$pageName = 'register';
?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>
<link rel="stylesheet" href="css/member_at_register-ycn.css">
<title>register</title>
</head>
<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php'; ?>

<!-- ---- REGISTER----註冊頁 ycn -->
<div class="register-ycn">
    <div class="container register-wrapper-ycn">
        <div class="container title-div-register-ycn" id="register-title-div">
            <svg class="icon-arrow-down" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z">
                </path>
            </svg>
            <p class="register title-register-ycn">會員註冊</p>
        </div>
        <form name="regiForm" id="regiForm" class="register-form ycn" method="post" novalidate onsubmit="checkForm();return false;">
            <div class="form-group email ycn">
                <div class="email-inside-div ycn">
                    <label class="label" for="inputEmail">帳號
                    </label>
                    <div class="email-input-div">
                        <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="請輸入電子郵件信箱">
                        <small id="emailError"></small>
                    </div>
                </div>
            </div>
            <div class="form-group password ycn">
                <div class="password-inside-div">
                    <label class="label" for="inputPassword">密碼</label>
                    <div class="passwordInput ycn">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="請輸入密碼">
                        <small id="passwordError"></small>
                    </div>

                </div>
            </div>
            <div class="submit-div ycn">
                <button type="submit" id="register-submit" class="btn btn-primary">註冊</button>
            </div>
        </form>
        <div class="row register-retrieve-pw-ycn">
            <div class="register-retrieve-inner-div-register ycn">
                <a id="regLink" href="<?php echo WEB_ROOT; ?>/member_at_login_YCN.php">會員登入</a>
            </div>
            <div class="retrieve-retrieve-inner-div-retrieve ycn">
                <a id="retrPwLink" href="<?php echo WEB_ROOT; ?>/member_at_forgetPW_YCN.php">忘記密碼</a>
            </div>
            <div class="hidden-login-new-member-div" style="position:relative">
                <div id="hidden-login-new-member-click" style="width:50px; height:50px; position:absolute; left: -220px; top: 65px; outline: 1px solid transparent;"></div>
            </div>
        </div>

    </div>
</div>
<!--------end REGISTER 註冊頁 ycn----- -->

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script src="<?php echo WEB_ROOT; ?>/js/sweetalert_all_min.js"></script>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const $email = $('#inputEmail');
    const fields = [$email];

    function checkForm() {
        fields.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.next().text('');
        })
        let isPass = true;
        // if($name.val().length < 2){
        //     isPass = false;
        //     $name.css('border', '1px solid red ');
        //     $name.next().text('Please enter name')
        // }
        if (!email_re.test($email.val())) {
            isPass = false;
            $email.css('border', '1px solid red');
            $email.next().text('請輸入正確的email格式');
        }
        /*
        if (!mobile_re.test($mobile.val())){
            isPass = false;
            $mobile.css('border', '1px solid red');
            $mobile.next().text('Please enter mobile number');
        }
         */
        if (isPass) {
            $.post(
                'member_at_register-api_YCN.php',
                $('#regiForm').serialize(),
                function(data) {
                    // console.log(data);
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '註冊成功',
                            text: '現在就登入BikeNGo吧～',
                            timer: 2500,
                            showConfirmButton: false,
                        });
                        setTimeout(() => {
                            window.location = "<?php echo WEB_ROOT; ?>/member_at_login_YCN.php";
                        }, 4000);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: '註冊錯誤',
                            text: '麻煩檢查帳號或密碼後再輸入一次喔～',
                            timer: 2100,
                            showConfirmButton: false,
                        });
                    }
                },
                'json'
            )
        }

    }

    // Login: as newly registered member:
    $('#hidden-login-new-member-click').click(function(event) {
        $('#inputEmail').val('ncdy9999@gmail.com');
        $('#inputPassword').val('1234');
    });
</script>
<?php include  __DIR__ . '/parts/BNG_html_foot.php'; ?>