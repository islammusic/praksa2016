<?php

include_once 'glava.php';
include_once 'baza.php';

function izpisUporabnika($id) {
    $r = mysql_query("SELECT * FROM uporabniki
                    WHERE id_uporabniki = $id");
    $izpis = mysql_fetch_array($r);

    return $izpis['ime'].' '.$izpis['priimek'];
}

//iz baze preberem vse oglase, ki so aktivni in datumsko 
//še veljavni
$sql = "SELECT znamka, model, letnik,
        g.ime AS gorivo, t.ime AS tip, a.id_avtomobili,
        o.id_oglasi, o.datum_z, o.datum_k, o.cena, a.id_uporabniki
    FROM avtomobili a INNER JOIN tipi t
    ON a.id_tipi=t.id_tipi
    INNER JOIN goriva g ON g.id_goriva=a.id_goriva
    INNER JOIN oglasi o ON o.id_avtomobili=a.id_avtomobili
    WHERE o.id_uporabniki IS NULL
    AND o.datum_k > '" . date('Y-m-d') . "'";

$rezultat = mysql_query($sql);

while ($row = mysql_fetch_array($rezultat)) {
    $r_slika = mysql_query("SELECT url FROM slike
                            WHERE id_avtomobili=" .
                    $row['id_avtomobili'] . "
                            LIMIT 1");
    $slika = mysql_fetch_array($r_slika);

    echo '<div class="avto">';
    echo '<div class="slika">';
    echo '<a href="avtomobili.php?id_a=' . $row['id_avtomobili'] . '">';
    echo '<img src="' . $slika['url'] . '"
            alt="slika" width="204px" />';
    echo '</a>';
    echo '</div>';
    echo '<div class="podatki">';
    echo $row['znamka'] . '<br />';
    echo $row['model'] . '<br />';
    echo $row['letnik'] . '<br />';
    echo $row['gorivo'] . '<br />';
    echo $row['tip'] . '<br />';
    echo $row['datum_z'] . '<br />';
    echo $row['datum_k'] . '<br />';
    echo $row['cena'] . '<br />';
    echo '</div>';
    if (isset($_SESSION['id_uporabnika'])) {
        echo '<div class="uredi">';
        if ($row['id_uporabniki'] == $_SESSION['id_uporabnika']) {
            echo '<a href="oglas_izbrisi.php?id_o=' . $row['id_oglasi'] . '" onclick="javascript:return confirm(\'Ali ste prepričani?\')">Izbriši</a> ';
            //echo ' <a href="oglas_uredi.php?id_o='.$row['id_oglasi'].'">Uredi</a>';
        }
        echo ' <a href="oglas_rezerviraj.php?id_o=' . $row['id_oglasi'] . '">Rezerviraj</a>'.izpisUporabnika($row['id_uporabniki']);
        echo '</div>';
    }
    echo '</div>';
}

if (isset($_SESSION['prijavljen'])) {
    //id prijavljenega uporabnika
    $id = $_SESSION['id_uporabnika'];

    echo '<div style="clear:both;"></div>';
    //Izpiše vse moje oglase, tudi rezervirane
    echo '<h4>Moji oglasi</h4>';

    $sql = "SELECT znamka, model, letnik,
        g.ime AS gorivo, t.ime AS tip, a.id_avtomobili,
        o.id_oglasi, o.datum_z, o.datum_k, o.cena, a.id_uporabniki,
        o.id_uporabniki as rezerviran
    FROM avtomobili a INNER JOIN tipi t
    ON a.id_tipi=t.id_tipi
    INNER JOIN goriva g ON g.id_goriva=a.id_goriva
    INNER JOIN oglasi o ON o.id_avtomobili=a.id_avtomobili
    WHERE a.id_uporabniki = $id";

    $rezultat = mysql_query($sql);

    while ($row = mysql_fetch_array($rezultat)) {
        $r_slika = mysql_query("SELECT url FROM slike
                            WHERE id_avtomobili=" .
                        $row['id_avtomobili'] . "
                            LIMIT 1");
        $slika = mysql_fetch_array($r_slika);

        echo '<div class="avto">';
        echo '<div class="slika">';
        echo '<a href="avtomobili.php?id_a=' . $row['id_avtomobili'] . '">';
        echo '<img src="' . $slika['url'] . '"
            alt="slika" width="204px" />';
        echo '</a>';
        echo '</div>';
        echo '<div class="podatki">';
        echo $row['znamka'] . '<br />';
        echo $row['model'] . '<br />';
        echo $row['letnik'] . '<br />';
        echo $row['gorivo'] . '<br />';
        echo $row['tip'] . '<br />';
        echo $row['datum_z'] . '<br />';
        echo $row['datum_k'] . '<br />';
        echo $row['cena'] . '<br />';
        echo '</div>';

        echo '<div class="uredi">';
        echo '<a href="oglas_izbrisi.php?id_o=' . $row['id_oglasi'] . '" onclick="javascript:return confirm(\'Ali ste prepričani?\')">Izbriši</a> ';
        if ($row['rezerviran'] != NULL) {
           echo izpisUporabnika($row['rezerviran']);
        }
        echo '</div>';
        echo '</div>';
    }
    echo '<div style="clear:both;"></div>';
    //Izpiše vse oglase katere sem rezerviral
    echo '<h4>Moje rezervacije</h4>';

    $sql = "SELECT znamka, model, letnik,
        g.ime AS gorivo, t.ime AS tip, a.id_avtomobili,
        o.id_oglasi, o.datum_z, o.datum_k, o.cena, a.id_uporabniki,
        o.id_uporabniki as rezerviran
    FROM avtomobili a INNER JOIN tipi t
    ON a.id_tipi=t.id_tipi
    INNER JOIN goriva g ON g.id_goriva=a.id_goriva
    INNER JOIN oglasi o ON o.id_avtomobili=a.id_avtomobili
    WHERE o.id_uporabniki = $id";

    $rezultat = mysql_query($sql);

    while ($row = mysql_fetch_array($rezultat)) {
        $r_slika = mysql_query("SELECT url FROM slike
                            WHERE id_avtomobili=" .
                        $row['id_avtomobili'] . "
                            LIMIT 1");
        $slika = mysql_fetch_array($r_slika);

        echo '<div class="avto">';
        echo '<div class="slika">';
        echo '<a href="avtomobili.php?id_a=' . $row['id_avtomobili'] . '">';
        echo '<img src="' . $slika['url'] . '"
            alt="slika" width="204px" />';
        echo '</a>';
        echo '</div>';
        echo '<div class="podatki">';
        echo $row['znamka'] . '<br />';
        echo $row['model'] . '<br />';
        echo $row['letnik'] . '<br />';
        echo $row['gorivo'] . '<br />';
        echo $row['tip'] . '<br />';
        echo $row['datum_z'] . '<br />';
        echo $row['datum_k'] . '<br />';
        echo $row['cena'] . '<br />';
        echo '</div>';

        echo '<div class="uredi">';
        echo '<a href="oglas_odjavi.php?id_o=' . $row['id_oglasi'] . '" onclick="javascript:return confirm(\'Ali ste prepričani?\')">Odjavi</a> ';
        echo ' '.izpisUporabnika($row['id_uporabniki']);
        echo '</div>';
        echo '</div>';
    }
}
include_once 'noga.php';
?>