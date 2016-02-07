<?php

$elementsArr = [4, 2, 5, 19, 13, 0, 10];
$res = "Нет!";
foreach($elementsArr as $e){
    if ($e == 2 || $e == 3 || $e == 4) {
        $res = "Есть!";
        break;
    }
}
echo $res;