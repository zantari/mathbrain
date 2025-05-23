<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    include_once '../baza.php';
    session_start();
    $idKom = $_SESSION['idKomentarza'];
    $sql = 'DELETE FROM `komentarz` WHERE `komentarz`.`id_komentarz` = '. $_SESSION['idKomentarza'] . ';';
    $query = mysqli_query($conn, $sql);

    header("Location: lobby.php");
    


?>