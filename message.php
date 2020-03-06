<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>

</head>

<body>
    <form action='?' method='POST'>
        <input type='text' value="<?= isset($_POST['userName']) ? $_POST['userName'] : ''; ?>" name='userName'>
        <input type='text' name='text'>
        <input class="submit" type="submit" value="OK">
    </form>
    <?php
    include('config.php');
    $banList = file('ban.txt');
    if (in_array($_SERVER['REMOTE_ADDR'], $banList)) {
        echo "<div class = 'BAN'> Вас забанили </div>";
    } elseif (!empty($_POST['text']) && !empty($_POST['userName'])) {
        file_put_contents('text.txt', $_SERVER['HTTP_USER_AGENT'] .
            $separate . $_SERVER['REMOTE_ADDR'] .
            $separate . $_POST['userName'] .
            $separate . $_POST['text'] .
            $separate . time() . "\n", FILE_APPEND);
    }
    ?>
</body>

</html>