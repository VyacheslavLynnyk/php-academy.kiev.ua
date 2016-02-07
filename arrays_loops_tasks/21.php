<?php

for ($i = 1; $i <= 9; $i++){
    $res = '';
    for($j = 1; $j <= $i; $j++){
        $res.= $i;
    }
    echo $res.'<br>';
}
