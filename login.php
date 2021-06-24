<?php 

session_start();
require 'functions.php';

// cek cookie terlebih dahulu
// jika masih ada cookie, buat session dan lanjutkan ke index
// jika tidak ada cookie, masuk ke login

if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");

    // isi dari row ini adalah username saja
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
    // jika salah maka akan menuju ke login

}

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if( isset($_POST["login"]) ){
    
//     logic ketika login dipencet

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Login</title>
</head>
<body>

    <h1>Halaman Login</h1>


    <?php if( isset($error) ) : ?>
        <p style="color: red; font-style: italic;">username / password salah</p>
    <?php endif; ?>

    <form action="" method="POST">

        <ul>

            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" for="username">
            </li>            
            
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" for="password">
            </li>                       
            
            <li>
                <input type="checkbox" name="remember" for="remember">
                <label for="remember">Remember me</label>
            </li>            
        

            <li>
                <button type="submit" name="login">Login!</button>
            </li>

            <li>
                <a href="registrasi.php">Register!</a>
            </li>
            
        </ul>

    </form>
</body>
</html>
