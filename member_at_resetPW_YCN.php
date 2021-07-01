<?php include __DIR__ . '/parts/config.php'; ?>
<?php
$title = '修改密碼';
$pageName = 'resetPW';

?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php'; ?>

<link rel="stylesheet" href="css/member_at_resetPW-ycn.css">
<title>resetPW</title>

</head>
<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php'; ?>

<!-- ---- resetPW----重設密碼頁ycn -->
<div class="resetPW-ycn">
    <div class="container resetPW-wrapper-ycn">
        <div class="container title-div-resetPW-ycn" id="resetPW-title-div">
            <svg class="icon-arrow-down" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z">
                </path>
            </svg>
            <p class="resetPW title-resetPW-ycn">重設密碼</p>
        </div>
        <form name="resetPW" id="resetPW-form" class="resetPW-form ycn" novalidate onsubmit="checkResetPWForm();return false;">
            <div class="form-group resetPW ycn">
                <div class="resetPW-inside-div ycn">
                    <label class="label" for="inputResetPW">密碼
                    </label>
                    <div class="resetPW-input-div">
                        <input name="inputResetPW_01" type="password" class="inputResetPW form-control" id="inputResetPW_01" placeholder="請輸入您的新密碼" autocomplete="new-password">
                        <small class="pwError" id="pwError01"></small>
                    </div>
                </div>
                <div class="resetPW-inside-div ycn">
                    <label class="label" for="inputResetPW">驗證
                    </label>
                    <div class="resetPW-input-div">
                        <input name="inputResetPW_02" type="password" class="inputResetPW form-control" id="inputResetPW_02" placeholder="請再次輸入新密碼" autocomplete="new-password">
                        <small class="pwError" id="pwError02"></small>
                    </div>
                </div>
            </div>
            <div class="submit-div ycn">
                <button type="submit" id="resetPW-submit" class="btn btn-primary">重設密碼</button>
            </div>
        </form>
        <div class="loginLink-ycn">
            <a class="loginLink" href="<?php echo WEB_ROOT; ?>/member_at_login_YCN.php">重新登入</a>
        </div>
        <div class="hidden-resetPW-div" style="position:relative">
            <div id="hidden-resetPW-click" style="width:50px; height:50px; position:absolute; left: -40px; top: 60px; "></div>
        </div>
    </div>
</div>
<!--------endof resetPW 重設密碼頁 ycn----- -->

<?php include __DIR__ . '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php'; ?>
<script src="<?php echo WEB_ROOT; ?>/js/sweetalert_all_min.js"></script>
<script>
    // const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    const $inputResetPW = $('.inputResetPW');
    const fields = [$inputResetPW];
    let url = new URL(location.href);
    let memberHash = url.searchParams.get("h");
    //
    function checkResetPWForm() {
        fields.forEach(el => {
            el.css('border', '1px solid #CCCCCC');
            el.text('');
        });
        let isPass = true;

        let inp01 = document.getElementById('inputResetPW_01');
        let inp02 = document.getElementById('inputResetPW_02');
        let strInp01 = String(inp01.value);
        let strInp02 = String(inp02.value);
        if ((strInp01.length == 0) || (strInp02.length == 0)) {
            isPass = false;
            $('.pwError').css('border', '1px solid red').text('請確認輸入密碼沒有空白');
        }

        if ((strInp01 != strInp02)) {
            isPass = false;
            $('.pwError').css('border', '1px solid red').text('請檢查輸入的密碼是否相同');
        } else {
            isPass = true;
        }
        if (isPass) {
            console.log(memberHash);
            $.ajax({
                url: 'member_at_resetPW-api_YCN.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    inputResetPW01: strInp01,
                    inputResetPW02: strInp02,
                    hash: String(memberHash)
                }
            }).done(function(data) {
                console.log('data', data);
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '密碼更新成功!',
                        text: '請用您的新密碼登入BikeNGo',
                        showConfirmButton: false,
                    })
                    setTimeout(() => {
                        window.location = "<?php echo WEB_ROOT; ?>/member_at_login_YCN.php";
                    }, 3500);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: '輸入錯誤，請再試一次～',
                        showConfirmButton: false,
                    })
                }
            });
            // $.post(
            //     'member_at_resetPW-api.php',
            //     $('#resetPW-form').serialize(),
            //     function(data){
            //         console.log('data',data)
            //         if(data.success){
            //             alert('密碼更新成功');
            //         } else {
            //             alert('請再輸入一次');
            //         }
            //     },
            //     'json'
            // )
        }
    }
    //set div margin top
    if (window.innerWidth <= 576) {
        let w = document.getElementsByClassName('resetPW-wrapper-ycn')[0];
        w.style['margin-top'] = '20px';
    }

    //Hidden: reset PW auto complete: Lee Chou Song
    $('#hidden-resetPW-click').click(function(event) {
        $('#inputResetPW_01').val('lee435');
        $('#inputResetPW_02').val('lee435');
    })
</script>
<?php include  __DIR__ . '/parts/BNG_html_foot.php'; ?>