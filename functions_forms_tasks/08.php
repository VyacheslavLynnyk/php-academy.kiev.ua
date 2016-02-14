<?php

function textMirror($text)
{
    $textLength = strlen($text) - 1;
    $halfLength = (int)(strlen($text)/ 2);
    for ($i = 0; $i < $halfLength; $i++){
        $firstB = $text{$i};
        $text{$i} = $text{$textLength - $i};
        $text{$textLength - $i} = $firstB ;
    }
    return $text;

}

if (sizeof($_GET)) {
    if (isset($_GET['word'])){
        $text = trim(strip_tags($_GET['word']));
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
<h1>Write yout word</h1>
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="GET">
    <input type="text" name="word"><br>
    <input type="submit" value="mirror">
    <?php if (!empty($text)): ?>
    <p><?=textMirror($text);?></p>
    <p>In other function result will be:</p>
    <p><?=strrev($text)?></p>
    <?php endif ?>
</form>
</body>
</html>
