<?php

$multi = 1;
for ($i = 0; $i < 100; $i++){
    $randomArr[$i] = rand(1, 100);
}

for ($i = 0; $i < 100; $i++) {
    if ( !($i % 2) && $randomArr[$i] > 0){
        $multi *= $randomArr[$i];
    }
}
echo "Произведение парных иднексов: ".$multi.'<br>';

echo "Не парный индекс: ";
for ($i = 1; $i < 100; $i += 2){
    echo ($randomArr[$i] > 0) ? $randomArr[$i]." " : '';
}



