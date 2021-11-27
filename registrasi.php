<?php 

    require 'functions.php';

    // ketika tombol register di pencet
    if( isset($_POST["register"]) ) {

        // jalankan fungsi registrasi
        if( registrasi($_POST) > 0 ) {
            echo "
                <script>
                    alert('user baru berhasil ditambahkan, selamat datang');
                </script>
            ";

        } else {
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Registrasi</title>
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="" method="POST">
    
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>

        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        
        <li>
            <label for="password2">Konfirmasi password :</label>
            <input type="password" name="password2" id="password2">
        </li>
    
        <br>
        <li>
            <button name="register" type="submit">Register!</button>
        </li>
    
    </ul>
    
    
    </form>
</body>
</html>
