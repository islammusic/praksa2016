<?php

include_once 'seja.php';
include_once 'baza.php';

$id_a = (int) $_POST['id_a'];
$id = $_SESSION['id_uporabnika'];

$sql = "SELECT * FROM avtomobili
    WHERE id_avtomobili=$id_a AND id_uporabniki=$id";
$rezult = mysql_query($sql);
/* vse je ok, avto je od prijavljenega lastnika */
if (mysql_num_rows($rezult) == 1) {
    $ext = substr($_FILES['slika']['name'], strrpos($_FILES['slika']['name'], '.') + 1);
    
    if (($_FILES['slika']['size'] < 5000000) &&
            ($ext == 'jpg')) {
        if ($_FILES['slika']['error'] <= 0) {
            $novo_ime = $id_a . '-' . date('Ymdhms') . '-' . $_FILES['slika']['name'];
            /* prenesemo sliko v našo mapo */
            move_uploaded_file($_FILES["slika"]["tmp_name"],
                    "slike/" . $novo_ime);
            
            //zapis v bazo
            mysql_query("INSERT INTO slike(url,id_avtomobili)
                VALUES ('slike/$novo_ime',$id_a)");


            header("Location: avtomobili.php?id_a=$id_a");
            die();
        }
        else {
            echo '<h2>Napaka pri nalaganju.</h2>';
        }
    }
    else {
        echo '<h2>Slika ni pravega tipa</h2>';
    }
}
?>