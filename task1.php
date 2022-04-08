<?php
$dataWeather = json_decode(file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=Moscow&mode=json&units=metric&cnt=1&lang=ru&appid=9bbe7ba7050ae915aa78d9e49d7ab3c2"));
$dataValute = json_decode(json_encode(simplexml_load_string(file_get_contents("https://www.cbr.ru/scripts/XML_daily.asp?date_req=" . date("d/m/Y")), "SimpleXMLElement", LIBXML_NOCDATA)));
$codes = ["USD", "EUR", "SEK", "JPY", "CAD"];
?>
<html>
<head>
<link rel="stylesheet" href="/labirint-task1/css/main.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&subset=cyrillic" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="line">
        <div class="container-header-text-12px-left">Москва</div>
        <div class="container-header-text-12px-right"><?=date("d.m")?></div>
    </div>
    <div class="line">
        <div class="container-body-text-14px-left">Температура</div>
        <div class="container-body-text-14px-right"><?=$dataWeather->main->temp?>&#xb0;C</div>
    </div>
    <div class="line">
        <div class="container-body-text-14px-left">Ощущается как</div>
        <div class="container-body-text-14px-right2"><?=$dataWeather->main->feels_like?>&#xb0;C</div>
    </div>
    <div class="line">
        <div class="container-footer-text-12px"><?=$dataWeather->weather[0]->description?></div>
    </div>
</div>
<div class="line">
<?foreach ($dataValute->Valute as $valute):?>
    <?if (in_array($valute->CharCode, $codes)):?>
        <div class="container-valute">
            1 <?=$valute->CharCode?> = <?=$valute->Value?> RUB<p>
            <center><?=$valute->Name?></center>
        </div>
    
    <?endif;?>
<?endforeach;?>
</div>
</body>
</html>