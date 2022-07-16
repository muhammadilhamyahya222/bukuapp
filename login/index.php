<?php

session_start();

include '../koneksi.php';

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT username FROM admin WHERE username = '$username' AND password = '$password'";

    $hasil = mysqli_query($koneksi, $query);

    $cek = mysqli_affected_rows($koneksi); //menentukan login berhasil atau tidak

    if($cek == 1)
    {
        $_SESSION['login'] = "logged in";
        header("Location: http://localhost/bukuapp/buku/");
    }
    else
    {
        echo "Username atau password salah.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style-login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-form">
        <h1>Login</h1>
            <form action="" method="post">
                <div class="form-group">
                <i class="fas fa-user"></i>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <input type="submit" name="login" value="Login" class="btn-login">  
            </form>
    </div>
</body>
</html>