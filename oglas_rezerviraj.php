<?php
include_once 'seja.php';
include_once 'baza.php';
//id avtomobila
$id_o = (int) $_GET['id_o'];
//id uporabnika
$id = $_SESSION['id_uporabnika'];

$sql = "UPDATE oglasi SET id_uporabniki = $id
        WHERE id_oglasi = $id_o";

mysql_query($sql);

header("Location: oglasi.php");
die();

?>