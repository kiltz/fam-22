<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Kleiner unsinniger Taschenrechner</title>
    <link rel="STYLESHEET" type="text/css" href="../include/formate.css">
</head>

<body>

<h2>Kleiner unsinniger Taschenrechner</h2>


<?php

if (isset($_REQUEST["zahl1"])) {

    $zahl1 = $_REQUEST["zahl1"];
    $zahl2 = $_REQUEST["zahl2"];
    $ergebnis = $zahl1 + $zahl2;

} else {
    $zahl1 = "0";
    $zahl2 = "0";
    $ergebnis = "0";
}

?>

<form action="rechne.php" method="POST">

    <input type="text" size="10" name="zahl1" value="<?php echo $zahl1 ?>"/> +
    <input type="text" size="10" name="zahl2" value="<?php echo $zahl2 ?>"/> +

    <input type="submit" value=" = "/>
    <?php echo $ergebnis ?>
</form>

<p><a href="index.php">zurück</a></p>

<div>
    <h3>Kleine Lockerungsübung</h3>
    Erweitere den Rechner um eine dritte Zahl!
</div>
</body>
</html>

