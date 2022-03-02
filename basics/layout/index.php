<?php
// Frontcontroller
	session_start();
	if (isset($_REQUEST["seite"])){
		$seite = $_REQUEST["seite"];
	} else {
		$seite = "login";
	}
	
	if ($seite == "logout") {
		$seite = "login";
		// Variable löschen
		$_SESSION["benutzer"] = null;
	}

	// bei Bedarf Subcontroller einbinden
	if (file_exists($seite."Controller.inc.php")) {
		include($seite."Controller.inc.php");
	}
	
	
	
//include("standard.tpl.php");
include("mitcss.tpl.php");
?>