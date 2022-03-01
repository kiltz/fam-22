<?php
session_start();
// Ausgangslage
if (!isset($_SESSION["stahl"]) || isset($_REQUEST["reset"])) {
    $_SESSION["stahl"] = 1000;
    $_SESSION["geld"] = 5000;
}


// BasisVariablen
$_MAX_PREIS = 136;
$geld = $_SESSION["geld"];
$stahl = $_SESSION["stahl"];
$meldung = "";
$fehlerMeldung = "";
$verkaufsFormClass = "zeige";
$bestaetigeFormClass = "verstecke";
$verkaufAnzahl = $einzelpreis = $provision = 0;

// wenn Verkaufsformular abgschickt wird
if (isset($_POST["aktion"])) {
    $aktion = $_POST["aktion"];
    $verkaufAnzahl = $_POST["verkaufAnzahl"];
    $einzelpreis = $_POST["einzelpreis"];
    $provision = $verkaufAnzahl * $einzelpreis / 10;
    // 1. Schritt: Verkaufen
    if ($aktion == "verkauf") {

        if ($verkaufAnzahl * 1 == 0 or $einzelpreis * 1 == 0 ) {
            $fehlerMeldung .= "Anzahl oder Preis ist 0! Nichts zu tun...<br/>";
        }
        if ($provision > $geld) {
            $fehlerMeldung .= "Du hast nicht genug Geld für die Provision!<br/>";
        }
        if ($verkaufAnzahl < 0) {
            $fehlerMeldung .= "Du kannst keine negative Anzahl Waren verkaufen!<br/>";
        }
        if ($einzelpreis > $_MAX_PREIS) {
            $fehlerMeldung .= "Du bist zu Teuer!<br/>";
        }
        // Alles ok?
        if ($fehlerMeldung == "") {
            $verkaufsFormClass = "verstecke";
            $bestaetigeFormClass = "zeige";
        }
    }
    // 2. Schritt: Bestätigen
    if ($aktion == "bestaetige") {
        $geld = $geld - $provision + ($verkaufAnzahl * $einzelpreis);
        $stahl -= $verkaufAnzahl;
        $_SESSION["stahl"] = $stahl;
        $_SESSION["geld"] = $geld;
        $verkaufAnzahl = 0;
        $einzelpreis = 0;
        $meldung = "Die Waren wurden verkauft und das Geld gut geschrieben!";
    }
}	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="STYLESHEET" type="text/css" href="formate.css">
    <title>Lagerverkauf</title>
</head>
<body>
<h2>Lagerverkauf</h2>
<div id="info">
    <h3>Bestände</h3>
    Du hast:
    <ul>
        <li><?= $geld ?> EUR</li>
        <li><?= $stahl ?> t Stahl</li>
    </ul>

</div>
<div id="verkauf" class="<?= $verkaufsFormClass ?>">
    <h3>Verkaufen</h3>
    <form method="POST">
        <input type="hidden" name="aktion" value="verkauf"/>
        <input type="text" size="10" name="verkaufAnzahl" value="<?= $verkaufAnzahl ?>"/> t Stahl
        zu
        <input type="text" size="10" name="einzelpreis" value="<?= $einzelpreis ?>"/> EUR / t.

        <input type="submit" value=" verkaufe "/>
    </form>
</div>
<div id="bestaetige" class="<?= $bestaetigeFormClass ?>">
    <h3>Bestätigung</h3>
    <form method="POST">
        <input type="hidden" name="aktion" value="bestaetige"/>
        <input type="hidden" size="10" name="verkaufAnzahl" value="<?= $verkaufAnzahl ?>"/>
        <input type="hidden" size="10" name="einzelpreis" value="<?= $einzelpreis ?>"/>

        Du möchtest <?= $verkaufAnzahl ?> t Stahl zu <?= $einzelpreis ?> EUR / t verkaufen?
        <p>
            Die Verkaufsprovision beträgt <?= $provision ?> EUR.
        </p>
        <input type="submit" value="Ja, ich will!"/>
        <a href="#">Nö, lieber doch nicht...</a>
    </form>
</div>
<div id="meldungen">
    <div class="rot"><?= $fehlerMeldung ?></div>
    <div class="dunkelblau"><?= $meldung ?></div>

</div>

<a href="lager-Friedrich.php?reset=true">Reset</a>
</body>
</html>

