<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/mathbrain/baza.php");

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mathbrain/inc/headerstyle.css">
</head>
<body>
<header id="banner">

<a href="/mathbrain/main/lobby.php"><img src="/mathbrain/inc/logo3.png" alt="Logo Math brain"></a>

<ul id="listaHeader">
    <li><a href="/mathbrain/main/uzytkownicy">RANKING</a></li>
    <li><a href="/mathbrain/main/ranked/ranked.php">RANKED</a></li>
    <li><a href="/mathbrain/main/lobby.php">LEVELS</a></li>
    <?php
    if (!isset($_SESSION['tel']) || empty($_SESSION['tel'])) {
        echo "<li><a href='/mathbrain/logowanie/logowanie.php'>LOGIN</a></li>";
    } else {
        echo '
        <form method="post" action="">
            <button id="wyloguj" type="submit" name="wyloguj">LOGOUT</button> 
        </form>
        ';
    }

    if (isset($_POST["wyloguj"])) {
        session_unset();
        session_destroy();
        header("Location: /mathbrain/logowanie/logowanie.php");
        exit();
    }
    ?>
</ul>

<?php
if (!isset($_SESSION["tel"]) || empty($_SESSION["tel"])) {
    echo '
    <div id="dane">
        <div id="informacje">
            <p id="nazwa"><i>no account</i><br>*ranking*</p>
        </div>
        <img id="profilowe" src="/mathbrain/inc/awatary/dziura.png">
    </div>
    ';
} else {
    $stmt = $conn->prepare("SELECT * FROM uzytkownik WHERE telefon = ?");
    $stmt->bind_param("s", $_SESSION["tel"]);
    $stmt->execute();
    $daneResult = $stmt->get_result();
    $daneRow = $daneResult->fetch_assoc();

    echo '
    <div id="dane">
        <div id="informacje">
            <p id="nazwa"><i>' .  htmlspecialchars($daneRow["nick"]) .  '</i><br>
            ranking: <strong>' .  htmlspecialchars($daneRow["ranking"]) . '</strong></p>
        </div>';

    if ($daneRow["rola"] == 0) {
        if ($daneRow["plec"] == 0) {
    echo '<img id="profilowe" src="/mathbrain/inc/awatary/boy.png">';
} else {
    echo '<img id="profilowe" src="/mathbrain/inc/awatary/girl.png">';
}
    } else {
        echo '<img id="profilowe" src="/mathbrain/inc/awatary/pulmuzg.png">';
    }

    echo '</div>';
}
?>
</header>
</body>
</html>
