<?php
session_start();

//uničimo sejo
session_destroy();

header("Location: index.php");
die();
?>