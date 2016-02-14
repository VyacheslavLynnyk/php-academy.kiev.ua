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
                    if (mb_strlen($biggest, 'UTF-8') < mb_strlen($word, 'UTF-8')) {
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
    }

?>

<body>
<h1> Выводим слова </h1>
<h3>Найдем 3 самых длинных слова.</h3>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <textarea name="text" id="" cols="30" rows="10">Петя Леня космос Виктор Федор Сумкин Илья Viktoriya Вика john вася</textarea><br>
    </label>
    <input type="submit" value="Вывести">
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
