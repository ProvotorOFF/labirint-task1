<?php

?>
<html>
<head>
<link rel="stylesheet" href="/css/main.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&subset=cyrillic" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<button id="getajax" class="button-refresh"></button>
<div id="ajax"></div>
<script>
$('div#ajax').load('request.php');
$('button#getajax').click(function() {
   $('div#ajax').load('request.php');
});
</script>
</body>
</html>