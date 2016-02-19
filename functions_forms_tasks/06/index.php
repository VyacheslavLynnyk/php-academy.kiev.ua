<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Photo gallery</title>
    <style>
        #content {
            width: 85%;
            margin: auto;
            text-align: center;
        }
        #content img {
            display: inline-block;
            position: relative;
            margin: 10px;
            /*float: left;*/
            width: 20%;
            border: 5px solid white;
            box-shadow: 2px 2px 4px black;
            transition: width 500ms;

        }
        #content img:hover {
            width: 30% ;
        }
    </style>
</head>

<?php

$targetPath = "gallery";


function getAllFiles($path){
    $dataArr = scandir($path);
    foreach ($dataArr as $data){
        if (is_dir($data)) {
            continue;
        }
        $files[] = $data;
    }
    return (isset($files)) ? $files : false;
}



function uploadFile($targetPath, $files )
{
    if (!is_dir($targetPath)) {
        mkdir($targetPath);
    }

    foreach ($files["image"]["tmp_name"] as $file => $filePath){
        $targetFile = $targetPath . '/' . basename($files["image"]["name"][$file]);
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        $type = strpos('jpg|jpeg|bmp|gif|png', strtolower($imageFileType));
        // Check if image file is a actual image or fake image
        if ($type && !empty($filePath)) {
            $check = getimagesize($filePath);
        } else {
            return "Load a file please...";
        }
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            if (move_uploaded_file($filePath, $targetFile)) {
                $message = 'uploaded seccesfully';
            } else {
                $message = 'file(s) not uploaded';
            }
        } else {
            $message = "File is not an image.";
        }
    }
    return $message;
}


if (sizeof($_POST)) {

    if(isset($_POST["submit"])) {
       $message =  uploadFile($targetPath, $_FILES);
    }
}
?>

<body>
    <h1>Gallery</h1>
    <fieldset>
        <legend>Upload your image</legend>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" >
            <input type="file" name="image[]" multiple>
            <input type="submit"  value="Upload images" name="submit">
            <p><?php echo $message ?? '' ?></p>
        </form>
    </fieldset>
    <div id="content">
        <?php if ($allFiles = getAllFiles($targetPath)): ?>
            <?php foreach ($allFiles as $num => $file): ?>
                <img src="<?=$targetPath.'/'.$file ?>" alt="изображение-<?=$num + 1?>">
            <?php endforeach ?>
        <?php endif; ?>

    </div>
</body>
</html>