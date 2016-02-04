<?php
include_once 'baza.php';

$email = $_GET['email'];

$sql = sprintf("SELECT * FROM uporabniki WHERE email = '%s'",
                mysql_real_escape_string($email));

$rezultat = mysql_query($sql);

if (mysql_num_rows($rezultat) == 0) {
    echo 'ok';
}
else {
    echo 'ZASEDENO!';
}
?>