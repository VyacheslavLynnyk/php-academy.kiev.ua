<?php

echo strlen('Вася');

$vasya = [1,2,3,3=>23,30=>1,24,6];
$i = 0;
$n = count($vasya);
$sum = 0;
$el = 0;
while ($el < $n){
    if (isset($vasya[$i])){
        $sum += $vasya[$i];
        $el++;
    }
    $i++;
}
echo $sum;

$n = ['Name'=>'Petr', "LastName"=>'Igor Pupkin'];
$qKeys = array_keys($n);
print_r(array_values($n));
$cnt = count($n);
for ($i = 0; $i < $cnt; $i++){
        echo $n[$qKeys[$i]].'<br>';
}