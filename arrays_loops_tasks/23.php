<?php

if ( sizeof($_GET) != false && isset($_GET['num']) ) {
    $res = 0;
    $num = (string)((int)$_GET['num']);
    for ($n = 0; $n <= (strlen($num) - 1); $n++ ){
        $res = $res + $num[$n];
    }
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Numbers Summ</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
    <input type="number" name="num" placeholder="write integer value...">
    <input type="submit" value="get SUMM">
    <p><?php echo (isset($res)) ? $res : '';?></p>
</form>
</body>
</html>
