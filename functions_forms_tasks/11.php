<?php

function fixWords()
{
    $text = '';
    if (sizeof($_POST)) {
        if (isset($_POST['text'])) {
            $text = (strip_tags($_POST['text']));
            $text = preg_replace_callback('/(\.|^)\s{0,}([a-zа-я])/u',
                function ($letter)
                {
                    return mb_strtoupper($letter[0]);
                } , $text);
        }
    }
    return $text;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text FIxer</title>
</head>
<body>
<h1>Лечим текст</h1>
<h3>Напишите предложение</h3>
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
    <textarea name="text" id="" cols="80" rows="10">а васька слушает да ест.
а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь.
а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.
    </textarea><br>
    <input type="submit" value="Вылечить текст">
    <pre><?=fixWords();?> </pre>
</form>
</body>
</html>
