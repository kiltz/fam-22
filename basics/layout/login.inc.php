<?php
if (!isset($meldung)) {
    $meldung = "";
}
?>
<h2>Login</h2>
<form method="post">
    <input type="hidden" name="seite" value="einloggen"/>
    <table>
        <tr>
            <td>E-Mail</td>
            <td>
                <input type="text" name="email"/>
            </td>
        </tr>
        <tr>
            <td>Passwort</td>
            <td>
                <input type="text" name="passwort"/>
            </td>
        </tr>
    </table>
    <input type="submit" value="absenden"/>

</form>
<p>
    <?php echo $meldung;?>
</p>