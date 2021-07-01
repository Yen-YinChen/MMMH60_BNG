<?php include __DIR__. '/parts/config.php'; ?>
<?php
$title = '撰寫郵件'; //可將BNG改寫為自己頁面的名稱

if (!isset($_SESSION['user'])){
//redirect visitor to Login page
    header('Location: member_at_login_YCN.php');
    exit;
};


?>

<?php include __DIR__. '/parts/BNG_head_Vv.php'; ?>

    <link rel="stylesheet" href="<?php echo WEB_ROOT;?>/css/member_writeEmail-ycn.css">
    <title>member_writeEmail</title>
    </head>
<?php include __DIR__. '/parts/BNG_navbar_topButton_Vv.php'; ?>

    <div class="container-fluid member-contain ycn">
        <div class="container member-wrapper ycn">
            <!-- menu page icon -->
            <div class="row member-menu-page-icon-div-ycn">
                <div class="menu-page-icon">
                    <span id="member-page-icon-text">會員中心</span>
                    <img id="memberPageIconBG" src="img/member_pageIconBg.png" alt="">
                </div>
            </div>
            <!--------- menu icons ----------->
            <div class="row member-menu-div-ycn">
                <div class="menu-icon-div mem-ico-social-ycn">
                    <a class="menu-icon-a ycn" href="<?php echo WEB_ROOT;?>/member_profile_YCN.php" onclick="menuClick(event);">
                        <div class="menu-icon-svg-div-unclicked">
                            <svg class="menu-icon-svg ycn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #036;
                                        }

                                        .cls-2,
                                        .cls-4 {
                                            fill: none;
                                        }

                                        .cls-2 {
                                            stroke: #036;
                                        }

                                        .cls-3 {
                                            stroke: none;
                                        }
                                    </style>
                                </defs>
                                <g id="Group_549" data-name="Group 549" transform="translate(-0.487 -0.154)">
                                    <g id="id-card" transform="translate(18.484 24.335)">
                                        <g id="Group_540" data-name="Group 540" transform="translate(0 0)">
                                            <path id="Path_651" data-name="Path 651" class="cls-1"
                                                  d="M51.964,106.9H40.641v.611a4.653,4.653,0,0,1-4.649,4.649H22.717a4.653,4.653,0,0,1-4.649-4.649V106.9H6.746A6.745,6.745,0,0,0,0,113.646v25.916a6.745,6.745,0,0,0,6.746,6.746h45.23a6.745,6.745,0,0,0,6.746-6.746V113.646A6.747,6.747,0,0,0,51.964,106.9ZM12.4,121.458a6.515,6.515,0,0,1-.18-.647h0a4.712,4.712,0,0,1-.012-2.085,4.621,4.621,0,0,1,1.21-2.133,5.989,5.989,0,0,1,1.126-.935,4.941,4.941,0,0,1,1.09-.563h0a3.852,3.852,0,0,1,.994-.192,4.09,4.09,0,0,1,2.492.527,3.167,3.167,0,0,1,1.21,1.126s2.013.144,1.33,4.241a3.263,3.263,0,0,1-.18.647c.407-.036.875.192.431,1.773-.323,1.15-.635,1.474-.863,1.5a4.973,4.973,0,0,1-3.019,3.726,3.349,3.349,0,0,1-2.217,0A4.9,4.9,0,0,1,12.8,124.7c-.228-.024-.539-.347-.863-1.5C11.526,121.649,12.005,121.41,12.4,121.458ZM17,137.513H7.177c.048-4.074-.108-6.254,2.528-7.213a22.562,22.562,0,0,0,3.834-1.857l1.845,5.847.252.791.827-2.348c-1.905-2.66.144-2.78.5-2.78h0c.359,0,2.4.132.5,2.78l.827,2.348.252-.791,1.845-5.847a22.562,22.562,0,0,0,3.834,1.857c2.648.959,2.48,3.139,2.528,7.213Zm35.118-4.349H32.41v-2.516H52.12Zm0-5.3H32.41v-2.516H52.12Zm0-5.308H32.41v-2.516H52.12Z"
                                                  transform="translate(0 -100.598)" />
                                            <path id="Path_652" data-name="Path 652" class="cls-1"
                                                  d="M171.908,63.622h13.264a2.408,2.408,0,0,0,2.408-2.408V59.572a2.408,2.408,0,0,0-2.408-2.408h-.755V56.145a1.846,1.846,0,0,0-1.845-1.845h-8.064a1.846,1.846,0,0,0-1.845,1.845v1.018h-.755a2.408,2.408,0,0,0-2.408,2.408v1.641A2.408,2.408,0,0,0,171.908,63.622Z"
                                                  transform="translate(-149.191 -54.3)" />
                                        </g>
                                    </g>
                                    <g id="Ellipse_65" data-name="Ellipse 65" class="cls-2"
                                       transform="translate(0.487 0.154)">
                                        <circle class="cls-3" cx="47.5" cy="47.5" r="47.5" />
                                        <circle class="cls-4" cx="47.5" cy="47.5" r="47" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-icon-svg-div-clicked">
                            <svg class="menu-icon-svg-clicked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95">
                                <g id="Group_542" data-name="Group 542" transform="translate(-0.487 -0.154)">
                                    <circle id="Ellipse_65" data-name="Ellipse 65" cx="47.5" cy="47.5" r="47.5"
                                            transform="translate(0.487 0.154)" fill="#ff7300" />
                                    <g id="id-card" transform="translate(18.484 24.335)">
                                        <g id="Group_540" data-name="Group 540" transform="translate(0 0)">
                                            <path id="Path_651" data-name="Path 651"
                                                  d="M51.964,106.9H40.641v.611a4.653,4.653,0,0,1-4.649,4.649H22.717a4.653,4.653,0,0,1-4.649-4.649V106.9H6.746A6.745,6.745,0,0,0,0,113.646v25.916a6.745,6.745,0,0,0,6.746,6.746h45.23a6.745,6.745,0,0,0,6.746-6.746V113.646A6.747,6.747,0,0,0,51.964,106.9ZM12.4,121.458a6.515,6.515,0,0,1-.18-.647h0a4.712,4.712,0,0,1-.012-2.085,4.621,4.621,0,0,1,1.21-2.133,5.989,5.989,0,0,1,1.126-.935,4.941,4.941,0,0,1,1.09-.563h0a3.852,3.852,0,0,1,.994-.192,4.09,4.09,0,0,1,2.492.527,3.167,3.167,0,0,1,1.21,1.126s2.013.144,1.33,4.241a3.263,3.263,0,0,1-.18.647c.407-.036.875.192.431,1.773-.323,1.15-.635,1.474-.863,1.5a4.973,4.973,0,0,1-3.019,3.726,3.349,3.349,0,0,1-2.217,0A4.9,4.9,0,0,1,12.8,124.7c-.228-.024-.539-.347-.863-1.5C11.526,121.649,12.005,121.41,12.4,121.458ZM17,137.513H7.177c.048-4.074-.108-6.254,2.528-7.213a22.562,22.562,0,0,0,3.834-1.857l1.845,5.847.252.791.827-2.348c-1.905-2.66.144-2.78.5-2.78h0c.359,0,2.4.132.5,2.78l.827,2.348.252-.791,1.845-5.847a22.562,22.562,0,0,0,3.834,1.857c2.648.959,2.48,3.139,2.528,7.213Zm35.118-4.349H32.41v-2.516H52.12Zm0-5.3H32.41v-2.516H52.12Zm0-5.308H32.41v-2.516H52.12Z"
                                                  transform="translate(0 -100.598)" fill="#fff" />
                                            <path id="Path_652" data-name="Path 652"
                                                  d="M171.908,63.622h13.264a2.408,2.408,0,0,0,2.408-2.408V59.572a2.408,2.408,0,0,0-2.408-2.408h-.755V56.145a1.846,1.846,0,0,0-1.845-1.845h-8.064a1.846,1.846,0,0,0-1.845,1.845v1.018h-.755a2.408,2.408,0,0,0-2.408,2.408v1.641A2.408,2.408,0,0,0,171.908,63.622Z"
                                                  transform="translate(-149.191 -54.3)" fill="#fff" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>

                        <div class="menu-text ycn">個人頁面</div>
                    </a>
                </div>
                <div class="menu-icon-div mem-ico-friendlist-ycn">
                    <a class="menu-icon-a ycn" href="<?php echo WEB_ROOT;?>/member_friendList_YCN.php" onclick="menuClick(event);">
                        <div class="menu-icon-svg-div-unclicked">
                            <svg class="menu-icon-svg ycn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95">
                                <g id="Group_544" data-name="Group 544" transform="translate(-0.128 -0.154)">
                                    <g id="add-friend" transform="translate(18.253 21.597)">
                                        <g id="Group_537" data-name="Group 537" transform="translate(0 0)">
                                            <path id="Path_646" data-name="Path 646"
                                                  d="M50.034,32.791a12.454,12.454,0,0,0-7.7-3.626A12.3,12.3,0,1,0,21.837,19.124,16.245,16.245,0,0,1,30.08,41.055a16.44,16.44,0,0,1,8.827,14.691l0,.089,0,.075-.108,2.059H53.535l.122-16.3A12.446,12.446,0,0,0,50.034,32.791Z"
                                                  transform="translate(4.456 -7.72)" fill="#036" />
                                            <path id="Path_647" data-name="Path 647"
                                                  d="M30.026,39.785a12.308,12.308,0,1,0-16.451-.008A12.453,12.453,0,0,0,2.074,52.1l-.122,2.45H41.231l.122-2.266a12.46,12.46,0,0,0-11.326-12.5Z"
                                                  transform="translate(-1.952 -4.299)" fill="#036" />
                                        </g>
                                    </g>
                                    <g id="Ellipse_63" data-name="Ellipse 63" transform="translate(0.128 0.154)"
                                       fill="none" stroke="#036" stroke-width="1">
                                        <circle cx="47.5" cy="47.5" r="47.5" stroke="none" />
                                        <circle cx="47.5" cy="47.5" r="47" fill="none" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-icon-svg-div-clicked">
                            <svg class="menu-icon-svg-clicked ycn" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 95 95">
                                <g id="Group_544" data-name="Group 544" transform="translate(-0.128 -0.154)">
                                    <circle id="Ellipse_63" data-name="Ellipse 63" cx="47.5" cy="47.5" r="47.5"
                                            transform="translate(0.128 0.154)" fill="#ff7300" />
                                    <g id="add-friend" transform="translate(18.253 21.597)">
                                        <g id="Group_537" data-name="Group 537" transform="translate(0 0)">
                                            <path id="Path_646" data-name="Path 646"
                                                  d="M50.034,32.791a12.454,12.454,0,0,0-7.7-3.626A12.3,12.3,0,1,0,21.837,19.124,16.245,16.245,0,0,1,30.08,41.055a16.44,16.44,0,0,1,8.827,14.691l0,.089,0,.075-.108,2.059H53.535l.122-16.3A12.446,12.446,0,0,0,50.034,32.791Z"
                                                  transform="translate(4.456 -7.72)" fill="#fff" />
                                            <path id="Path_647" data-name="Path 647"
                                                  d="M30.026,39.785a12.308,12.308,0,1,0-16.451-.008A12.453,12.453,0,0,0,2.074,52.1l-.122,2.45H41.231l.122-2.266a12.46,12.46,0,0,0-11.326-12.5Z"
                                                  transform="translate(-1.952 -4.299)" fill="#fff" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-text ycn">好友</div>
                    </a>
                </div>
                <div class="menu-icon-div mem-ico-inbox-ycn">
                    <a class="menu-icon-a ycn active" href="<?php echo WEB_ROOT;?>/member_inbox_YCN.php" onclick="menuClick(event);">
                        <div class="menu-icon-svg-div-unclicked">
                            <svg class="menu-icon-svg ycn" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 96 95">
                                <defs>
                                    <clipPath id="clip-path-inbox">
                                        <path id="Shape"
                                              d="M50.4,42H5.6A5.439,5.439,0,0,1,0,36.751l.028-31.5A5.424,5.424,0,0,1,5.6,0H50.4A5.439,5.439,0,0,1,56,5.249v31.5A5.439,5.439,0,0,1,50.4,42ZM5.6,5.249V10.5L28,23.625,50.4,10.5V5.249L28,18.375Z"
                                              transform="translate(0.442 0.392)" fill="#036" />
                                    </clipPath>
                                </defs>
                                <g id="Group_543" data-name="Group 543" transform="translate(-0.239 -0.154)">
                                    <g id="Ellipse_64" data-name="Ellipse 64" transform="translate(0.239 0.154)"
                                       fill="none" stroke="#036" stroke-width="1">
                                        <ellipse cx="48" cy="47.5" rx="48" ry="47.5" stroke="none" />
                                        <ellipse cx="48" cy="47.5" rx="47.5" ry="47" fill="none" />
                                    </g>
                                    <g id="Group_539" data-name="Group 539" transform="translate(19.797 26.762)">
                                        <path id="Shape-2" data-name="Shape"
                                              d="M50.4,42H5.6A5.439,5.439,0,0,1,0,36.751l.028-31.5A5.424,5.424,0,0,1,5.6,0H50.4A5.439,5.439,0,0,1,56,5.249v31.5A5.439,5.439,0,0,1,50.4,42ZM5.6,5.249V10.5L28,23.625,50.4,10.5V5.249L28,18.375Z"
                                              transform="translate(0.442 0.392)" fill="#036" />
                                        <g id="Mask_Group_65" data-name="Mask Group 65" transform="translate(0 0)"
                                           clip-path="url(#clip-path-inbox)">

                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-icon-svg-div-clicked">
                            <svg class="menu-icon-svg-clicked ycn" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 96 95">
                                <defs>
                                    <clipPath id="clip-path-inbox-clicked">
                                        <path id="Shape"
                                              d="M50.4,42H5.6A5.439,5.439,0,0,1,0,36.751l.028-31.5A5.424,5.424,0,0,1,5.6,0H50.4A5.439,5.439,0,0,1,56,5.249v31.5A5.439,5.439,0,0,1,50.4,42ZM5.6,5.249V10.5L28,23.625,50.4,10.5V5.249L28,18.375Z"
                                              transform="translate(0.442 0.392)" fill="#fff" />
                                    </clipPath>
                                </defs>
                                <g id="Group_587" data-name="Group 587" transform="translate(-0.238 -0.154)">
                                    <ellipse id="Ellipse_64" data-name="Ellipse 64" cx="48" cy="47.5" rx="48" ry="47.5"
                                             transform="translate(0.239 0.154)" fill="#ff7300" />
                                    <g id="Group_539" data-name="Group 539" transform="translate(19.797 26.762)">
                                        <path id="Shape-2" data-name="Shape"
                                              d="M50.4,42H5.6A5.439,5.439,0,0,1,0,36.751l.028-31.5A5.424,5.424,0,0,1,5.6,0H50.4A5.439,5.439,0,0,1,56,5.249v31.5A5.439,5.439,0,0,1,50.4,42ZM5.6,5.249V10.5L28,23.625,50.4,10.5V5.249L28,18.375Z"
                                              transform="translate(0.442 0.392)" fill="#b7c5d3" />
                                        <g id="Mask_Group_65" data-name="Mask Group 65" transform="translate(0 0)"
                                           clip-path="url(#clip-path-inbox-clicked)">
                                            <g id="Icon_Fill" data-name="Icon Fill"
                                               transform="translate(-5.947 -10.903)">
                                                <rect id="BG" width="62" height="65" transform="translate(0.389 0.295)"
                                                      fill="#fff" />
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-text ycn">信件</div>
                    </a>
                </div>
                <div class="menu-icon-div mem-ico-coupon-ycn">
                    <a class="menu-icon-a ycn" href="<?php echo WEB_ROOT;?>/BNG-coupon-pei.php" onclick="menuClick(event);">
                        <div class="menu-icon-svg-div-unclicked">
                            <svg class="menu-icon-svg ycn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #036;
                                        }

                                        .cls-2,
                                        .cls-4 {
                                            fill: none;
                                        }

                                        .cls-2 {
                                            stroke: #036;
                                        }

                                        .cls-3 {
                                            stroke: none;
                                        }
                                    </style>
                                </defs>
                                <g id="Group_548" data-name="Group 548" transform="translate(-0.358 -0.154)">
                                    <g id="coupon" transform="translate(16.66 29.811)">
                                        <path id="Path_648" data-name="Path 648" class="cls-1"
                                              d="M66.2,108.06a2.082,2.082,0,0,0,.409-1.391v-1.282a2.118,2.118,0,0,0-.418-1.407,1.579,1.579,0,0,0-1.315-.575,1.7,1.7,0,0,0-1.368.575A2.183,2.183,0,0,0,63,105.387v1.282a2.129,2.129,0,0,0,.525,1.391,1.681,1.681,0,0,0,1.361.558A1.615,1.615,0,0,0,66.2,108.06Z"
                                              transform="translate(-49.61 -95.454)" />
                                        <path id="Path_649" data-name="Path 649" class="cls-1"
                                              d="M119.832,168.07a1.656,1.656,0,0,0-1.352.575,2.136,2.136,0,0,0-.48,1.391v1.282a1.983,1.983,0,0,0,.548,1.383,1.721,1.721,0,0,0,1.313.582,1.6,1.6,0,0,0,1.4-.517,2.467,2.467,0,0,0,.357-1.449v-1.282a2.092,2.092,0,0,0-.463-1.391A1.611,1.611,0,0,0,119.832,168.07Z"
                                              transform="translate(-92.919 -146.375)" />
                                        <path id="Path_650" data-name="Path 650" class="cls-1"
                                              d="M0,66v35.072H63.129V66ZM9.778,77.219V75.928a4.984,4.984,0,0,1,1.461-3.612,5.427,5.427,0,0,1,4.033-1.433,5.287,5.287,0,0,1,3.989,1.433,4.9,4.9,0,0,1,1.358,3.612v1.291a4.838,4.838,0,0,1-1.345,3.6A5.32,5.32,0,0,1,15.3,82.231a5.527,5.527,0,0,1-4.069-1.425A4.908,4.908,0,0,1,9.778,77.219Zm3.81,15.271L25.505,73.414l2.632,1.324L16.219,93.814,13.588,92.49Zm18.721-1.542a4.911,4.911,0,0,1-1.381,3.612,5.351,5.351,0,0,1-3.989,1.416A5.481,5.481,0,0,1,22.9,94.552a4.867,4.867,0,0,1-1.427-3.6V89.657a4.892,4.892,0,0,1,1.424-3.6,5.421,5.421,0,0,1,4.023-1.433,5.358,5.358,0,0,1,4.013,1.425,4.918,4.918,0,0,1,1.381,3.6ZM45.7,95.97H42.086V89.806H45.7Zm0-9.352H42.086V80.454H45.7Zm0-9.565H42.086V70.889H45.7Z"
                                              transform="translate(0 -66)" />
                                    </g>
                                    <g id="Ellipse_66" data-name="Ellipse 66" class="cls-2"
                                       transform="translate(0.359 0.154)">
                                        <circle class="cls-3" cx="47.5" cy="47.5" r="47.5" />
                                        <circle class="cls-4" cx="47.5" cy="47.5" r="47" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-icon-svg-div-clicked">
                            <svg class="menu-icon-svg-clicked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95">
                                <g id="Group_541" data-name="Group 541" transform="translate(-0.359 -0.154)">
                                    <circle id="Ellipse_66" data-name="Ellipse 66" cx="47.5" cy="47.5" r="47.5"
                                            transform="translate(0.359 0.154)" fill="#ff7300" />
                                    <g id="coupon" transform="translate(16.66 29.811)">
                                        <path id="Path_648" data-name="Path 648"
                                              d="M66.2,108.06a2.082,2.082,0,0,0,.409-1.391v-1.282a2.118,2.118,0,0,0-.418-1.407,1.579,1.579,0,0,0-1.315-.575,1.7,1.7,0,0,0-1.368.575A2.183,2.183,0,0,0,63,105.387v1.282a2.129,2.129,0,0,0,.525,1.391,1.681,1.681,0,0,0,1.361.558A1.615,1.615,0,0,0,66.2,108.06Z"
                                              transform="translate(-49.61 -95.454)" fill="#fff" />
                                        <path id="Path_649" data-name="Path 649"
                                              d="M119.832,168.07a1.656,1.656,0,0,0-1.352.575,2.136,2.136,0,0,0-.48,1.391v1.282a1.983,1.983,0,0,0,.548,1.383,1.721,1.721,0,0,0,1.313.582,1.6,1.6,0,0,0,1.4-.517,2.467,2.467,0,0,0,.357-1.449v-1.282a2.092,2.092,0,0,0-.463-1.391A1.611,1.611,0,0,0,119.832,168.07Z"
                                              transform="translate(-92.919 -146.375)" fill="#fff" />
                                        <path id="Path_650" data-name="Path 650"
                                              d="M0,66v35.072H63.129V66ZM9.778,77.219V75.928a4.984,4.984,0,0,1,1.461-3.612,5.427,5.427,0,0,1,4.033-1.433,5.287,5.287,0,0,1,3.989,1.433,4.9,4.9,0,0,1,1.358,3.612v1.291a4.838,4.838,0,0,1-1.345,3.6A5.32,5.32,0,0,1,15.3,82.231a5.527,5.527,0,0,1-4.069-1.425A4.908,4.908,0,0,1,9.778,77.219Zm3.81,15.271L25.505,73.414l2.632,1.324L16.219,93.814,13.588,92.49Zm18.721-1.542a4.911,4.911,0,0,1-1.381,3.612,5.351,5.351,0,0,1-3.989,1.416A5.481,5.481,0,0,1,22.9,94.552a4.867,4.867,0,0,1-1.427-3.6V89.657a4.892,4.892,0,0,1,1.424-3.6,5.421,5.421,0,0,1,4.023-1.433,5.358,5.358,0,0,1,4.013,1.425,4.918,4.918,0,0,1,1.381,3.6ZM45.7,95.97H42.086V89.806H45.7Zm0-9.352H42.086V80.454H45.7Zm0-9.565H42.086V70.889H45.7Z"
                                              transform="translate(0 -66)" fill="#fff" />
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-text ycn">優惠券</div>
                    </a>
                </div>
                <div class="menu-icon-div mem-ico-shopHisto-ycn">
                    <a class="menu-icon-a ycn" href="<?php echo WEB_ROOT;?>/BNG-myorders_cm.php" onclick="menuClick(event);">
                        <div class="menu-icon-svg-div-unclicked">
                            <svg class="menu-icon-svg ycn" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95">
                                <g id="Group_BIHIS" data-name="Group BIHIS" transform="translate(-0.487 -0.154)">
                                    <g id="Ellipse_BIHIS" data-name="Ellipse BHIS" transform="translate(0.487 0.154)"
                                       fill="none" stroke="#036" stroke-width="1">
                                        <circle cx="47.5" cy="47.5" r="47.5" stroke="none" />
                                        <circle cx="47.5" cy="47.5" r="47" fill="none" />
                                    </g>
                                    <g id="shopping-list" transform="translate(18.487 16.798)">
                                        <g id="Group_BIHIS" data-name="Group BIHIS" transform="translate(0 2.356)">
                                            <path id="Path_662BHS" data-name="Path 662BHS"
                                                  d="M58.179,11.445a2.26,2.26,0,0,0-1.494-1.059L23.553,2.4a2.244,2.244,0,0,0-2.547,1.435L8.376,35.917l4.216,1.536L24.561,6.947l28.788,7.346c-1.8,5.574-6.076,17.207-10.177,28.039C39.6,51.783,37.539,55.019,33.628,55.68a.023.023,0,0,1-.009-.016c-7.992,1.12-7.849-9.069-7.849-9.069L.246,36.285c-1.814,11.5,7.02,14.262,7.02,14.262l18.688,8.485a14.485,14.485,0,0,0,6.092,1.249C40.6,60.08,43.6,53.87,47.37,43.92,52.811,29.542,58.333,13.43,58.387,13.26A2.22,2.22,0,0,0,58.179,11.445Z"
                                                  transform="translate(0 -2.356)" fill="#036" />
                                            <path id="Path_663BHS" data-name="Path 663BHS"
                                                  d="M279.422,133.379a2.243,2.243,0,1,0,1.181-4.328l-9.724-3a2.244,2.244,0,1,0-1.182,4.329Z"
                                                  transform="translate(-236.346 -111.351)" fill="#036" />
                                            <path id="Path_664BHS" data-name="Path 664BHS"
                                                  d="M234.927,204.532a2.247,2.247,0,0,0,1.418,2.84l9.673,3.457a2.225,2.225,0,0,0,.7.115,2.243,2.243,0,0,0,.722-4.371l-9.67-3.455A2.247,2.247,0,0,0,234.927,204.532Z"
                                                  transform="translate(-207.045 -179.275)" fill="#036" />
                                            <path id="Path_665BHS" data-name="Path 665BHS"
                                                  d="M206.63,282.321a2.241,2.241,0,1,0-1.4,4.259l9.694,3.442a2.161,2.161,0,0,0,.7.113,2.243,2.243,0,0,0,.7-4.375Z"
                                                  transform="translate(-179.599 -249.112)" fill="#036" />
                                            <path id="Path_666BHS" data-name="Path 666BHS"
                                                  d="M206.989,104.517a2.42,2.42,0,1,1-2.489,2.419A2.455,2.455,0,0,1,206.989,104.517Z"
                                                  transform="translate(-180.317 -92.436)" fill="#036" />
                                            <path id="Path_667BHS" data-name="Path 667BHS"
                                                  d="M177.22,180.572a2.419,2.419,0,1,1-2.489,2.418A2.454,2.454,0,0,1,177.22,180.572Z"
                                                  transform="translate(-154.069 -159.497)" fill="#036" />
                                            <path id="Path_668BHS" data-name="Path 668BHS"
                                                  d="M145.47,259.039a2.42,2.42,0,1,1-2.489,2.422A2.456,2.456,0,0,1,145.47,259.039Z"
                                                  transform="translate(-126.073 -228.686)" fill="#036" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <div class="menu-icon-svg-div-clicked">
                            <svg class="menu-icon-svg-clicked" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95 95">
                                <g id="Group_SPP" data-name="Group SPP" transform="translate(-0.487 -0.154)">
                                    <g id="Ellipse_SPP" data-name="Ellipse SPP" transform="translate(0.487 0.154)"
                                       fill="#ff7300" stroke="#ff7300" stroke-width="1">
                                        <circle cx="47.5" cy="47.5" r="47.5" stroke="none" />
                                        <circle cx="47.5" cy="47.5" r="47" fill="none" />
                                    </g>
                                    <g id="shopping-list" transform="translate(18.487 16.798)">
                                        <g id="Group_599" data-name="Group 599" transform="translate(0 2.356)">
                                            <path id="Path_662" data-name="Path 662"
                                                  d="M58.179,11.445a2.26,2.26,0,0,0-1.494-1.059L23.553,2.4a2.244,2.244,0,0,0-2.547,1.435L8.376,35.917l4.216,1.536L24.561,6.947l28.788,7.346c-1.8,5.574-6.076,17.207-10.177,28.039C39.6,51.783,37.539,55.019,33.628,55.68a.023.023,0,0,1-.009-.016c-7.992,1.12-7.849-9.069-7.849-9.069L.246,36.285c-1.814,11.5,7.02,14.262,7.02,14.262l18.688,8.485a14.485,14.485,0,0,0,6.092,1.249C40.6,60.08,43.6,53.87,47.37,43.92,52.811,29.542,58.333,13.43,58.387,13.26A2.22,2.22,0,0,0,58.179,11.445Z"
                                                  transform="translate(0 -2.356)" fill="#fff" />
                                            <path id="Path_663" data-name="Path 663"
                                                  d="M279.422,133.379a2.243,2.243,0,1,0,1.181-4.328l-9.724-3a2.244,2.244,0,1,0-1.182,4.329Z"
                                                  transform="translate(-236.346 -111.351)" fill="#fff" />
                                            <path id="Path_664" data-name="Path 664"
                                                  d="M234.927,204.532a2.247,2.247,0,0,0,1.418,2.84l9.673,3.457a2.225,2.225,0,0,0,.7.115,2.243,2.243,0,0,0,.722-4.371l-9.67-3.455A2.247,2.247,0,0,0,234.927,204.532Z"
                                                  transform="translate(-207.045 -179.275)" fill="#fff" />
                                            <path id="Path_665" data-name="Path 665"
                                                  d="M206.63,282.321a2.241,2.241,0,1,0-1.4,4.259l9.694,3.442a2.161,2.161,0,0,0,.7.113,2.243,2.243,0,0,0,.7-4.375Z"
                                                  transform="translate(-179.599 -249.112)" fill="#fff" />
                                            <path id="Path_666" data-name="Path 666"
                                                  d="M206.989,104.517a2.42,2.42,0,1,1-2.489,2.419A2.455,2.455,0,0,1,206.989,104.517Z"
                                                  transform="translate(-180.317 -92.436)" fill="#fff" />
                                            <path id="Path_667" data-name="Path 667"
                                                  d="M177.22,180.572a2.419,2.419,0,1,1-2.489,2.418A2.454,2.454,0,0,1,177.22,180.572Z"
                                                  transform="translate(-154.069 -159.497)" fill="#fff" />
                                            <path id="Path_668" data-name="Path 668"
                                                  d="M145.47,259.039a2.42,2.42,0,1,1-2.489,2.422A2.456,2.456,0,0,1,145.47,259.039Z"
                                                  transform="translate(-126.073 -228.686)" fill="#fff" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>

                        <div class="menu-text ycn">歷史訂單</div>
                    </a>
                </div>
            </div>
            <!-- -------write email-------- -->
            <div class="container writeEmail-div-ycn">
                <div class="writeEmail-header-div-ycn">
                    <div class="writeEmail-header-text ycn" id="writeEmail-header-sender ycn">
                        <p>撰寫新郵件</p>
                    </div>
                </div>
                <form class="writeEmail ycn">
                    <div class="writeEmail-recipient-div form-group ycn">
                        <label class="form-list-head-label" for="recipientInputEmail">
                            <p class="form-list-head ycn">收信人</p>
                        </label>
                        <input type="text" class="form-control" id="recipientInputEmail">
                    </div>
                    <div class="writeEmail-title-div form-group ycn">
                        <label class="form-list-head-label" for="titleInput">
                            <p class="form-list-head ycn">主旨</p>
                        </label>
                        <input type="text" class="form-control" id="titleInput">
                    </div>
                    <div class="writeEmail-content-div form-group ycn">
                        <label for="writeEmail-content-input"></label>
                        <textarea class="writeEmail-content-input form-control" id="writeEmail-content-input"
                                  rows="8"></textarea>
                    </div>
                    <div class="write-email-buttom-div ycn">
                        <button onclick="backToInbox();" type="submit" id="write-email-ycn" class="btn btn-primary">
                            <span>傳送</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include __DIR__. '/parts/BNG_footer_Vv.php'; ?>
