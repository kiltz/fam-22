<?php
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

?>