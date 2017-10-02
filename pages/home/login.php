<?php

require_once '../../includes/autoloader.php';

spl_autoload_register('autoLoad');

include_once('../../includes/headerHome.php');
include_once('../../includes/navHome.php');

?>

<div class="container mt-5">
    <div class="row">
    <div class="col-md-12">
        <h1>LOG IN</h1>
        <hr>
    </div>
    <div class="col-md-6">
        <div class="container">
            <form method="post">
                <div class="form-group">
                  <input type="email" name="email" placeholder="Email" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" name="loginButton" type="submit" value="Login">
                </div>
            </form>
                <?php
                    if(isset($_POST['loginButton']))
                    {
                        $login = new User(0, $_POST['email'], $_POST['password'], "", "false");
                        $login->HashPassword();
                        $login->Login("", "", "");
                    }
                ?>
        </div>
    </div>
    <div class="col-md-6">
        <p>Log in on the website for some cool and useful features. This website is specificly made for the planning of my sunday gaming so enjoy and have fun</p>
    </div>
            </div>
</div>



<?php

include_once('../../includes/footerHome.php');

