<?php

$path = __DIR__.'/guestbook.db';

function saveText($path, $dataArr)
{
    $dataStr = serialize($dataArr);
    $resource = fopen($path, 'a+');
    $status = (fwrite($resource, $dataStr . PHP_EOL)) ? true : false;
    fclose($resource);
    return $status;
}

function getMessages($path){
    $resource = fopen($path, 'r');
    if ($readAll = filesize($path)) {
        while (!feof($resource)){
            $getLine = fgets($resource, 9999);
            if (!empty($getLine)) $dataArr[] = unserialize($getLine);
        }
        return $dataArr;
    } else {
        return false;
    }
}



if (sizeof($_POST)) {
    if (isset($_POST['username']) && isset($_POST['text'])){
        $userName = trim(strip_tags($_POST['username']));
        $text = trim(strip_tags($_POST['text']));
        $dataArr = ['username' => $userName, 'text' => $text, 'date' => date('Y-M-d H:m:s')];
        saveText($path, $dataArr);
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
<div id="guest-desk">
    <?php if ($allMessages = getMessages($path)) : ?>
        <?php foreach ($allMessages as $data) : ?>
                <div>
                    <p><?=$data['username']?> :<span class="message"><?=$data['text']?></span></p>
                </div>
        <?php endforeach ?>
    <?php endif ?>
</div>

<h1>Write your message</h1>
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="username" placeholder="Your name"><br>
    <textarea name="text" id="" cols="30" rows="10"></textarea><br>

    <input type="submit" value="send">
</form>
</body>
</html>
