<?php

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$count = 0;

foreach ($arr as $e) {
    $count++;
    echo $e;
    if ( !($count % 3) ) {
        echo "<br>";
    } else {
        echo ', ';
    }
}
