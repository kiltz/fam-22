<?php
// Verbindung zur Datenbank herstellen
// SQL zusammen stellen
    // z. B. SELECT * FROM `benutzer` WHERE `email` = 'testa@rossa.de' AND passwort = password('falsch')
// SQL abschicken
// WENN ein Satz vorhanden ist DANN
    // Benutzer (Firmennamen) in Session merken
    // Seite umbiegen auf Willkommen-Seite
// SONST
    // Variable Meldung für Fehler initialisieren
    // Seite auf "login" umbiegen
// ENDE WENN
$meldung = "einloggen";
$seite = "login";
?>