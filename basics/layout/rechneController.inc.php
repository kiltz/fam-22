
<?php
if (isset($_REQUEST["zahl1"])) {

	$zahl1 = $_REQUEST["zahl1"];
	$zahl2 = $_REQUEST["zahl2"];
	$zahl3 = $_REQUEST["zahl3"];
	$ergebnis = $zahl1 + $zahl2 + $zahl3;

} else  { 
	$zahl1 = "0";
	$zahl2 = "0";
	$zahl3 = "0";
	$ergebnis = "0";
}

?>

