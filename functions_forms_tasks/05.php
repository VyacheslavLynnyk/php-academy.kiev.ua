<?php

function searchFiles($path, $word, $withFolders = 1){
    $dataArr = scandir($path);
    $dataArr = array_diff($dataArr, ['.', '..']);
    foreach ($dataArr as $data){
        if (! $withFolders and is_dir($data)) {
            continue;
        }
        $pattern = '/'.$word.'/';
        if (preg_match($pattern, $data)) {
            $files[] = $data;
        }
    }
    return (sizeof($files)) ? $files : false;
}

$allData = searchFiles('.', '0', 1);
foreach ($allData as $data){
    echo $data.'<br>';
}