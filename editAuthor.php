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
        <title>Edit Author</title>
    </head>
    <body>
        <?php
        if ($_GET['authId']) {

            $authorId = $_GET['authId'];
            $authorName = $_GET['authName'];

            if (isset($_POST['submit'])) {

                require 'dbConnect.php';

                try {

                    $sql = "UPDATE authors SET authorName = :authName WHERE id = :id";
                    $statement = $pdo->prepare($sql);
                    $statement->bindValue(":authName", $_POST['authorName']);
                    $statement->bindValue(":id", $_POST['authId']);
                    $statement->execute();
                    header("Location: http://localhost:9090/BookListerCMS_gcedarblade/authorsAdmin.php");
                } catch (Exception $exception) {

                    // TODO error handling


                }

            }

        }
        ?>
        <form action="" method="post">
            <label for="authorName">Author Name:</label>
            <input type="text" name="authorName" value="<?= $authorName ?>">
            <input type="hidden" name="authId" value="<?= $authorId ?>">
            <input type="submit" name="submit" value="Update">
        </form>
    </body>
</html>
