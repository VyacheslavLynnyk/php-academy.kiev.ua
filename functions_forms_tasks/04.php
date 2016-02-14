<?php

function getAllFiles($path){
    $dataArr = scandir($path);
    foreach ($dataArr as $data){
        if (is_dir($data)) {
            continue;
        }
        $files[] = $data;
    }
    return (sizeof($files)) ? $files : false;
}

$allFiles = getAllFiles('.');
foreach ($allFiles as $file){
    echo $file.'<br>';
}