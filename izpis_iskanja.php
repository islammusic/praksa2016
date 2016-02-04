<?php
include_once 'glava.php';
include_once 'baza.php';

function izpisUporabnika($id) {
    $r = mysql_query("SELECT * FROM uporabniki
                    WHERE id_uporabniki = $id");
    $izpis = mysql_fetch_array($r);

    return $izpis['ime'].' '.$izpis['priimek'];
}

$znamka = $_POST['znamka'];
$gorivo = $_POST['gorivo'];
$tip = $_POST['tip'];
$posta = $_POST['posta'];

$pogoj = " 1=1 ";

if ($znamka != '0') {
    $pogoj = $pogoj.(sprintf(" AND a.znamka = '%s' ",
    mysql_real_escape_string($znamka)));
}
if ($gorivo != '0') {
    $pogoj = $pogoj.(sprintf(" AND g.ime = '%s' ",
    mysql_real_escape_string($gorivo)));
}
if ($tip != '0') {
    $pogoj = $pogoj.(sprintf(" AND t.ime = '%s' ",
    mysql_real_escape_string($tip)));
}
if ($posta != '0') {
    $pogoj = $pogoj.(sprintf(" AND p.ime = '%s' ",
    mysql_real_escape_string($posta)));
}

$sql = "SELECT znamka, model, letnik,
        g.ime AS gorivo, t.ime AS tip, a.id_avtomobili,
        o.id_oglasi, o.datum_z, o.datum_k, o.cena, a.id_uporabniki
        FROM avtomobili a INNER JOIN goriva g
        ON a.id_goriva=g.id_goriva
        INNER JOIN oglasi o ON o.id_avtomobili=a.id_avtomobili
        INNER JOIN tipi t ON a.id_tipi = t.id_tipi
        INNER JOIN poste p ON o.id_poste=p.id_poste
    WHERE o.id_uporabniki IS NULL
    AND o.datum_k > '".date('Y-m-d')."' AND ".$pogoj;

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

include_once 'noga.php';
?>