<?php
include_once 'glava.php';
?>

<form action="preveri_prijavo.php" method="post">
    <table border="0" width="70%">
        <tr>
            <td>Username:</td>
            <td>
                <input type="text" name="username" />
            </td>
        </tr>
        <tr>
            <td>Geslo:</td>
            <td>
                <input type="password" name="geslo" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Prijava" />
                <input type="reset" value="Prekliči" />
            </td>
        </tr>
    </table>
</form>

<?php
include_once 'noga.php';
?>