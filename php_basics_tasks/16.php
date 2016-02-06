<?php

$a = 34;
$b = 0;
$operator = '%';

if ( is_numeric($a) && is_numeric($a) && !empty($operator) ) {
    switch ($operator) {
        case '+':
            echo $a + $b;
            break;
        case '-':
            echo $a - $b;
            break;
        case '*':
            echo $a + $b;
            break;
        case '/':
            if ($b != 0) {
                echo $a + $b;
            } else {
                echo "На 0 делить нельзя.";
            }
            break;
        case '%':
            if ($b != 0) {
                echo $a % $b;
            } else {
                echo "На 0 делить нельзя.";
            }
    }
} else {
    echo "Ошибка ввода данных";
}
