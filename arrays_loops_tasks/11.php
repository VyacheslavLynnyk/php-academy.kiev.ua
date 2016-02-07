<?php

$a = -1;
while ($a < 100) {
    if ( (++$a % 2) == 0){
        echo $a.'<br>';
    }
}
?>

    <hr>

<?php

for ($a = 0; $a <= 100; $a += 2){
    echo $a.'<br>';
}