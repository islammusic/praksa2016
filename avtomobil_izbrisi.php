<?php
include_once 'seja.php';
include_once 'baza.php';
//id avtomobila
$id_a = (int) $_GET['id_a'];
//id uporabnika
$id = $_SESSION['id_uporabnika'];

$sql = "DELETE FROM avtomobili WHERE id_avtomobili=$id_a
        AND id_uporabniki=$id";

mysql_query($sql);

header("Location: avtomobili.php");
die();

?>