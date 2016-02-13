<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Text Area</title>
</head>

<?php

    // count of top longest words;
    $count = 3;

    function longWords($text, $count){
        if ( isset($text) and !empty($text)) {
            $words = explode(' ', $text);

            for ($i = 0; $i < $count; $i++) {
                $biggest = '';
                foreach ($words as $num => $word) {
                    if (strlen($biggest) < strlen($word)) {
                        $biggest = $word;
                        $biggestNum = $num;
                    }
                }
                $biggestArr[] = $biggest;
                unset($words[$biggestNum]);
            }
            return $biggestArr;
        }  else {
            return $biggestArr = ['Слов меньше чем нужно выдать'] ;
        }



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
    <textarea name="text" id="" cols="30" rows="10">Петя Леня космос Виктор Федор Сумкин Илья Вика вася</textarea>

    </label>
    <input type="submit" value="Do it">
    <p>
        <?php

        if ( sizeof($_GET) !== false ) {
            if ( isset($_GET['text'])  ) {
                $text = trim(strip_tags($_GET['text']));

                if ( sizeof($longWordsArr = longWords($text, $count) ) != false){
                    echo "Самые ТОП".$count." длинных слов: ";
                    foreach ($longWordsArr as $word) {
                        echo $word . ' ';
                    }
                } else {
                    echo 'Ошибка обработки слов';
                }
            }
        }

        ?>
    </p>
</form>
</body>
</html>
