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
        <title></title>
    </head>
    <body>
    <?php
    if ($_GET['authId']) {

    $authorId = $_GET['authId'];
    $authorName = $_GET['authName'];

    if (isset($_POST['submit'])) {

        require 'dbConnect.php';

        try {

            $sql = "DELETE from bookstuff WHERE authorId = :authId";
            $sql2 = "DELETE from authors WHERE id = :authId";

            $bookStatement = $pdo->prepare($sql);
            $authorStatement = $pdo->prepare($sql2);

            $bookStatement->bindValue(":authId", $_POST['authId']);
            $authorStatement->bindValue(":authId", $_POST['authId']);

            $bookStatement->execute();
            $authorStatement->execute();

            header("Location: http://localhost:9090/BookListerCMS_gcedarblade/authorsAdmin.php");

        } catch (Exception $exception) {

        // TODO error handling


        }

    }

    }
    ?>
    <form action="" method="post">
        <p>Are you sure you want to delete the author <?= $authorName ?> AND all associated books!?</p>
        <input type="hidden" name="authId" value="<?= $authorId ?>">
        <input type="hidden" name="authName" value="<?= $authorName ?>">
        <a href="authorsAdmin.php"><input type="button" value="No"></a>
        <input type="submit" name="submit" value="Yes - DO IT NOW!!">
    </form>
    </body>
</html>
