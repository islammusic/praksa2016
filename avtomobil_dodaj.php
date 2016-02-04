<?php
include_once 'glava.php';
?>

<form action="avtomobil_vstavi.php" method="post">
    <table border="0">
        <tr>
            <td>Znamka</td>
            <td><input type="text" name="znamka" /></td>
        </tr>
        <tr>
            <td>Model</td>
            <td><input type="text" name="model" /></td>
        </tr>
        <tr>
            <td>Letnik</td>
            <td>
                <select name="letnik">
                    <?php
                    for ($st=date("Y"); $st >= 1900; $st--) {
                        echo '<option value="'.$st.'">'.$st.'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Barva</td>
            <td><input type="text" name="barva" /></td>
        </tr>
        <tr>
            <td>Opis</td>
            <td><textarea name="opis" cols="15" rows="5"></textarea> </td>
        </tr>
        <tr>
            <td>Prostornina (ccm)</td>
            <td><input type="text" name="ccm" /></td>
        </tr>
        <tr>
            <td>Kilovati (kW)</td>
            <td><input type="text" name="kw" /></td>
        </tr>
        <tr>
            <td>Prevoženi km</td>
            <td><input type="text" name="km" /></td>
        </tr>
        <tr>
            <td>Sedeži</td>
            <td><input type="text" name="sedezi" /></td>
        </tr>
        <tr>
            <td>Registracija</td>
            <td><input type="text" name="registracija" /></td>
        </tr>
        <tr>
            <td>Gorivo</td>
            <td>
                <?php
                    include_once 'baza.php';
                    $sql = "SELECT * FROM goriva ORDER BY ime";

                    $rezultat = mysql_query($sql);
                    echo '<select name="id_goriva">';
                    while ($row = mysql_fetch_array($rezultat)) {
                        echo '<option value="'.$row['id_goriva'].
                                '">'.$row['ime'].'</option>';
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>Tip vozila</td>
            <td>
                <?php
                    include_once 'baza.php';
                    $sql = "SELECT * FROM tipi ORDER BY ime";

                    $rezultat = mysql_query($sql);
                    echo '<select name="id_tipi">';
                    while ($row = mysql_fetch_array($rezultat)) {
                        echo '<option value="'.$row['id_tipi'].
                                '">'.$row['ime'].'</option>';
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Vnesi" />
            </td>
        </tr>
    </table>
</form>

<?php
include_once 'noga.php';
?>