<h2>Kleiner unsinniger Taschenrechner</h2>

<form action="index.php" method="get">

<input type="hidden" name="seite" value="rechne"/> 

<input type="text" size="10" name="zahl1" value="<?php echo $zahl1 ?>"/> + 
<input type="text" size="10" name="zahl2" value="<?php echo $zahl2 ?>"/> +
<input type="text" size="10" name="zahl3" value="<?php echo $zahl3 ?>"/>  

<input type="submit" value=" = "/> 
<?php echo $ergebnis ?>
</form>
