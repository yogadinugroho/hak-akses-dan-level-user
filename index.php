<?php 
session_start();
$login = $_SESSION['login'];

if( $login == true ){


    require 'functions.php';

    $status = $_SESSION["status"];
    if ($status == 0) {
        include "halaman/halaman-kosong.php";
    } else if ($status == 1) {
        include "halaman/halaman-satu.php";
    } else if ($status == 2) {
        include "halaman/halaman-dua.php";
    } else {
        include "../login.php";
    }
} else {
    include "login.php";
}
?>
