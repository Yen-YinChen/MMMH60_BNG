<?php include __DIR__ . '/parts/config.php';?>
<?php
$title = 'BNG';
$pageName = 'priduct-list';

$perPage = 12; //每一頁有幾筆
$t_sql = "SELECT COUNT(1) FROM tour_table";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //用戶要看第幾頁的商品

if ($page < 1) {
    $page = 1;
}

if ($page > $totalPages) {
    $page = $totalPages;
}

$p_sql = sprintf("SELECT * FROM tour_table LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);

$rows = $pdo->query($p_sql)->fetchAll();

?>

<?php include __DIR__ . '/parts/BNG_head_Vv.php';?>
<!--added by YCN-->
<link rel="stylesheet" href="<?php echo WEB_ROOT;?>/fontawesome-free-5.15.3-web/css/all.css">
<link rel="stylesheet" href="<?=WEB_ROOT?>/css/BNG_productList_pei.css">
</head>

<?php include __DIR__ . '/parts/BNG_navbar_topButton_Vv.php';?>

<!-- 以下為商品列表banner -->
<div class="contentPei">
        <div class="strokebnPei">
            <img src="./img/images-pei/strokebn.png" alt="">
        </div>
        <h1 class="titlePei">準備出發<br>一起來體驗台灣之美吧！</h1>
        <div class="linebnPei">
            <img src="./img/images-pei/linebn.svg" alt="">
        </div>
    </div>

    <!-- 以下為filter -->
    <!-- phone -->
    <div class="seachbarPei d-block d-sm-none">搜尋</div>


    <!-- 以下為filter -->
    <!-- web -->
    <div class="container containerPei">
        <div class="row rowPei">
            <div class="card bg-light mb-3 filterCardPei  d-none d-sm-block" style="max-width: 260px;">
                <div class="card-header card-headerPei d-none d-sm-block">搜尋</div>
                <div class="card-body card-bodyPei">
                    <h5 class="card-title card-titlePei">地區</h5>
                    <input type="radio" name="area" value="" class="areaInput"> 所有地區<br>
                    <input type="radio" name="area" value="北區" class="areaInput"> 北區<br>
                    <input type="radio" name="area" value="中區" class="areaInput"> 中區<br>
                    <input type="radio" name="area" value="南區" class="areaInput"> 南區<br>
                    <input type="radio" name="area" value="東區" class="areaInput"> 東區<br>

                </div>
                <div class="card-body card-bodyPei">
                    <h5 class="card-title card-titlePei">難易度</h5>
                    <input type="radio" name="difficulty" value="" class="diffInput"> 所有級別<br>
                    <input type="radio" name="difficulty" value="1" class="diffInput"> 簡單輕鬆級<br>
                    <input type="radio" name="difficulty" value="2" class="diffInput"> 專業運動級<br>
                    <input type="radio" name="difficulty" value="3" class="diffInput"> 極限挑戰級<br>
                </div>
                <div class="card-body card-bodyPei">
                    <h5 class="card-title card-titlePei">日期區間</h5>
                    <p class="dateFilterPei">起</p><input type="date" id="beginDay" name="beginDate" class="datePei beginDay" value="">

                    <p class="dateFilterPei">迄</p><input type="date" id="endDay" name="endDate" class="datePei endDay" value="">

                </div>
                <div class="card-body card-bodyPei">
                    <h5 class="card-title card-titlePei">價格</h5>
                    <input type="radio" name="price" data-low="0" data-high="300000" class="priceInput"> 所有價位<br>
                    <input type="radio" name="price" data-low="0" data-high="3000" class="priceInput"> $ 3,000以下<br>
                    <input type="radio" name="price" data-low="3000" data-high="5000" class="priceInput"> $ 3,000-5,000<br>
                    <input type="radio" name="price" data-low="5000" data-high="300000" class="priceInput"> $ 5,000以上<br>
                </div>
            </div>


                <div class="productListPei">

                </div>

            </div>
        </div>




    <!-- 以下為頁碼 -->
    <nav aria-label="Page navigation example" class="pagePei">
        <ul class="pagination justify-content-center">

        </ul>
    </nav>


    <div class="lightboxPei">

        <div class="boxPei">
            <div class="card-header card-headerPei d-none d-sm-block">搜尋</div>
            <div class="card-body card-bodyPei">
                <h5 class="card-title card-titlePei">地區</h5>
                <input type="radio" name="area" value="" class="areaInput">
                <p class="lightboxAreaPei">所有地區</p><br>
                <input type="radio" name="area" value="北區" class="areaInput">
                <p class="lightboxAreaPei">北區</p>
                <input type="radio" name="area" value="中區" class="areaInput">
                <p class="lightboxAreaPei">中區</p><br>
                <input type="radio" name="area" value="南區" class="areaInput">
                <p class="lightboxAreaPei">南區</p>
                <input type="radio" name="area" value="東區" class="areaInput">
                <p class="lightboxAreaPei">東區</p><br>

            </div>

            <div class="card-body card-bodyPei">
                <h5 class="card-title card-titlePei">難易度</h5>
                <input type="radio" name="difficulty" value="" class="diffInput"><p class="lightboxAreaPei"> 所有級別&emsp;</p>
                <input type="radio" name="difficulty" value="1" class="diffInput"><p class="lightboxAreaPei"> 簡單輕鬆級</p><br>
                <input type="radio" name="difficulty" value="2" class="diffInput"><p class="lightboxAreaPei"> 專業運動級</p>
                <input type="radio" name="difficulty" value="3" class="diffInput"><p class="lightboxAreaPei"> 極限挑戰級</p><br>
            </div>
            <div class="card-body card-bodyPei">
                <h5 class="card-title card-titlePei">日期區間</h5>
                <p class="dateFilterPei">起</p><input type="date" id="beginDay" name="beginDate" class="datePei beginDay" value="">

                <p class="dateFilterPei">迄</p><input type="date" id="endDay" name="endDate" class="datePei endDay" value="">

            </div>
            <div class="card-body card-bodyPei">
                <h5 class="card-title card-titlePei">價格</h5>
                <input type="radio" name="price" data-low="0" data-high="300000" class="priceInput"> 所有價位<br>
                <input type="radio" name="price" data-low="0" data-high="3000" class="priceInput"> $ 3,000以下<br>
                <input type="radio" name="price" data-low="3000" data-high="5000" class="priceInput"> $ 3,000-5,000<br>
                <input type="radio" name="price" data-low="5000" data-high="300000" class="priceInput"> $ 5,000以上<br>
            </div>

            <div class="lightSearchPei">
                <p class="lightSearchTxtPei" id="lightSearchTxtPei">search</p>
            </div>

            <i class="fas fa-times-circle closeLightbox" id="closeLightbox"></i>

        </div>
    </div>

    </div>



<?php include __DIR__ . '/parts/BNG_footer_Vv.php';?>
<?php include __DIR__ . '/parts/BNG_scripts_Vv.php';?>
<!-- added by YCN-->
<script src="<?php echo WEB_ROOT;?>/fontawesome-free-5.15.3-web/js/fontawesome.js"></script>

<script>

    $(".lightboxPei").hide();
        $('.seachbarPei').click(function () {
            console.log('hi');
            $(".lightboxPei").show();
        })

        $('#closeLightbox').click(function () {
            $(".lightboxPei").hide();
        })

        $('#lightSearchTxtPei').click(function () {
            $(".lightboxPei").hide();
        })

let area = 0;
let difficulty = 0;
let beginDate = '';
let endDate = '';
let lowPrice = 0;
let highPrice = 300000 ;
let page = 1 ;
let totalPages = 0 ;
const p_list = $('.productListPei');
const pagination = $('.pagination');


function formatMoney(number, decPlaces, decSep, thouSep) {
    decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
    decSep = typeof decSep === "undefined" ? "." : decSep;
    thouSep = typeof thouSep === "undefined" ? "," : thouSep;
    var sign = number < 0 ? "-" : "";
    var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
    var j = (j = i.length) > 3 ? j % 3 : 0;

    return sign +
        (j ? i.substr(0, j) + thouSep : "") +
        i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
        (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
}


const productTpl = o => {
    return `
    <div class="productCardPei">
        <div class="card cardPei">
        <img src="<?=WEB_ROOT?>/img/tours/${o.img_01}.jpg" class="card-img-top" alt="">
                <div class="card-body card-bodyPei">
                    <div class="carddetailPei">
                        <p class="cardAreaPei">${o.area}</p>
                        <p class="cardLevelPei">${diffMap[o.difficulty]}</p>
                        <p class="cardPricePei" style="font-size: 21px; font-weight: 400;">$${formatMoney(o.price,0)}
                        </p>
                    </div>
                    <div>
                        <p class="card-text card-textPei">  ${o.date}<br>${o.tourname}</p>
                    </div>
                    <div class="cardVmBoxPei">
                        <a href="productDetail.php?tour_no=${o.tour_no}&tour_id=${o.tour_id}" class="cardViewmorePei"> VIEW MORE
                        </a>
                    </div>

                </div>
        </div>
        </div>
    `;
}


const pageBtnTpl = n => {
    return `

    <li class="page-item ${ n===page ? 'active' : '' }">
        <a class="page-link" href="javascript: changePage(${n})">${n}</a>
    </li>

    `
}


getProducts();
$('.areaInput, .diffInput, .priceInput').click(getProducts);
$('.datePei').change(getProducts);


function getProducts(){
    let me = $(this);

    if(me.hasClass('areaInput')){
        area = me.val();
        page = 1;
    }

    if(me.hasClass('diffInput')){
        difficulty = me.val();
        page = 1;
    }

    if(me.hasClass('priceInput')){
        lowPrice = me.attr('data-low');
        highPrice = me.attr('data-high');
        page = 1;
    }

    if(me.hasClass('beginDay')){
        beginDate = me.val();
        page = 1;
    }

    if(me.hasClass('endDay')){
        endDate = me.val();
        page = 1;
    }

    console.log({
        area,
        difficulty,
        beginDate,
        endDate,
        lowPrice,
        highPrice,
    });

    $.get( 'product-api.php',{
            page,
            area,
            difficulty,
            beginDate,
            endDate,
            lowPrice,
            highPrice,
    },function(data){
            pData = data;
            totalPages = data.totalPages;
            renderProducts();
            renderPagination();

    },'json');

}

function changePage(p){
    page = p;
    getProducts();
}

//產生商品化面的區塊
function renderProducts(){
    p_list.html('');
    if(pData.rows && pData.rows.forEach){
        pData.rows.forEach(el => {
            p_list.append( productTpl(el) );
        });
    }
}



function renderPagination(){
    pagination.html('');
    const htmlStart = `<li class="page-item ${ page <= 1 ? 'disabled' : '' }">
        <a class="page-link" href="javascript: changePage(${(page <= 0) ? 0 : (page-1)})" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        </a>
    </li>  `;

    const htmlEnd = `<li class="page-item ${ totalPages > page ?  '': 'disabled' }">
        <a class="page-link" href="javascript: changePage(${page>= totalPages ?totalPages : (page+1)})" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        </a>
    </li>`;

    const ignoreBtn =  `<li class="page-item disabled">
        <a class="page-link" href="#" aria-label="">
        <span aria-hidden="true">...</span>
        </a>
    </li>`;


    pagination.append(htmlStart);
    const defaultMax = 6;
    const isMoreThenMaxBtn = (pData.totalPages -1 > defaultMax)? true : false;
    const maxPageBtn = isMoreThenMaxBtn? 6 : pData.totalPages;
    const maxPage = pData.totalPages;

    const btnLoopStart = isMoreThenMaxBtn? ((page > maxPage - 3)?maxPage -4:((page-2) <= 0)?1:page-2) : 1;
    const btnLoopEnd = isMoreThenMaxBtn? ( (page > maxPage - 3)? maxPage : ((page>3)?maxPageBtn+page-4:maxPageBtn)):maxPageBtn ;

    if(page>3 && isMoreThenMaxBtn){
        pagination.append(ignoreBtn);
    }

    for(let i= btnLoopStart; i<=btnLoopEnd  ; i++){
        pagination.append( pageBtnTpl(i) );
    }

    if(page < maxPage - 2 && isMoreThenMaxBtn){
        pagination.append(ignoreBtn);
    }

    pagination.append(htmlEnd);

    if($(window).width() > 700){
        setTimeout(()=>{$("html, body").animate({ scrollTop: '900px' }, "slow");}, 1000);
    }


}



const diffMap ={
    '1': '簡易級',
    '2': '運動級',
    '3': '挑戰級',
}



</script>

<?php include __DIR__ . '/parts/BNG_html_foot.php';?>