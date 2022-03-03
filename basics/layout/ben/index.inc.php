<h2>Benutzerverwaltung</h2>
<form method="post">
    <input type="hidden" name="seite" value="benutzer"/>
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
            echo "<td><a href='?seite=loesche&loeschId=".$satz["id"]."'>Löschen</a></td>";
            echo "</tr>";
        }

        ?>
    </table>

    <?php
}
?>
