<?php

/*V tem dokumentu se bomo povezali s podatkovno bazo!*/

$streznik = 'localhost';
$uporabnik_baze = 'rentacar';
$geslo_baze = 'rentacar';
$ime_baze = 'rentacar';

//povezava s strežnikom
$povezava = mysql_connect($streznik, $uporabnik_baze, $geslo_baze);
//izbira baze na strežniku
$baza = mysql_select_db($ime_baze, $povezava);

mysql_query("SET NAMES 'utf8'");


?>