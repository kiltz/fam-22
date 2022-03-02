<?php
// Init
$username = "";
$email = "";
$passwort = "";
$firmenname = "";
$fehlermeldung = "";
$meldung = "";
// 1. Verbindung zur DB herstellen
$verbNr = mysqli_connect("localhost", "root", "", "kapi") or // wenns nicht klappt
die("<H2>Verbindung zum SQL-Server konnte nicht hergestellt werden!</H2>" . mysqli_error($verbNr));
// beende die Verabeitung mit der Fehlermeldung (die = stirb - Beenden der Verarbeitung)

// Aufruf per Formular?
if (isset($_REQUEST["username"])) {
    // Übergabe der Werte
    $username = $_REQUEST["username"];
    $email = $_REQUEST["email"];
    $passwort = $_REQUEST["passwort"];
    $firmenname = $_REQUEST["firmenname"];
    // Validierung
    if ($username == "") {
        $fehlermeldung .= "Username fehlt!<br/>";
    }
    if ($email == "") {
        $fehlermeldung .= "E-Mail fehlt!<br/>";
    }
    // Wenn alles ok
    if ($fehlermeldung == "") {
        // speichern


        $sql = "insert into benutzer (username, email, firmenname, passwort)
              values ('$username','$email', '$firmenname', password('$passwort'));";
        $ergebnis = @mysqli_query($verbNr, $sql )
        or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));

        $username = "";
        $email = "";
        $firmenname = "";
        $passwort = "";

        $meldung = "Benutzer $username wurde gespeichert!";

    }

}
$sql = "SELECT * FROM benutzer";

$ergebnis = @mysqli_query($verbNr, $sql )
or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));
?>
