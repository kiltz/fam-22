<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>Layout mit CSS</title>
    <link rel="STYLESHEET" type="text/css" href="formate2.css"/>

</head>
<body>
<script src="../include/jquery-3.3.1.js">
</script>

<div id="oben">
	<img src="logo.gif">
</div>

<div id="menue">
	<h3>Menü</h3>
	<ul>
		<li><a href="index.php?seite=eins">Eins</a></li>
		<li><a href="index.php?seite=zwei">Zwei</a></li>
        <li><a href="index.php?seite=rechne">Rechner</a></li>
        <li><a href="index.php?seite=aufgabe">Aufgabe zum Layout</a></li>
	</ul>

</div>

<div id="info">
	und rechts kommt eine Info-Box
</div>


<div id="inhalt">
		<!-- der Inhalt -->
		<?php
		if (file_exists($seite.".inc.php")) {
			include($seite.".inc.php");
		} else {
			echo "Keine Seite '".$seite."' gefunden!";
		}
		?>
</div>

 </body>
 </html>
