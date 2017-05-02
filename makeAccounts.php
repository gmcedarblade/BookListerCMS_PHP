<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        require 'dbConnect.php';

        try {

            $pdo->exec("DROP TABLE users");

        } catch (Exception $ex) {

            echo "<h2 style=\"color: red;\">Could not drop Table users</h2>";

        }

        try {
            $sql = "CREATE TABLE users"
                . " ("
                . "uName varchar(255) primary key,"
                . " pWord varchar(255)"
                . ");";

            $pdo->exec($sql);
        } catch (Exception $ex) {
            echo "<h2 style=\"color: red;\">Could not create Table users</h2>";
        }

        $fp = fopen("ids_fa2013.txt", "r");
        while(!feof($fp)) {

            $line = strtolower(trim(fgets($fp, 255)));

            if($line) {

                list($fname, $lname) = explode(" ", $line);

                // construct user name
                // first character of first name, followed by the last name
                $username = substr($fname, 0, 1) . $lname;

                // construct password
                // First 4 characters of the last name, if present
                // followed by the length of the last name
                // followed by the first name, with an uppercase first letter
                $password = substr($lname, 0, 4) . strlen($lname) . ucfirst($fname);

                // DEBUG INFO - REMOVE BEFORE PRODUCTION
                $newHash = password_hash($password, PASSWORD_DEFAULT);
                $secondNewHash = password_hash($password, PASSWORD_DEFAULT);
                $md5Hash = md5($password);
                $password = sha1($password);

                echo "<h2 style=\"color: green;\">Username: $username <br> md5: $md5Hash <br> sha1: $password <br> new hash: $newHash <br> 2nd new hash: $secondNewHash</h2><br>\n";

                try {
                    $sql = "INSERT INTO users VALUES(:uName, :pWord)";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(":uName", "$username");
                    $statement->bindValue(":pWord", "$newHash");
                    $statement->execute();
                } catch (Exception $exception) {
                    echo "<h2 style=\"color: red;\">Could not insert user: $username</h2>";
                }

            }

        }

        ?>
    </body>
</html>
