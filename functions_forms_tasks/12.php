<?php

function reverseWords()
{
    $text = '';
    if (sizeof($_POST)) {
        if (isset($_POST['text'])) {
            $text = (strip_tags($_POST['text']));
            $textArr = explode('.',$text);
            array_pop($textArr);
            $textArr = array_reverse($textArr);
            array_push($textArr, null);
            $textArr[0] = ltrim($textArr[0]);
            $text = implode('.', $textArr);
        }
    }
    return $text;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text reverse</title>
</head>
<body>
<h1>Лечим текст</h1>
<h3>Напишите предложение</h3>
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
    <textarea name="text" id="" cols="80" rows="10">А Васька слушает да ест. А воз и ныне там.
А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый.
А ларчик просто открывался. А там хоть трава не расти.
    </textarea><br>
    <input type="submit" value="Вылечить текст">
    <pre><?=reverseWords();?> </pre>
</form>
</body>
</html>
