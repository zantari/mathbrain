<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logowanie/logowanie.php">logowanie</a><br>
    <a href="logowanie/rejestracja.php">rejestracja</a><br>
    <a href="main/lobby.php">lobby</a>
    <?php

session_start();
print_r($_SESSION);

?>
    <?php

header("Location: main/lobby.php");

?>
</body>
</html>