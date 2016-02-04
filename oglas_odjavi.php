<?php
include_once 'seja.php';
include_once 'baza.php';

$id_o = (int) $_GET['id_o'];
$id = $_SESSION['id_uporabnika'];

$sql = "UPDATE oglasi SET id_uporabniki=NULL
        WHERE id_oglasi=$id_o AND id_uporabniki=$id";

if (!mysql_query($sql)) {
    echo mysql_error();
}

header("Location: oglasi.php");
die();
?>