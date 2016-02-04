<?php

include_once 'glava.php';
include_once 'baza.php';
//$pogoj = $_POST['q'];
?>
<form action="izpis_iskanja.php" method="post">
    <div class="isci">
        <label>Znamka</label>
        <select name="znamka">
            <option value="0">Izberi ...</option>
            <?php
                    $sql = "SELECT DISTINCT znamka
                            FROM avtomobili ORDER BY znamka";
                    $rezultat = mysql_query($sql);

                    while ($row = mysql_fetch_array($rezultat)) {
                        echo '<option value="'.$row['znamka'].
                                '">'.$row['znamka'].'</option>';
                    }
                ?>
        </select>
    </div>
    <div class="isci">
        <label>Gorivo</label>
        <select name="gorivo">
            <option value="0">Izberi ...</option>
            <?php
                    $sql = "SELECT DISTINCT ime
                            FROM goriva ORDER BY ime";
                    $rezultat = mysql_query($sql);

                    while ($row = mysql_fetch_array($rezultat)) {
                        echo '<option value="'.$row['ime'].
                                '">'.$row['ime'].'</option>';
                    }
                ?>
        </select>
    </div>
    <div class="isci">
        <label>Tipi</label>
        <select name="tip">
            <option value="0">Izberi ...</option>
            <?php
                    $sql = "SELECT DISTINCT ime
                            FROM tipi ORDER BY ime";
                    $rezultat = mysql_query($sql);

                    while ($row = mysql_fetch_array($rezultat)) {
                        echo '<option value="'.$row['ime'].
                                '">'.$row['ime'].'</option>';
                    }
                ?>
        </select>
    </div>
    <div class="isci">
        <label>Pošte</label>
        <select name="posta">
            <option value="0">Izberi ...</option>
            <?php
                    $sql = "SELECT DISTINCT ime
                            FROM poste ORDER BY ime";
                    $rezultat = mysql_query($sql);

                    while ($row = mysql_fetch_array($rezultat)) {
                        echo '<option value="'.$row['ime'].
                                '">'.$row['ime'].'</option>';
                    }
                ?>
        </select>
    </div>
    <div class="submit">
        <input type="submit" value="Išči" />
    </div>
</form>

<?php
include_once 'noga.php';
?>