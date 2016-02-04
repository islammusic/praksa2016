<?php
include_once 'seja.php';
include_once 'baza.php';

$id_a = (int)$_POST['id_a'];
$id = $_SESSION['id_uporabnika'];

$sql = sprintf("INSERT INTO oglasi (datum_z, datum_k, naslov, id_poste, cena, id_avtomobili)
                                VALUES ('%s', '%s', '%s', %s, '%s', %s)",
                mysql_real_escape_string($_POST['datum_z']),
                mysql_real_escape_string($_POST['datum_k']),
                mysql_real_escape_string($_POST['naslov']),
                mysql_real_escape_string($_POST['id_poste']),
                mysql_real_escape_string($_POST['cena']),
                mysql_real_escape_string($id_a));
//echo $sql;
if (!mysql_query($sql)) {
    echo mysql_error();
}
//iz baze "potegne" zadnje ustvarjen id
$id_o = mysql_insert_id();

header("Location: oglasi.php?id_o=$id_o");
die();

?>