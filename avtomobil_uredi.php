<?php
include_once 'glava.php';
include_once 'baza.php';

$id_a = (int) $_GET['id_a'];
$id = $_SESSION['id_uporabnika'];

$sql = "SELECT * FROM avtomobili WHERE id_avtomobili=$id_a
        AND id_uporabniki=$id";

$rezultat = mysql_query($sql);
$avto = mysql_fetch_array($rezultat);

?>

<form action="avtomobil_update.php" method="post">
    <input type="hidden" name="id_a" value="<?=$id_a?>" />
    <table border="0">
        <tr>
            <td>Znamka</td>
            <td><input type="text" name="znamka" value="<?=$avto['znamka']?>" /></td>
        </tr>
        <tr>
            <td>Model</td>
            <td><input type="text" name="model" value="<?=$avto['model']?>" /></td>
        </tr>
        <tr>
            <td>Letnik</td>
            <td>
                <select name="letnik">
                    <?php
                    for ($st=date("Y"); $st >= 1900; $st--) {
                        if ($avto['letnik'] == $st) {
                            echo '<option value="'.$st.'" selected="selected">'.$st.'</option>';
                        }
                        else {
                            echo '<option value="'.$st.'">'.$st.'</option>';
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Barva</td>
            <td><input type="text" name="barva" value="<?=$avto['barva']?>" /></td>
        </tr>
        <tr>
            <td>Opis</td>
            <td><textarea name="opis" cols="15" rows="5"><?=$avto['opis']?></textarea> </td>
        </tr>
        <tr>
            <td>Prostornina (ccm)</td>
            <td><input type="text" name="ccm" value="<?=$avto['ccm']?>" /></td>
        </tr>
        <tr>
            <td>Kilovati (kW)</td>
            <td><input type="text" name="kw" value="<?=$avto['kw']?>" /></td>
        </tr>
        <tr>
            <td>Prevoženi km</td>
            <td><input type="text" name="km" value="<?=$avto['km']?>" /></td>
        </tr>
        <tr>
            <td>Sedeži</td>
            <td><input type="text" name="sedezi" value="<?=$avto['sedezi']?>" /></td>
        </tr>
        <tr>
            <td>Registracija</td>
            <td><input type="text" name="registracija" value="<?=$avto['registracija']?>" /></td>
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
                        if ($avto['id_goriva'] == $row['id_goriva']) {
                            echo '<option value="'.$row['id_goriva'].
                                '" selected="selected">'.$row['ime'].'</option>';
                        }
                        else {
                            echo '<option value="'.$row['id_goriva'].
                                '">'.$row['ime'].'</option>';
                        }
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
                        if ($avto['id_tipi'] == $row['id_tipi']) {
                        echo '<option value="'.$row['id_tipi'].
                                '" selected="selected">'.$row['ime'].'</option>';
                        }
                        else {
                         echo '<option value="'.$row['id_tipi'].
                                '">'.$row['ime'].'</option>';
                        }
                    }
                    echo '</select>';
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="Posodobi" />
            </td>
        </tr>
    </table>
</form>

<?php
include_once 'noga.php';
?>