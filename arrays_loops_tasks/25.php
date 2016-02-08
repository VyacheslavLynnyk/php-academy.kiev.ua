<?php

for ($i = 0; $i <= 20; $i++){
    $bigArr[] = rand(1, 40);
}

$max = $bigArr[0];
$maxI = 0;
$min = $bigArr[0];
$minI = 0;

for ($i = 1; $i <= 20; $i++){
    if ($max < $bigArr[$i]) {
        $max = $bigArr[$i];
        $maxI = $i;
    } else {
       if ($min > $bigArr[$i]) {
           $min = $bigArr[$i];
           $minI = $i;
       }
    }
}
echo '<pre>';
print_r($bigArr);
echo '</pre>';

$bigArr[$maxI] = $min;
$bigArr[$min] = $max;


echo '<pre>';
print_r($bigArr);
echo '</pre>';

echo 'MAX: '.$max." i: ".$maxI.'<br>';
echo 'MIN: '.$min." i: ".$minI;