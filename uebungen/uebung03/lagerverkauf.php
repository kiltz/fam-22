<html>
<body>
<?php
// Erstelle zwei Ausgangsvariablen für einen Lagerbestand von 1000 Stahl
// und eine für 5000 EUR und speichere sie in der Session ab
// (sofern die Daten noch nicht in der Session vorhanden sind)
session_start();
$lagerbestand = 1000;
$vermoegen = 5000;
$menge = 0;
$einzelpreis = 0;
$verkaufsprov = (($menge * $einzelpreis) / 100 * 10);

if (isset($_SESSION["lagerbestand"])) {
    $lagerbestand = $_SESSION["lagerbestand"];
} else {
    $_SESSION["lagerbestand"] = $lagerbestand;
}

if (isset($_SESSION["vermoegen"])) {
    $vermoegen = $_SESSION["vermoegen"];
} else {
    $_SESSION["vermoegen"] = $vermoegen;
}

if (isset($_REQUEST["menge"])) {
    $menge = $_REQUEST["menge"];
}

if (isset($_REQUEST["einzelpreis"])) {
    $einzelpreis = $_REQUEST["einzelpreis"];
}

// prüfungen einbauen

if ($menge > 0 && $einzelpreis > 0){
    $lagerbestand = $lagerbestand - $menge;
    $vermoegen = $vermoegen + ($menge * $einzelpreis) - $verkaufsprov;
}
else if {

}

?>

<!--// Zeige auf der Seite die Stahlmenge und den Kontostand an.-->
<p>Lagerbestand: <?php echo $lagerbestand ?> Stück</p>
<p>Vermögen: <?php echo $vermoegen ?> €</p>

<!-- Zeige ein Formular bei dem man die Menge und den Einzelpreis eingeben kann. -->
<form method="post">
    <label for="menge">Menge: </label>
    <input type="number" name="menge" value="<?php echo $menge ?>"/>
    <br>
    <label for="einzelpreis">Einzelpreis: </label>
    <input type="number" name="einzelpreis" value="<?php echo $einzelpreis ?>"/>

    <input type="submit" value="Verkaufen">
</form>

<!--// Beim Absenden des Formulars sollen die Überprüfungen aus der Kapiland-Seite-->
<!--// vorgenommen werden.-->
<!---->
<!--// Zeige bei Falscheingaben die entsprechenden Fehlermeldungen an.-->
<!---->
<!--// Bei erfolgreichem Verkauf wird der Kontostand entsprechend erhöht-->
<!--// (abzüglich Verkaufsgebühr!) und der Lagerbestand verringert.-->
<!---->
<!---->
<!--// Zeige dann eine Erfolgsmeldung an.-->
<form>
    <label for="Erfolgreich verkauft">Erfolgreich verkauft!</label>
    <br>
    <input type="submit" value="weiter verkaufen">
</form>

</body>
</html>