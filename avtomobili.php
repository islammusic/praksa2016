<?php

include_once 'glava.php';
include_once 'baza.php';

$id = $_SESSION['id_uporabnika'];

//toliko, da testiram

if (isset($_GET['id_a'])) {
    //izpisali vrednost avtomobila, ki ga iščemo
    $id_a = (int)$_GET['id_a'];
    $sql = "SELECT a.*, t.ime AS tip, g.ime AS gorivo
        FROM avtomobili a INNER JOIN tipi t
        ON t.id_tipi=a.id_tipi INNER JOIN goriva G on
        g.id_goriva=a.id_goriva
        WHERE a.id_avtomobili = $id_a";

     $rezultat = mysql_query($sql);

     if (mysql_num_rows($rezultat) == 1) {
         //izpišem avtomobil
         $avto = mysql_fetch_array($rezultat);
         echo '<div id="podatki">';
         echo $avto['znamka'].' '.$avto['model'].'<br />';
         echo $avto['ccm'].' ccm '.$avto['kw'].
         ' kW ('.($avto['kw']*1.3).' konjev)'.'<br />';
         echo $avto['km'].' km '.$avto['sedezi'].' sedežev <br />';
         echo $avto['barva'].' '.$avto['registracija'].'<br />';
         echo $avto['tip'].' '.$avto['gorivo'].'<br />';
         echo '</div>';

         echo '<div id="slike">';
         $sql_slike = "SELECT * FROM slike WHERE id_avtomobili = $id_a";
         $r_slike = mysql_query($sql_slike);
         while ($slika = mysql_fetch_array($r_slike)) {
             echo '<a href="'.$slika['url'].'" rel="lightbox[roadtrip]">';
             echo '<img src="'.$slika['url'].'" alt="slika" width="150px" />';
             echo '</a>';
         }
         ?>
<form action="nalozi_sliko.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_a" value="<?=$id_a?>" />
    <input type="file" name="slika" value="Prebrskaj" /><br />
    <input type="submit" name="submit" value="Naloži" />
</form>
         <?php
         echo '</div>';

         echo '<div id="opis">';
         echo $avto['opis'];
         echo '</div>';
     }
     else {
         echo '<h2>Noben avtomobil ne ustreza iskanemu kriteriju!</h2>';
     }

}
else {
    $sql = "SELECT znamka, model, letnik,
        g.ime AS gorivo, t.ime AS tip, a.id_avtomobili
    FROM avtomobili a INNER JOIN tipi t
    ON a.id_tipi=t.id_tipi
    INNER JOIN goriva g ON g.id_goriva=a.id_goriva
    WHERE a.id_uporabniki = $id";

    $rezultat = mysql_query($sql);

    while ($row = mysql_fetch_array($rezultat)) {
        $r_slika = mysql_query("SELECT url FROM slike
                            WHERE id_avtomobili=".
                                    $row['id_avtomobili']."
                            LIMIT 1");
        $slika = mysql_fetch_array($r_slika);

        echo '<div class="avto">';
        echo '<div class="slika">';
        echo '<a href="avtomobili.php?id_a='.$row['id_avtomobili'].'">';
        echo '<img src="'.$slika['url'].'"
            alt="slika" width="204px" />';
        echo '</a>';
        echo '</div>';
        echo '<div class="podatki">';
        echo $row['znamka'] . '<br />';
        echo $row['model'] . '<br />';
        echo $row['letnik'] . '<br />';
        echo $row['gorivo'] . '<br />';
        echo $row['tip'] . '<br />';
        echo '</div>';
        echo '<div class="uredi">';
        echo '<a href="avtomobil_izbrisi.php?id_a='.$row['id_avtomobili'].'" onclick="javascript:return confirm(\'Ali ste prepričani?\')">Izbriši</a> ';
        echo ' <a href="avtomobil_uredi.php?id_a='.$row['id_avtomobili'].'">Uredi</a>';
        echo ' <a href="oglas_dodaj.php?id_a='.$row['id_avtomobili'].'">Dodaj oglas</a>';
        echo '</div>';
        echo '</div>';
    }
}
include_once 'noga.php';
?>