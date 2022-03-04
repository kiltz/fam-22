<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Lauras WebPage</title>
    <link rel="STYLESHEET" type="text/css" href="formate.css">
</head>
<body>
<script src="../include/jquery-3.3.1.js">
</script>

<table cellpadding="3">
    <tr height="100">
        <td width="150"><img src="ezgif-5-0a17973100.jpg"></td>
        <td width="1000">Lauras WebPage</td>
    </tr>
    <tr height="450">
        <td>
            <h3>Menü</h3>
            <ul>
                <!-- <li><a href="index.php?seite=eins">Eins</a></li>
                <li><a href="index.php?seite=zwei">Zwei</a></li> -->
                <!-- <li><a href="index.php?seite=rechne">Rechner</a></li> -->
                <li><a href="index.php?seite=lager">Lagerverkauf</a></li>
                <!-- <li><a href="index.php?seite=aufgabe">Aufgabe zum Layout</a></li> -->
                <li><a href="index.php?seite=nachrichtschreiben">Nachricht schreiben</a></li>
                <li><a href="index.php?seite=postausgang">Postausgang</a></li>


            </ul>
        </td>
        <td>
            <!-- der Inhalt -->
            <?php
            if (file_exists($seite . ".inc.php")) {
                include($seite . ".inc.php");
            } else {
                echo "Keine Seite '" . $seite . "' gefunden!";
            }
            ?>
        </td>
    </tr>
</table>


</body>
</html>

