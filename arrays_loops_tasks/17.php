<?php

$arr = ['Январь', 'Февраль', 'Март',
        'Апрель', 'Май', 'Июнь',
        'Июль', 'Август', 'Сентябрь',
        'Октябрь', 'Ноябрь', 'Декабрь'];
$mounth = (int)Date('m');


foreach ($arr as $num => $m) {
    if ( ($num + 1) == $mounth ) {
        $m = '<b>'.$m.'</b>';
    }
    echo $m." ";
}