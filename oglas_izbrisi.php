<?php
include_once 'seja.php';
include_once 'baza.php';
//id avtomobila
$id_o = (int) $_GET['id_o'];
//id uporabnika
$id = $_SESSION['id_uporabnika'];

$sql = "DELETE FROM oglasi WHERE id_oglasi=$id_o
        AND id_avtomobili IN
                (SELECT id_avtomobili
                 FROM avtomobili
                 WHERE id_uporabniki = $id)";

mysql_query($sql);

header("Location: oglasi.php");
die();

?>