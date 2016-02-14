<?php
$path = __DIR__.'/guestbook.db';

function saveText($path, $dataArr)
{
    $dataStr = implode('<<',$dataArr);
    $dataStr  .= '>>';
    $resource = fopen($path, 'a+');
    $status = (fwrite($resource, $dataStr)) ? true : false;
    fclose($resource);
    return $status;
}

function getMessages($path){
    if ($allDataStr = file_get_contents($path))
    {
        $allDataRawArr = explode('>>', $allDataStr);
        foreach ($allDataRawArr as $data) {
            if (!empty($data)) {
                $dataInfo = explode('<<', $data);
                $dataArr[] = ['username' => $dataInfo[0], 'text' => $dataInfo[1], 'date' => $dataInfo[2]];
            }
        }
    }
    return (isset($dataArr)) ? $dataArr : false;
}

function checkBadWords($text)
{
    $pattern = '/хуй|пизда|джигурда|бля|хуи|ебл|пидор|пидар|хуе|ебищ|уеба/';
    if (preg_match_all($pattern, mb_strtolower($text, 'UTF-8'))) {
        return false;
    }
    return true;
}

if (sizeof($_POST)) {
    if (isset($_POST['username']) && isset($_POST['text'])){
        if (!empty($_POST['username'] || !empty($_POST['text']))) {
            $userName = trim(strip_tags($_POST['username']));
            $text = trim(htmlspecialchars(($_POST['text'])));
            $text = str_replace('&lt;b&gt;', '<b>', $text);
            $text = str_replace('&lt;/b&gt;', '</b>', $text);
            if (preg_match_all('|<b>|', $text) &&  !(preg_match_all('|</b>|', $text))){
               $text .= '</b>';
            }
            $text = nl2br($text);
            if (checkBadWords($text)) {
                $dataArr = ['username' => $userName, 'text' => $text, 'date' => date('Y-M-d H:m:s')];
                saveText($path, $dataArr);
            } else {
                $alert = 'Некорректный комментарий';
            }
        } else {
            $alert = 'Заполните все поля';
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        .content{
            text-align: center;
            padding: 0;
            width: 85%;
            margin: auto;
        }
        #guest-desk {
            float: left;
            position: relative;
            display: block;
            border: 2px solid white;
            box-shadow: 2px 3px 10px #5080d0;
            border-radius: 10px;
            width: 100%;
            padding: 10px;
            min-height: 300px;

        }
        h1 {
            text-align: center;
        }

        form {
            width: 300px;
            margin: auto;
        }
        form input, textarea {
            width: 100%;
            margin: 10px 0;
            padding: 4px;
        }
        #send-key {
            width: 100%;
            height: 30px;
            box-sizing: content-box;
        }
        #guest-desk .message {
            position: inherit;
            width: 100%;
        }
        .message div:first-child {
            position: inherit;
            display:inline-block;
            margin-bottom: 10px;
            padding: 8px 10px;
            float: left;
            width: 190px;
            min-height: 50px;
            text-align: center;
            color: white;
            background: #5080d0;
            border-radius: 30px 0 0 30px;
            box-shadow: 2px 3px 10px #5080d0;
        }
        .message-text {
            position: inherit;
            float: left;
            padding: 15px 25px;
            margin-bottom: 10px;
            width: calc(100% - 270px);
            font-family: Arial;
            min-height: 40px;
            display:inline-block;
            color: yellow;
            background: #6090e0;
            text-align: right;
            box-shadow: 2px 3px 10px #5080d0;
        }

        #alert {
            display: block;
            position: absolute;
            top: 100px;
            padding-top: 25px;
            text-align: center;
            width: 400px;
            font: 24px Arial, sans-serif;
            font-weight: bold;
            height: 50px;
            color: white;
            background: rgba(90,10,10, 0.5);
            border: 2px solid red;
            border-radius: 30px;

        }

    </style>
</head>
<body>
<div class="content">
    <h1>Guest book</h1>
    <div id="guest-desk">
        <?php if ($allMessages = getMessages($path)) : ?>
            <?php foreach ($allMessages as $data) : ?>
                    <div class="message">
                        <div>
                            <?=$data['username']?>
                            <hr>
                            <small><?=$data['date']?></small>
                        </div>
                        <div class="message-text"> <?=$data['text']?></div></p>
                    </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>


    <form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
        <h1>Write your message</h1>
        <input type="text" name="username" placeholder="Your name">
        <textarea name="text" rows="10" placeholder="Your message"></textarea>
        <input id="send-key" type="submit" value="send">
        <?php if (isset($alert) && !empty($alert)) : ?>
            <div id="alert"><?=$alert?></div>
        <?php endif ?>
    </form>
</div>
</body>
</html>
