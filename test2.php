<?php

$output = [];

if(isset($_FILES['avatar'])){
    $output['file'] = $_FILES['avatar'];
    $fname =  __DIR__. '/img/'.'copy'. $_FILES['avatar']['name'];
    $output['m'] = move_uploaded_file($_FILES['avatar']['tmp_name'], $fname);
    echo json_encode($output);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>

<body>

<!--<a onclick="document.querySelector('input[type=file]').click()" style="cursor: pointer">美美的按鈕</a>-->


<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="avatar" accept="image/*" >
    <br>
    <input type="submit">
</form>



</body>

</html>