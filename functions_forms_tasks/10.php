<?php

function uniqueWords($text)
{
    $textArr = explode(' ', $text);
    return count(array_unique($textArr));
}
    if (sizeof($_GET)) {
        if (isset($_GET['text'])) {
            $text = trim(strip_tags($_GET['text']));
        }
    }

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Уникльные слова</h1>
<h3>Пишите слова</h3>
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="GET">
    <textarea name="text" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" value="mirror">
    <?php if (!empty($text)): ?>
    <p>Аж <?=uniqueWords($text);?> уникальных слов(а)</p>
    <?php endif ?>
</form>
</body>
</html>
