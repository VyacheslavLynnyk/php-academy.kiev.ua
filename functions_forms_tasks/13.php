<?php

$string = 'яблоко черешня вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';

$stringArr = explode(' ', $string);
foreach ($stringArr as $num => $fruit) {
    $box[$fruit] = (isset($box[$fruit])) ? $box[$fruit] = $box[$fruit] + 1 : 1 ;
}
arsort($box);
foreach ($box as $fruit=>$count){
    echo $fruit . ' - ' . $count . "<br>\n";
}
