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
    if ($allDataStr = file_get_contents($path)) {
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

if (sizeof($_POST)) {
    if (isset($_POST['username']) && isset($_POST['text'])){
        $userName = trim(strip_tags($_POST['username']));
        $text = trim(htmlspecialchars(($_POST['text'])));

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
    <style>
        #guest-desk {
            float: left;
            position: relative;
            display: block;
            border: 2px solid white;
            box-shadow: 2px 3px 10px #5080d0;
            border-radius: 10px;
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
            padding: 8px;
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
            padding: 15px;
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

    </style>
</head>
<body>
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

<h1>Write your message</h1>
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="text" name="username" placeholder="Your name">
    <textarea name="text" rows="10" placeholder="Your message"></textarea>

    <input id="send-key" type="submit" value="send">
</form>
</body>
</html>
