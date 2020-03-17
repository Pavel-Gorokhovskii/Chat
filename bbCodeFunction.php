<?php
function bbCode($text)
{
    $pat = ['/\[b\](.*)\[\/b\]/i', '/\[i\](.*)\[\/i\]/i', '/\[u\](.*)\[\/u\]/i', '/\[img\](.*)\[\/img\]/i'];
    $rep = ['<b>$1</b>', '<i>$1</i>', '<u>$1</u>', '<img src = "$1"></img>'];
    $text = preg_replace($pat, $rep, $text);
    return $text;
}

function smile($text)
{
    $arr = ['/\:\-\)/', '/\:\-\(/', '/\:\)/', '/\:\(/'];
    $arrImg = ['<img src = "ab.bmp">', '<img src = "ac.bmp">', '<img src = "ag.bmp">', '<img src = "av.bmp">'];
    $text =  preg_replace($arr, $arrImg, $text);
    return $text;
}

function censor($text)
{
    if (preg_match('/(дурак|редиска)/i', $text)) {
        return 'Вы используете ненормативную лексику';
    } else {
        return $text;
    }
}

function MarcDown($text)
{
    $pat = ['/\*\*(.*)\*\*/i', '/\*(.*)\*/i', '/\~\~(.*)\~\~/i'];
    $rep = ['<b>$1</b>', '<i>$1</i>', '<s>$1</s>'];
    $text = preg_replace($pat, $rep, $text);
    return $text;
}

function url($text)
{
    $pat =  ['/(https|http)\:\/\/.*/i', '/(https|http)\:\/\/.*(jpg|png|gif)/i'];
    $rep = ['<a href = "$0"></a>', '<img src = "$0">'];
    $text = preg_replace($pat, $rep, $text);
    return $text;
}

function saveXML($userAgent, $remoteAddr, $name, $text, $date)
{
    $str = <<<XML
\n<msg>
<userAgent>$userAgent</userAgent>
<addr>$remoteAddr</addr>
<name>$name</name>
<text>$text</text>
<date>$date</date>
</msg>
XML;
    return file_put_contents('data.xml', $str, FILE_APPEND);
}

function readXML($f)
{
    preg_match_all(
        '/<msg>.*?<userAgent>(.*?)<\/userAgent>.*?<addr>(.*?)<\/addr>.*?<name>(.*?)<\/name>.*?<text>(.*?)<\/text>.*?<date>(.*?)<\/date>.*?<\/msg>/ius',
        file_get_contents($f),
        $matches
    );

    $arr = [];

    foreach ($matches[1] as $key => $value) {
        $arr[$key]['userAgent'] = $value;
        $arr[$key]['addr'] = $matches[2][$key];
        $arr[$key]['name'] = $matches[3][$key];
        $arr[$key]['text'] = $matches[4][$key];
        $arr[$key]['date'] = $matches[5][$key];
    }

    return $arr;
}
