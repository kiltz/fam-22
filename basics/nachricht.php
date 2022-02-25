<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Nachricht schreiben</title>
    <link rel="STYLESHEET" type="text/css" href="../include/formate.css">
</head>

<body>

<h2>Nachricht schreiben</h2>


<?php
$meldung = "";
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

} else {
    $empfaenger = "";
    $betreff = "";
    $inhalt = "";
}

?>

<form action="nachricht.php" method="POST">
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

    <input type="submit" value=" absenden "/>

</form>
<div class="rot">
    <?php echo $meldung ?>
</div>
<p><a href="index.php">zurück</a></p>
</body>
</html>

