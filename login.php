<?php
if(!session_id()) {

    session_start();

}

if(!isset($_SESSION['failCount'])) {

    $_SESSION['failCount'] = 0;

}

if(isset($_GET['url'])) {

    $_SESSION['url'] = $_GET['url'];

} else {

    $_SESSION['url'] = "/BookListerCMS_gcedarblade/index.php";

}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Page</title>
    </head>
    <body>
        <?php

        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == "" || $password == "") {

                echo "<h2 style=\"color:red;\">Why you no enter strings?</h2>\n";

            } else {

                require 'dbConnect.php';

                try {

                    $sql = "SELECT pWord FROM users WHERE uName = '$username'";
                    $pWord = $pdo->query($sql)->fetchColumn();

                } catch (Exception $exception) {

                    echo "<h2 style=\"color:red;\">Unable to select users</h2>\n";

                }

                if (password_verify($password, $pWord)) {

                    // user logged in
                    $_SESSION['authenticated'] = true;
                    header("Location: http://localhost:9090" . $_SESSION['url']);

                } else {
                    
                    // user not logged in
                    $_SESSION['failCount']++;
                    echo  "<h2 style=\"color:red\">Login failed, " . (3 - $_SESSION['failCount']) . " attempts remaining</h2>\n";
                    if($_SESSION['failCount'] >= 3) {

                        header("Location: http://www.bing.com");

                    }

                }

            }

        }

        ?>
        <form action="" method="post">
            <label for="username">Username: </label>
            <input type="text" name="username"><br>
            <label for="password">Password: </label>
            <input type="text" name="password"><br>
            <input type="submit" name="submit" value="submit">
        </form>
    </body>
</html>
