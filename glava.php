<?php
include_once 'seja.php';
//error_reporting(E_ALL);

switch($_SERVER['REQUEST_URI']) {
    case '/rentacar/prijava.php': $prijava = 'class="current"'; break;
    case '/rentacar/index.php': $index = 'class="current"'; break;
    case '/rentacar': $index = 'class="current"'; break;
    case '/rentacar/avtomobili.php': $avto = 'class="current"'; break;
    case '/rentacar/registracija.php': $registracija = 'class="current"'; break;
    case '/rentacar/oglasi.php': $oglas = 'class="current"'; break;
    case '/rentacar/iskanje.php': $isci = 'class="current"'; break;
    default: $index = 'class="current"'; break;
    //case '/rentacar/prijava.php': $prijava = 'class="current"'; break;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Rant-a-car</title>
        <meta name="keywords" content="free css templates, pineapple, CSS, HTML" />
        <meta name="description" content="Pineapple is a free CSS template provided by templatemo.com" />
        <link href="templatemo_style.css" rel="stylesheet" type="text/css" />

        <script language="javascript" type="text/javascript">
            function clearText(field)
            {
                if (field.defaultValue == field.value) field.value = '';
                else if (field.value == '') field.value = field.defaultValue;
            }
        </script>
        <script language="javascript" type="text/javascript"
                                            src="js/script.js"></script>
        <script type="text/javascript" src="js/prototype.js"></script>
        <script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
        <script type="text/javascript" src="js/lightbox.js"></script>
        <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
    </head>
    <body>

        <div id="templatemo_wrapper">

            <div id="templatemo_header">

                <div id="site_title"><h1><a href="http://www.templatemo.com" target="_parent">Free CSS Templates</a></h1></div>

            </div>

            <div id="templatemo_menu">
                <ul>
                    <li><a href="index.php" <?=$index?>>Domov</a></li>
                    <li><a href="oglasi.php" <?=$oglas?>>Oglasi</a></li>
                    <li><a href="avtomobil_dodaj.php">Dodaj avto</a></li>
                    <?php
                    if ((isset($_SESSION['prijavljen']))  
                            && ($_SESSION['prijavljen'] == 'da')) {
                    
                    ?>        
                    <li><a href="avtomobili.php" <?=$avto?>>Avti</a></li>
                    <li><a href="iskanje.php" <?=$isci?>>Iskanje</a></li>
                    <li><a href="odjava.php" >Odjava</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="prijava.php" <?=$prijava?>>Prijava</a></li>
                        <li><a href="registracija.php" <?=$registracija?>>Registracija</a></li>
                    <?php
                    }
                    ?>
                </ul>

                <div id="search_box">
                    <form action="iskanje.php" method="post">
                        <input type="text" value="Enter keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                        <input type="submit" name="Search" value="" id="searchbutton" title="Search" />
                    </form>
                </div>
                <div class="cleaner"></div>
            </div> <!-- end of templatemo_menu -->

            <div id="templatemo_main">