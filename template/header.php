<?php
session_start();
if(!isset($_SESSION['login']))
{
    header("Location: http://localhost/bukuapp/login/");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost/bukuapp/css/style.css">
    <title>
    <?php echo $page['title']; ?>
    </title>
</head>

<body>
    <ul class='nav'>
    <div class="wrapper">            
            <li class="logo nav-item"><a href="#">BOOK APP</a> </li>
            <li class="nav-item"><a class="<?php if($page['active'] == "buku") {echo "active";} ?>" href="#">Buku</a></li>
            <li class="nav-item"><a class="<?php if($page['active'] == "genre") {echo "active";} ?>" href="#">Genre</a></li>
            <li class="nav-item"><a href="http://localhost/bukuapp/login/logout.php">Logout</a></li>
        </div>
    </ul>

    <div class="wrapper">