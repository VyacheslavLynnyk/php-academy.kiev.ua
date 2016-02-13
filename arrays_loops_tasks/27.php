<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Color Table</title>
</head>
<body>
<?php
    $rows = 50;
    $cols = 5;

    $colors = ['red', 'yellow', 'blue', 'gray', 'maroon', 'brown', 'green'];
    $colorMaxIndex = count($colors) - 1;
?>
<table>
    <?php for($i = 0; $i < $rows; $i++ ): ?>
        <tr>
        <?php for($j = 0; $j < $rows; $j++ ):?>
            <?php $colorIndex = rand(0, $colorMaxIndex); ?>
            <?php $color = $colors[$colorIndex]; ?>
              <td <?php echo 'style="background:'.$color.'"' ?> >
                  <?php echo rand(1, 99999) ?>
              </td>

        <?php endfor; ?>
        </tr>
    <?php endfor; ?>

</table>

</body>
</html>


