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
