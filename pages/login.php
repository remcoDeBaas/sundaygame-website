<?php

$config = require_once '../config.php';
require_once '../autoloader.php';

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
                $connect = new Database();

                $query = new DynamicQuery($connect->getPdo());

                $rows = $query->delete('user' , '1');

            }
        ?>
    </form>
</body>
</html>
