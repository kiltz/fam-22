<?php
session_start();
$lagerBestand = 1000;
$bargeld = 5000;
if (isset($_SESSION["lagerBestand"])) {
    $lagerBestand = $_SESSION["lagerBestand"];
    $bargeld = $_SESSION["bargeld"];
}
if (isset($_REQUEST["menge"])) {
    // TODO Menge prüfen (nicht 0 und nicht mehr als man hat)
    // TODO Preis prüfen ( nicht 0 nicht mehr wie 135)
    // TODO Provision prüfen (nicht mehr wie Bargeld)

    $lagerBestand = $lagerBestand - $_REQUEST["menge"];
    $bargeld = $bargeld + ($_REQUEST["menge"] * $_REQUEST["preis"]);
    $_SESSION["lagerBestand"] = $lagerBestand;
    $_SESSION["bargeld"] = $bargeld;
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Lagerbestand</title>
    <link rel="STYLESHEET" type="text/css" href="../include/formate.css">
</head>
<body>
<h2>Lagerbestand</h2>
LagerBestand: <?php echo $lagerBestand ?> <br/>
Bargeld:  <?php echo $bargeld ?> <br/>

<form method="post">
    <label>
        Menge
        <input type="text" name="menge"/>
    </label>
    <br/>
    <label>
        Preis
        <input type="text" name="preis"/>
    </label>
    <input type="submit" value="verkaufen"/>
</form>


</body>
</html>
