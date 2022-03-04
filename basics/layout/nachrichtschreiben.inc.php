<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Nachricht schreiben</title>
    <link rel="STYLESHEET" type="text/css" href="../include/formate2.css">
</head>
<body>

<h2>Nachricht schreiben</h2>

<?php
$empfaenger = "";
$betreff = "";
$inhalt = "";
$erfolg = "";
$meldung = "";

// Ausgangslage
if (isset($_REQUEST["reset"])) {
$_SESSION["empfaenger"] = "";
$_SESSION["betreff"] = "";
$_SESSION["inhalt"] = "";
}

$verbNr = mysqli_connect("localhost", "root", "", "kapi") or // wenns nicht klappt
die("<H2>Verbindung zum SQL-Server konnte nicht hergestellt werden!</H2>" . mysqli_error($verbNr));

if (isset($_REQUEST["empfaenger"])) {
    $empfaenger = $_REQUEST["empfaenger"];
    $betreff = $_REQUEST["betreff"];
    $inhalt = $_REQUEST["inhalt"];

    // alles ausgefüllt?
    if ($empfaenger == "") {
        $meldung .= "<br/>Empfänger ist ein Pflichtfeld";
    }
    else{
        //ToDo Empfängerüberprüfung
    }

    if ($betreff == "") {
        $meldung .= "<br/>Betreff ist ein Pflichtfeld";
    }
    if ($inhalt == "") {
        $meldung .= "<br/>Inhalt ist ein Pflichtfeld";
    }
    if ($meldung == "") {
        // speichern
        $sql = "insert into nachricht (empfaenger_id, betreff, text)
                  values ('$empfaenger','$betreff', '$inhalt');";
        $ergebnis = @mysqli_query($verbNr, $sql )
        or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));

        $erfolg = "nachricht gesendet";
        $empfaenger = "";
        $betreff = "";
        $inhalt = "";
    }
}

?>

<form method="POST">
    <table>
        <tr>
            <td>Empfänger</td>
            <td><input type="text" size="40" name="empfaenger" value="<?php echo $empfaenger ?>"/></td>
        </tr>
        <tr>
            <td>Betreff</td>
            <td><input type="text" size="40" name="betreff" value="<?php echo $betreff ?>"/></td>
        </tr>
        <tr>
            <td>Inhalt</td>
            <td><textarea cols="40" rows="5" name="inhalt"><?php echo $inhalt ?></textarea></td>
        </tr>
    </table>

    <input type="submit" class = "Button" value=" absenden "/>
    <input type="reset" class = "Button" value="alles löschen" />

</form>
<div class="rot">
    <?php echo $meldung ?>
</div>

<div class="gruen">
    <?php echo $erfolg ?>
</div>

<p><a href="index.php?seite=nachrichtschreiben">reset</a></p>
<p><a href="index.php?seite=postausgang">Postausgang</a></p>
<p><a href="index.php">ausloggen</a></p>

</body>
</html>