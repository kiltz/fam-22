
<h2>Postausgang</h2>

<table>
    <tr>

        <th>Uhrzeit</th>
        <th>Empfänger</th>
        <th>Betreff</th>
        <th>Inhalt</th>
    </tr>

<?php

$verbNr = mysqli_connect("localhost", "root", "", "kapi") or // wenns nicht klappt
die("<H2>Verbindung zum SQL-Server konnte nicht hergestellt werden!</H2>" . mysqli_error($verbNr));

$sql = "select * from `nachricht`";
$ergebnis = @mysqli_query($verbNr, $sql )
or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));

/*
// 1. Verbindung zur DB herstellen
$verbNr = mysqli_connect("localhost", "root", "", "kapi") or // wenns nicht klappt
die("<H2>Verbindung zum SQL-Server konnte nicht hergestellt werden!</H2>" . mysqli_error($verbNr));
// löschen?
if (isset($_REQUEST["loeschId"])) {
    $loeschId = $_REQUEST["loeschId"] * 1;
    $sql = "delete from benutzer where id = ".$loeschId;
    $ergebnis = @mysqli_query($verbNr, $sql )
    or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));
    $meldung = "Benutzer mit ID $loeschId wurde gelöscht!";
}
$seite = "benutzer";
include("indexController.inc.php");
*/

if (isset($_REQUEST["loeschId"])) {
    $loeschId = $_REQUEST["loeschId"] * 1;
    $sql = "DELETE FROM `nachricht`" . $loeschId;
    $ergebnis = @mysqli_query($verbNr, $sql)
    or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));
    $meldung = "Benutzer mit ID $loeschId wurde gelöscht!";
}

// Solange noch Sätze da sind
while ($satz = mysqli_fetch_array($ergebnis) ) {
    echo "<tr>";
    echo "<td>".$satz["uhrzeit"]."</td>";
    echo "<td>".$satz["empfaenger_id"]."</td>";
    // gebe den Namen aus
    echo "<td>".$satz["betreff"]."</td>";
    echo "<td>".$satz["text"]."</td>";
    echo "<td><a href='?loeschId=".$satz["id"]."'>Löschen</a></td>";
    echo "</tr>";
}


?>



<p><a href="index.php?seite=nachrichtschreiben">Zurück zu Nachricht schreiben</a></p>
