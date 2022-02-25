<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Datum und Zeit bei PHP</title>
</head>
<body>
<h2>PHP-Basic: Ein Datum</h2>
Heute ist der
<?php
/*
    Variablen-Namen beginnen mit einem $
    Jede Anweisung wird mit einem ; abgeschlossen
    time gibt die aktuelle Zeit zurück
        s. http://php.net/manual/de/function.time.php
    date() formatiert das Datum je nach Bedarf
        s. http://php.net/manual/de/function.date.php
*/

$heute = date("d.m.Y", time());
echo $heute;
?>.
<p>
<a href="index.php">zurück</a>
</body>
</html>
