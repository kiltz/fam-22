<?php
$text = "";
if (isset($_REQUEST["text"])) {
    $text = $_REQUEST["text"];
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Datum und Zeit bei PHP</title>
    <link rel="STYLESHEET" type="text/css" href="../include/formate.css">
</head>
<body>
<h2>PHP-Basic: Ein Parameter</h2>

<form method="get">
    <input type="hidden" name="aktion" value="tuWas">
    <label>
        Text
        <input type="text" name="text" value="<?php echo $text ?>"/>
    </label>
    <input type="submit" value="absenden"/>
</form>

Eingabe für Text ist:
<?php
echo $text;
?>.
<p>
    <a href="index.php">zurück</a>
</p>
<?php
foreach ($_REQUEST as $k => $v) {
    echo $k . " => " . $v . "<br/>";
    $$k = $v;
}
?>
</body>
</html>
