<?php
session_start();

//zagotavljam, da mojo stran neprijavljeni uporabnik ne more
//obiskati
if (($_SESSION['prijavljen'] != 'da')
&& ($_SERVER['REQUEST_URI'] != '/rentacar/prijava.php')
&& ($_SERVER['REQUEST_URI'] != '/rentacar/oglasi.php')
&& ($_SERVER['REQUEST_URI'] != '/rentacar/registracija.php')) {
    header("Location: prijava.php");
}

?>