<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="1">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>

</head>

<body>
    <?php
    include('config.php');
    include('bbCodeFunction.php');
    foreach (readXML('data.xml') as $value) {
        $date = $value["date"];
        $name = $value["name"];
        $text = $value["text"];
        $string = "$date $name: $text";
        echo "<div class = '" . (($key % 2) ? 'odd' : 'even') . "'>" . bbCode(smile(censor(MarcDown(htmlspecialchars($string))))) . "<br></div>";
    }
    //echo "<div class = '" . (($key % 2) ? 'odd' : 'even') . "'>" . bbCode(smile(censor(MarcDown(htmlspecialchars($value["text"]))))) . "</div>";

    ?>
</body>

</html>