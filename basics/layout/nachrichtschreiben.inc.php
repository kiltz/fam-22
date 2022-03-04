<h2>Nachricht schreiben</h2>

<p><a href="index.php?seite=nachrichtschreiben">Neue Nachricht schreiben</a></p>

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
        $ergebnis = @mysqli_query($verbNr, $sql)
        or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));

        $erfolg = "Nachricht gesendet";
        $empfaenger = "";
        $betreff = "";
        $inhalt = "";
    }
}

$sql = "SELECT id, firmenname FROM benutzer where firmenname != ''";
$ergebnis = @mysqli_query($verbNr, $sql)
or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));

?>

<form method="POST">
    <table>
        <tr>
            <td>Empfänger</td>
            <td>
                <select name="empfaenger">
                    <?php
                    while ($satz = mysqli_fetch_array($ergebnis)) {
                        echo "<option value='" . $satz["id"] . "'>";
                        echo $satz["firmenname"];
                        echo "</option>";
                    }
                    ?>
                </select>
            </td>
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

    <input type="submit" class="Button" value=" absenden "/>

</form>
<div class="rot">
    <i><?php echo $meldung ?></i>
</div>
    <div class="gruen">
       <i><?php echo $erfolg ?></i>
    </div>