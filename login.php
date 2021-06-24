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
    
    // ambil data dari form post
    $username = $_POST["username"];
    $password = $_POST["password"];

    // cek apakah username di database sama dengan username 
    // yang diinputkan oleh user tadi

    $result = mysqli_query($conn, " SELECT * FROM user 
            WHERE username = '$username' ");

    // cek username
    // mengecek apakah ada baris yang dikembalikan dari query result
    // hasilnya berupa id, username dan password

    if( mysqli_num_rows($result) === 1 ) {

        // mengecek passwordnya
        $row = mysqli_fetch_assoc($result);

        // kebalikan dari hash
        // param 1 adalah string yang belum diacak
        // param 2 adalah string yang sudah diacak  
        if(password_verify($password, $row["password"])) {
            // set session dan status
            $_SESSION["login"] = true;
            $_SESSION["status"] = $row["status"];

            // cek apakah remember me di checklist
            if( isset($_POST['remember']) ) {

                // buat cookie
                setcookie('id', $row['id'], time() + 60 );
                // buat cookie bernama username dan acak nilainya
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }



            // jika passwordnya sama, arahkan ke dalam sistem
            header("Location: index.php");
            exit;
        }
    }

    $error = true;

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
