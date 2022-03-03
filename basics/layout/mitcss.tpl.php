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
        <?php
        if (isset($_SESSION["benutzer"])) {
            ?>
            <li><a href="index.php?seite=benutzer">Benutzerverwaltung</a></li>
            <li><a href="index.php?seite=logout">Logout</a></li>

            <?php
        } else {
        ?>
            <li><a href="index.php?seite=login">Login</a></li>
        <?php
        }
        ?>
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
