<?php

$config = require_once '../../config.php';
require_once '../../autoloader.php';

//Instanties van de classen
$connect = new Database();

$query = new DynamicQuery($connect->getPdo());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="email" name="email" id="username" placeholder="username"> <br>
        <input type="password" name="password" id="password" placeholder="password"> <br>

        <input type="submit" name="login" value="log in">
        <?php
            if (isset($_POST['login']))
            {
                $user = new User($_POST['email'], $_POST['password'], "", false);
                $user->HashPassword();
                $row = $query->selectWhere('user' , 'userMail' , $_POST['email']);
            }
        ?>
    </form>
</body>
</html>
