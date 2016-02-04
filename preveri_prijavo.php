<?php
session_start();

$username = $_POST['username'];
$geslo = sha1($_POST['geslo']);

include_once 'baza.php';

$sql = sprintf("SELECT * FROM uporabniki
    WHERE username = '%s' AND
    geslo = '%s'",
 mysql_real_escape_string($username),
 mysql_real_escape_string($geslo));

$rezultat = mysql_query($sql);

//preverimo število vrstic - 1=1uporabnik s temi podatki
if (mysql_num_rows($rezultat) == 1) {
    //vzpostavim prijavo
    $_SESSION['prijavljen'] = 'da';
    //preberem id številko prijavljenega uporabnika
    $row = mysql_fetch_array($rezultat);
    $_SESSION['id_uporabnika'] = $row['id_uporabniki'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['ime'] = $row['ime'];
    $_SESSION['priimek'] = $row['priimek'];

    header("Location: index.php");
    die();
}
else {
    header("Location: prijava.php");
    die();
}

?>