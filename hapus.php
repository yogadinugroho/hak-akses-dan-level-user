<?php

session_start();

// jika tidak ada session login, maka pindahkan ke login.php
if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

?>
