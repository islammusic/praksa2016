<?php

//print_r($_POST);
//spremenljivke s prejšnje strani na tej strani "ulovim"
//in jih stranim v spremenljivke za lažje delo
$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$naslov = $_POST['naslov'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$username = $_POST['username'];
$geslo = $_POST['geslo'];
$geslo2 = $_POST['geslo2'];
$id_poste = $_POST['id_poste'];

if ((!empty($ime)) && (!empty($priimek)) && (!empty($naslov))
        && (!empty($email)) && (!empty($username)) && (!empty($telefon))
        && (!empty($geslo)) && (!empty($geslo2))) {
    //vse je ok, lahko delam

    if ($geslo == $geslo2) {
        include_once 'baza.php';

        //kodiranje gesla
        $geslo = sha1($geslo);

        $sql = sprintf("INSERT INTO
                uporabniki(ime, priimek, naslov, email,
                username, geslo, telefon, id_poste)
                VALUES ('%s', '%s', '%s', '%s',
                '%s', '%s', '%s', %s)",
                        mysql_real_escape_string($ime),
                        mysql_real_escape_string($priimek),
                        mysql_real_escape_string($naslov),
                        mysql_real_escape_string($email),
                        mysql_real_escape_string($username),
                        mysql_real_escape_string($geslo),
                        mysql_real_escape_string($telefon),
                        mysql_real_escape_string($id_poste));

        if (!mysql_query($sql)) //zapis v bazo
            echo mysql_error ();

        //uporabnika preusmerim nazaj na prijavo
        header('Location: index.php');
    }
    else {
        //uporabnika preusmerim nazaj na prijavo
        header('Location: registracija.php');
    }
} else {
    //uporabnik ni izpolnil vseh podatkov
    //uporabnika preusmerim nazaj na prijavo
    header('Location: registracija.php');
}
?>