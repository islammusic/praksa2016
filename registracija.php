<?php
include_once 'glava.php';
?>

<form action="uporabnik_vstavi.php" method="post" onsubmit="return form_check(this);">
    <table border="0" width="70%">
        <tr>
            <td>Ime:</td>
            <td>
                <input type="text" name="ime" onkeypress="pocistiCss(this);" />
            </td>
        </tr>
        <tr>
            <td>Priimek:</td>
            <td>
                <input type="text" name="priimek" onkeypress="pocistiCss(this);" />
            </td>
        </tr>
        <tr>
            <td>Naslov:</td>
            <td>
                <input type="text" name="naslov" onkeypress="pocistiCss(this);" />
            </td>
        </tr>
        <tr>
            <td>Kraj:</td>
            <td>
                <?php
                    include_once 'baza.php';
                    $sql = "SELECT * FROM poste ORDER BY ime";

                    $rezultat = mysql_query($sql);
                    echo '<select name="id_poste">';
                    while ($row = mysql_fetch_array($rezultat)) {
                        echo '<option value="'.$row['id_poste'].
                                '">'.$row['ime'].'</option>';
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>Telefon:</td>
            <td>
                <input type="text" name="telefon" onkeypress="pocistiCss(this);" />
            </td>
        </tr>
        <tr>
            <td>E-Pošta:</td>
            <td>
                <input type="text" name="email" onkeypress="pocistiCss(this);" />
                <div id="errorEmail" style="color: red;"></div>
            </td>
        </tr>
        <tr>
            <td>Username:</td>
            <td>
                <input type="text" name="username" onkeypress="pocistiCss(this);" />
            </td>
        </tr>
        <tr>
            <td>Geslo:</td>
            <td>
                <input type="password" name="geslo" onkeypress="pocistiCss(this);" />
            </td>
        </tr>
        <tr>
            <td>Geslo (ponovi):</td>
            <td>
                <input type="password" name="geslo2" onkeypress="pocistiCss(this);" />
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Registriraj" />
                <input type="reset" value="Prekliči" />
            </td>
        </tr>
    </table>
</form>

<?php
include_once 'noga.php';
?>