<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <form action='?' method='POST'>
        <input type='text' value="<?= isset($_POST['userName']) ? $_POST['userName'] : ''; ?>" name='userName'>
        <input type='text' name='for'>
        <input class="submit" type="submit" value="OK">
    </form>
    <?php

    if ($_SERVER['REMOTE_ADDR'] != in_array('164.177.200.208', $_SERVER) && !empty($_POST['for'])) {
        file_put_contents('text.txt', $_SERVER['HTTP_USER_AGENT'] . ": " . $_SERVER['REMOTE_ADDR'] . ": " . $_POST['userName'] . ": " . $_POST['for'] . "\n", FILE_APPEND);
    } else {
        echo "<div class = 'BAN' Вас забанили </div>";
    }
    ?>


</body>

</html>