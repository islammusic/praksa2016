<?php
include_once 'seja.php';
include_once 'baza.php';

$sql = sprintf("INSERT INTO
 avtomobili (znamka,model,letnik,barva,opis,ccm,kw,km,sedezi,
 registracija,id_uporabniki,id_tipi,id_goriva)
 VALUES ('%s','%s',%s,'%s','%s',%s,%s,%s,%s,'%s',%s,%s,%s)",
        mysql_real_escape_string($_POST['znamka']),
        mysql_real_escape_string($_POST['model']),
        mysql_real_escape_string($_POST['letnik']),
        mysql_real_escape_string($_POST['barva']),
        mysql_real_escape_string($_POST['opis']),
        mysql_real_escape_string($_POST['ccm']),
        mysql_real_escape_string($_POST['kw']),
        mysql_real_escape_string($_POST['km']),
        mysql_real_escape_string($_POST['sedezi']),
        mysql_real_escape_string($_POST['registracija']),
        mysql_real_escape_string($_SESSION['id_uporabnika']),
        mysql_real_escape_string($_POST['id_tipi']),
        mysql_real_escape_string($_POST['id_goriva']));

if (!mysql_query($sql)) {
    echo mysql_error();
    echo '<br />';
    echo $sql;
}


header("Location: avtomobili.php");

?>