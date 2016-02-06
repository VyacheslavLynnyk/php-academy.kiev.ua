<?php

$age = '34';
if (is_numeric($age) && $age > 0) {
    if ($age < 18) {
        echo "Вам еще рано работать";
    } elseif (18 <= $age && $age <= 59) {
        echo "Вам еще работать и работать";
    } else {
        echo "Вам пора на пенсию";
    }
} else {
    echo "Неизвестный возраст";
}
