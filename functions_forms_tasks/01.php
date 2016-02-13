<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Text Area</title>
</head>

<?php

function getCommonWords($first, $second, $case){
    if ( !($case) ){
        $a = mb_strtolower($first, 'UTF-8');
        $b = mb_strtolower($second,'UTF-8');
    } else {
        $a = $first;
        $b = $second;
    }

    $arrA = explode(' ', $a);
    $arrB = explode(' ', $b);
    if ( count($arrB) > count($arrA) ) {
        return array_intersect($arrB, $arrA);
    }
    return array_intersect($arrA, $arrB);
}

?>

<body>
<h1> Выводим общие слова </h1>
<h3>Пишите в обоих колонках слова через пробел.</h3>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <textarea name="textLeft" id="" cols="30" rows="10">Петя Леня космос Виктор Федор Сумкин Илья Вика вася</textarea>
    <textarea name="textRight" id="" cols="30" rows="10">Леня Космос сумкин Федор Гриша Петя Яся Вася Рита сакура Алладин</textarea>
    <br>
    <label>Case sensitive
        <input type="checkbox" name="case" <?php echo (isset($_GET['case'])) ? 'checked' : '' ?> >
    </label>
    <input type="submit" value="Do it">
    <p>
        <?php

        if ( sizeof($_GET) !== false ) {
            if ( isset($_GET['textLeft']) && isset($_GET['textRight']) ) {
                $a = trim(strip_tags($_GET['textLeft']));
                $b = trim(strip_tags($_GET['textRight']));
                $case = ( isset($_GET['case']) ) ? true : false;
                if ( sizeof($wordsArr = getCommonWords($a, $b, $case) ) != false){
                    foreach ($wordsArr as $word) {
                        echo $word . ' ';
                    }
                } else {
                    echo 'Общих слов не обнаружено';
                }
            }
        }

        ?>
    </p>
</form>
</body>
</html>
