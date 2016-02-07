<?php

    $array = [
        'green'=>'зеленый',
        'red'=>'красный',
        'blue'=>'голубой'
    ];

    foreach ( $array as $key=>$elem ){
        echo $key.'<br>';
    }
?>
    <hr>

<?php

    foreach ( $array as $key=>$elem ){
        echo $elem.'<br>';
}
