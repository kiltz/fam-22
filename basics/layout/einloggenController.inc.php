<?php
// Verbindung zur Datenbank herstellen
$verbNr = mysqli_connect("localhost", "root", "", "kapi") or // wenns nicht klappt
die("<H2>Verbindung zum SQL-Server konnte nicht hergestellt werden!</H2>" . mysqli_error($verbNr));
// SQL zusammen stellen
$email = $_REQUEST["email"];
$passwort = $_REQUEST["passwort"];
$sql = "SELECT * FROM `benutzer` WHERE email = '$email' AND passwort = password('$passwort')";
// SQL abschicken
$ergebnis = @mysqli_query($verbNr, $sql )
or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));
// WENN ein Satz vorhanden ist DANN
if ($satz = mysqli_fetch_array($ergebnis) ) {
    // Benutzer (Firmennamen) in Session merken
    $_SESSION["benutzer"] = $satz;
    // Seite umbiegen auf Willkommen-Seite
    $seite = "willkommen";
// SONST
} else {
    // Variable Meldung für Fehler initialisieren
    $meldung = "Login nicht erfolgreich";
    // Seite auf "login" umbiegen
    $seite = "login";
// ENDE WENN
}
?>