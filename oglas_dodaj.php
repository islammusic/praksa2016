<?php
include_once 'glava.php';
include_once 'baza.php';

$id_a = (int)$_GET['id_a'];
$id = $_SESSION['id_uporabnika'];

?>

<form action="oglas_insert.php" method="post">
    <input type="hidden" name="id_a" value="<?=$id_a?>" />
    <table border="0" width="70%">
        <tr>
            <td>Datum začetka:</td>
            <td>
                <input type="text" name="datum_z" />
            </td>
        </tr>
        <tr>
            <td>Datum konca:</td>
            <td>
                <input type="text" name="datum_k" />
            </td>
        </tr>
        <tr>
            <td>Naslov:</td>
            <td>
                <input type="text" name="naslov" />
            </td>
        </tr>
        <tr>
            <td>Kraj:</td>
            <td>
                <?php
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
            <td>Cena:</td>
            <td>
                <input type="text" name="cena" />
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