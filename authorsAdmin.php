<?php
if (!session_id()) {
    session_start();
    require 'authenticate.php';
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
        <title>Authors Admin Page</title>
        <link href="css/authorsAdmin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        require 'dbConnect.php';

        try {

            $sql = "SELECT * FROM authors ORDER BY authorName";

            $authorResults = $pdo->query($sql);


        } catch (Exception $exception) {

            echo "NOOOOOO!!";
            // use some suitable error handling
        }

        echo "<table>\n";

        //while($row = $authorResults->fetch())
        $authorArray = $authorResults->fetchAll();
        foreach ($authorArray as $row) {

            echo <<<TABLEROW

                
                
TABLEROW;


        }

        ?>
    </body>
</html>
