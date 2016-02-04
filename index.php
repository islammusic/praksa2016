<?php
include_once 'glava.php';
?>

<?php
    include_once 'baza.php';

    $sql = "SELECT u.ime, u.priimek, p.ime AS posta
            FROM uporabniki u INNER JOIN poste p
            ON p.id_poste=u.id_poste
            WHERE u.id_uporabniki = ".$_SESSION['id_uporabnika'];
    //echo $sql;
    $rezultat = mysql_query($sql);
    $row = mysql_fetch_array($rezultat);

    echo '<h1>Pozdravljen '.$row['ime'].' '.
                $row['priimek'].' ('.$row['posta'].')</h1>';
?>



<p>Dobrodošli na naši spletni strani!</p>

<strong>islam.music@guest.arnes.si</strong>

<?php
include_once 'noga.php';
?>