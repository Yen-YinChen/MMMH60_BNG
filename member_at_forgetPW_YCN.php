<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '忘記密碼';
$pageName = 'forgetPW';
?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>
<link rel="stylesheet" href="css/member_at_forgetPW-ycn.css">
</head>
<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php'; ?>

<!-- ---- forgetPW----登入頁 ycn -->
<div class="forgetPW-ycn">
    <div class="container forgetPW-wrapper-ycn">
        <div class="container title-div-forgetPW-ycn" id="forgetPW-title-div">
            <svg class="icon-arrow-down" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z">
                </path>
            </svg>
            <p class="forgetPW title-forgetPW-ycn">忘記密碼</p>
        </div>
        <form name="forgetPW" id="forgetPW" class="forgetPW-form ycn" method="post" novalidate onsubmit="checkForm(); return false;">
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
            <div class="submit-div ycn">
                <button type="submit" id="forgetPW-submit" class="btn btn-primary">發送連結</button>
            </div>
        </form>
        <div class="hidden-forgetPWSend-div" style="position:relative">
            <div id="hidden-forgetPWSend-click" style="width:50px; height:50px; position:absolute; left: -40px; top: 60px; "></div>
        </div>
    </div>
</div>
<!--------endof forgetPW 登入頁 ycn----- -->

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script src="<?php echo WEB_ROOT; ?>/js/sweetalert_all_min.js"></script>
<script>
    const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const $email = $('#inputEmail');
    const fields = [$email];

    function sendEmail() {
        $.ajax({
            url: 'member_sendEmailForgetPW_YCN.php',
            method: 'POST',
            dataType: 'json',
            data: {
                email: $email.val()
            }
        }).done(function(data) {
            console.log(data);
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: '發送成功',
                    text: '請前往您的電子信箱並點擊連結更新密碼',
                    showConfirmButton: false,
                })
                setTimeout(() => {
                    window.location = "<?php echo WEB_ROOT; ?>/member_at_login_YCN.php";
                }, 4500);
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: '發送失敗',
                    text: '請檢查您的帳號',
                    showConfirmButton: false,
                })
            }
        });
    }

    function checkForm() {
        // 回復原來的狀態
        fields.forEach(el => {
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
            sendEmail();
        }
    }

    //Forget PW: send email to Lee Song 435:
    $('#hidden-forgetPWSend-click').click(function(event) {
        $('#inputEmail').val('mwhwbh435@gmail.com');
    })
</script>
<?php include  __DIR__ . '/parts/BNG_html_foot.php'; ?>