<?php include __DIR__. '/parts/BNG_scripts_Vv.php'; ?>
    <script>
        // Menu icon clicking effect
        const icon_a = $('.menu-icon-a');
        //----Member menu icons clicking effect (oragnge)-----
        let iconsUnclicked = document.querySelectorAll("svg.menu-icon-svg");
        let iconsClicked = document.querySelectorAll("svg.menu-icon-svg-clicked");
        function menuClick(event) {
            console.log(iconsUnclicked);
            console.log(event.currentTarget);
            // for (let i = 0; i < iconsUnclicked.length; i++) {
            //     iconsUnclicked[i].classList.add("active");
            // }
            // for (let i = 0; i < iconsClicked.length; i++) {
            //     iconsClicked[i].classList.remove("active");
            // }
            // let iconClicked = event.currentTarget.querySelectorAll('svg.menu-icon-svg-clicked')[0];
            // iconClicked.classList.add("active");
            // let iconUnclick = event.currentTarget.querySelectorAll('svg.menu-icon-svg')[0];
            // iconUnclick.classList.remove("active");
            icon_a.removeClass('active');
            $(event.currentTarget).addClass('active');
        };
        // end of Member menu icons clicking effect -------------

        if ($(window).width() >= 577) {
            // ---DESKTOP---@media screen and(min-width:577px)
            // ---DESKTOP---@media screen and(min-width:577px)
            // ---DESKTOP---@media screen and(min-width:577px)
            console.log($(window).width());
            // ---writeEmail: Set textarea rows to 20-----------
            let emailContentRows = document.getElementById('writeEmail-content-input');
            emailContentRows.setAttribute('rows', '20');


        } else {
            // ---MOBILE---@media screen and(min-width:576px)
            // ---MOBILE---@media screen and(min-width:576px)
            // ---MOBILE---@media screen and(min-width:576px)

            // ---writeEmail: Set textarea rows to 20-----------
            let emailContentRows = document.getElementById('writeEmail-content-input');
            emailContentRows.setAttribute('rows', '8');
        }

        //Temporary: send mail button relink to inbox (after sending the mail)
        function backToInbox(){
            window.location = "<?php echo WEB_ROOT; ?>/member_inbox_YCN.php";
        }

    </script>
<?php include  __DIR__. '/parts/BNG_html_foot.php' ;?>