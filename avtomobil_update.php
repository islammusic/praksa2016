<?php

include_once 'seja.php';
include_once 'baza.php';

$id_a = (int) $_POST['id_a'];
$id = $_SESSION['id_uporabnika'];

$sql = sprintf("UPDATE avtomobili SET
                        znamka ='%s',
                        model ='%s',
                        letnik = %s,
                        barva = '%s',
                        opis = '%s',
                        ccm = %s,
                        kw = %s,
                        km =%s,
                        sedezi = %s,
                        registracija = '%s',
                        id_goriva = %s,
                        id_tipi = %s
     WHERE id_avtomobili = $id_a AND id_uporabniki = $id
                        ",
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
        mysql_real_escape_string($_POST['id_goriva']),
        mysql_real_escape_string($_POST['id_tipi']));

if (!mysql_query($sql)) {
    echo mysql_error();
}

header("Location: avtomobili.php?id_a=$id_a");
die();
?>