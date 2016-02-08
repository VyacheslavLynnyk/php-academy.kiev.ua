<?php

if ( sizeof($_GET) != false
    && isset($_GET['value']) && isset($_GET['num']) ) {
    $res = 0;
    $value = (string)((int)$_GET['value']);
    $num = (int)$_GET['num'];
    for ($n = 0; $n <= (strlen($value) - 1); $n++ ){
        $res = ( $num === (int)$value[$n] ) ? ++$res : $res;
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
    <input type="number" name="value" value="<?php echo $value ?? 442158755745 ?>">
    <input type="number" name="num" value="<?php echo $num ?? 5 ?>">
    <input type="submit" value="Get count">
    <p><?php echo (isset($res)) ? $res : '';?></p>
</form>
</body>
</html>
