<?php

    $array = [
        'Коля' => '200',
        'Вася' => '300',
        'Петя' => '400'
    ];

    foreach ( $array as $key=>$elem ){
        echo "$key - зарплата $elem долларов.<br>";
    }
