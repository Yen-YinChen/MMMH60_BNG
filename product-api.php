<?php
include __DIR__. '/parts/config.php'; 


/*
page=1
area=北區
diff=1
beginDate=2021-05-20
endDate=2021-05-30
lowPrice=0
highPrice=3000
*/



$where = ' WHERE 1 ';
$group = '';
$area = isset($_GET['area']) ? $_GET['area'] : '';
if (!empty($area)) {
    $where .= " AND `area`=" . $pdo->quote($area) ;
}

$difficulty = isset($_GET['difficulty']) ? $_GET['difficulty'] : '';
if (!empty($difficulty)) {
    $where .= " AND `difficulty`=" . intval($difficulty);
}

$beginDate = isset($_GET['beginDate']) ? $_GET['beginDate'] : '';
if (!empty($beginDate)) {
    $where .= " AND `date` >=" . $pdo->quote($beginDate);
}

$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';
if (!empty($endDate)) {
    $where .= " AND `date` <=" . $pdo->quote($endDate);
}

$lowPrice = isset($_GET['lowPrice']) ? $_GET['lowPrice'] : '';
if (!empty($lowPrice)) {
    $where .= " AND `price`>=" . intval($lowPrice);
}

$highPrice = isset($_GET['highPrice']) ? $_GET['highPrice'] : '';
if (!empty($highPrice)) {
    $where .= " AND `price`<=" . intval($highPrice);
}

if (strpos($where,'AND') < 1) {
    $group .= " GROUP BY tourname " ;
}




// //價格分類：設定pricrLow的價格為整數，如沒有抓到預設為0
// $priceLow = isset($_GET['priceLow']) ? intval($_GET['priceLow']) : 0;

// //價格分類：設定pricrHigh的價格為整數，如沒有抓到預設為0
// $priceHigh = isset($_GET['priceHigh']) ? intval($_GET['priceHigh']) : 18000;
// $where .= " AND product_price >= $priceLow AND product_price <= $priceHigh ";


// $where = 'WHERE 1';

//價格分類
// $m_sql = "SELECT * FROM categories_price WHERE parent_sid =0 ";
// $price_rows = $pdo->query($m_sql)->fetchAll();
// $price = isset($_GET['price']) ? intval($_GET['price']) : 0;
// $where = ' WHERE 1 ';
// if (!empty($price)) {
//     $where .= " AND category_price_sid = $price ";
//     $qs['price'] = $price;
// }


//取得總筆數，總頁數，該頁的商品資料

$perPage = 12; //每一頁有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; //用戶要看第幾頁的商品

$t_sql = "SELECT COUNT(1) FROM tour_table $where $group ";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);

if ($page < 1) $page = 1;
if ($page > $totalPages) $page = $totalPages;

$p_sql = sprintf("SELECT * FROM tour_table $where $group ORDER BY date LIMIT %s, %s ", ($page - 1) * $perPage, $perPage);


$rows = $pdo->query($p_sql)->fetchAll();

echo json_encode([
    'perPage' => $perPage,
    '_get' => $_GET,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows,

], JSON_UNESCAPED_UNICODE);

