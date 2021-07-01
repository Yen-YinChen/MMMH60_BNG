<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '會員登入';
$pageName = 'login';

?>
<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>
<link rel="stylesheet" href="css/member_at_login-ycn.css">
<title>login</title>
</head>
<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php'; ?>

<!-- ---- login----登入頁 ycn -->
<div class="login-ycn">
    <div class="container login-wrapper-ycn">
        <div class="container title-div-login-ycn" id="login-title-div">
            <svg class="icon-arrow-down" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z">
                </path>
            </svg>
            <p class="login title-login-ycn">會員登入</p>
        </div>
        <form name="login-form" id="login-form" class="login-form ycn" method="post" novalidate onsubmit="checkForm(); return false;">
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
                <button type="submit" id="login-submit" class="btn btn-primary">登入</button>
            </div>
        </form>
        <div class="row login-retrieve-pw-ycn">
            <div class="login-retrieve-inner-div-login ycn">
                <a id="regLink" href="<?php echo WEB_ROOT; ?>/member_at_register_YCN.php">註冊會員</a>
            </div>
            <div class="retrieve-retrieve-inner-div-retrieve ycn">
                <a id="retrPwLink" href="<?php echo WEB_ROOT; ?>/member_at_forgetPW_YCN.php">忘記密碼</a>
            </div>
        </div>
        <div class="hidden-login-new-member-div" style="position:relative">
            <div id="hidden-login-new-member-click" style="width:50px; height:50px; position:absolute; left: -50px; top: 30px;"></div>
        </div>
        <div class="hidden-login-lee-div" style="position:relative; margin-left: 2rem;">
            <div id="hidden-login-lee-click" style="width:50px; height:50px; position:absolute; left: 200px; top:30px;"></div>
        </div>
    </div>
</div>
<!--------endof login 登入頁 ycn----- -->

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script src="<?php echo WEB_ROOT; ?>/js/sweetalert_all_min.js"></script>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    $email = $('#inputEmail');
    const fileds = [$email];

    function checkForm() {
        // 回復原來的狀態
        fileds.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.next().text('');
        });

        let isPass = true;

        if (!email_re.test($email.val())) {
            isPass = false;
            $email.css('border', '1px solid red');
            $email.next().text('請輸入正確的 email');
        }


        if (isPass) {
            $.post(
                'member_at_login-api_YCN.php',
                $('#login-form').serialize(),
                function(data) {
                    console.log('data', data)
                    if (data.success) {

                        Swal.fire({
                            icon: 'success',
                            title: '歡迎登入BikeNGo!',
                            showConfirmButton: false,
                        })
                        setTimeout(() => {
                            window.location = "<?php echo WEB_ROOT; ?>/BNG_homepag_Vv.php";
                        }, 2000);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '登入錯誤',
                            text: '請再檢查一下您輸入的帳號或密碼喔～',
                            showConfirmButton: false,
                            timer: 3000,
                        })
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

    //Login: as Lee Song 435:
    $('#hidden-login-lee-click').click(function(event) {
        $('#inputEmail').val('mwhwbh435@gmail.com');
        $('#inputPassword').val('lee435');
    })
</script>
<?php include  __DIR__ . '/parts/BNG_html_foot.php'; ?>