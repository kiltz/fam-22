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

// löschen?
if (isset($_REQUEST["loeschId"])) {
    $loeschId = $_REQUEST["loeschId"] * 1;
    $sql = "delete from benutzer where id = ".$loeschId;
    $ergebnis = @mysqli_query($verbNr, $sql )
    or die("<H2>Fehler bei der Abfrage</H2><pre>" . $sql . "</pre>" . mysqli_error($verbNr));
    $meldung = "Benutzer mit ID $loeschId wurde gelöscht!";

}
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
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Benutzerverwaltung</title>
		<link rel="STYLESHEET" type="text/css" href="../../include/
		formate.css">
	</head>
	<body>
		<h2>Benutzerverwaltung</h2>
		<form method="post">
			<table>
				<tr>
					<td>Username</td>
					<td>
					<input type="text" name="username" value="<?php echo $username?>"/>
					</td>
				</tr>
				<tr>
					<td>E-Mail</td>
					<td>
					<input type="text" name="email" value="<?php echo $email?>"/>
					</td>
				</tr>
                <tr>
                    <td>Firmenname</td>
                    <td>
                        <input type="text" name="firmenname" value="<?php echo $firmenname?>"/>
                    </td>
                </tr>
                <tr>
                    <td>Passwort</td>
                    <td>
                        <input type="text" name="passwort" value="<?php echo $passwort?>"/>
                    </td>
                </tr>
			</table>
			<input type="submit" value="absenden"/>

		</form>
		<p>
		<?php echo $meldung;?>
		</p>
		<p>
		<?php echo $fehlermeldung;?>
		</p>
		
		<?php
if (isset($ergebnis)) {
?>
<table>
<tr>
	<th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Firmenname</th>
    <th>Passwort</th>
	<th> </th>
</tr>
<?php

	// Solange noch Sätze da sind
	while ($satz = mysqli_fetch_array($ergebnis) ) {
		echo "<tr>";
		echo "<td>".$satz["id"]."</td>";
		// gebe den Namen aus
        echo "<td>".$satz["username"]."</td>";
        echo "<td>".$satz["email"]."</td>";
        echo "<td>".$satz["firmenname"]."</td>";
        echo "<td>".$satz["passwort"]."</td>";
        echo "<td><a href='?loeschId=".$satz["id"]."'>Löschen</a></td>";
		echo "</tr>";
	}

?>
</table>

<?php	
}		
		?>
		<p>
			<a href="Javascript:history.back()">Zurück</a>
		</p>
	</body>
</html>

