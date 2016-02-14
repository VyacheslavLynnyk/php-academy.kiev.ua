<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Text Area</title>
</head>

<?php
// Curent file path
$filepath = __DIR__.'/textfile.txt';

function longWordsRemover($filePath, $count)
{
    $text = file_get_contents($filePath);

    if ($longWordsArr = longWords($text, $count)) {
        $words = explode(' ', $text);
        $updatedArr = array_diff($words, $longWordsArr);
        $textUpdated = implode(' ', $updatedArr);
        $resource = fopen($filePath, 'w');
        flock($resource, LOCK_EX);
        if (fwrite($resource, $textUpdated) != false) {
            $status = true;
        } else {
            $status = false;
        }
        flock($resource, LOCK_UN);
        fclose($resource);
    }
    return (!isset($status)) ? false : $status;
    // return $status ?? false;
}

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
        return (sizeof($biggestArr)) ? $biggestArr : false;
    }  else {
        return false ;
    }

}

?>

<body>
<h1> Выводим слова </h1>
<h3>Найдем 3 самых длинных слова.</h3>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
    <input type="number" name="count" placeholder="input value...">
    <input type="submit" value="Удалить">
    <p>
        <?php

        if (sizeof($_GET) !== false) {
            if (isset($_GET['count']) && !(empty($_GET['count']))) {
                $count = (int)($_GET['count']);

                if (longWordsRemover($filepath, $count) != false){
                    echo $count . ' cлов(а) удалено успешно';
                } else {
                    echo 'Возникла ошибка при удалении слов. ';
                }
            } else {
                echo 'Введите количество слов!';
            }
        }

        ?>
    </p>
</form>
</body>
</html>
