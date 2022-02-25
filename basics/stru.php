<html>
<head>
    <title>PHP-Strukturen</title>
</head>
<body>
<h2>PHP-Strukturen</h2>

<h3>Bedingung mit If</h3>
<?php
$stunde = date("H") * 1; //Macht eine Zahl daraus
echo "Die aktuelle Stunde: " . $stunde . "<br/>";
if ($stunde < 12) {
    echo "Guten Morgen";
} else if ($stunde == 12) {
    echo "Mahlzeit!";
} else {
    echo "Guten Tag!";
}

?>
<h3>For-Schleife</h3>
<?php
for ($i = 1; $i <= 5; ++$i) {
    $q = $i * $i;
    echo $i . ": " . $q . "<br/>";
    // oder
//    echo "$i * $i = $q <br/>";
}

?>
<h3>Foreach-Schleife</h3>
<?php
$monate = array("Jan", "Feb", "Mär", "Apr");
echo "<ol>";
foreach ($monate as $monat) {
    echo "<li>$monat</li>";
}
echo "</ol>";

?>
<h3>While-Schleife</h3>
<ul>
    <?php
    $i = 4;
    while ($i > 0) {
        echo "<li>$i</li>";
        --$i;
    }
    ?>
</ul>

<a href="index.php">zurück</a>
</body>
</html>	
