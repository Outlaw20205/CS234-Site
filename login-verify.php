<?php
session_start();

if($_SESSION["Valid User"] == 1) {
    header("Location: home-page.php");
    exit();
}
else {
    header("Location: index.php");
    exit();
}

?>