<?php
include_once '../inc/header.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$telErr = 'man: 1, woman 2';
$hasloErr = '123';
$tel = $haslo = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tel = $_POST["tel"];
    $haslo = $_POST["haslo"];

    
    $sprawdzenie = "SELECT * FROM `uzytkownik` WHERE `telefon` = '$tel';";
    $result = mysqli_query($conn, $sprawdzenie);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);  

        
        if (password_verify($haslo, $row['haslo'])) {
            echo "loged";

            
            $nazwa = $row["nick"];
            $plec = $row["plec"];
            $rola = $row["rola"];
            $ranking = $row["ranking"];

           
            $_SESSION["tel"] = $tel;
            $_SESSION["nazwa"] = $nazwa;
            $_SESSION["plec"] = $plec;
            $_SESSION["rola"] = $rola;
            $_SESSION["ranking"] = $ranking;

            header("Location: /mathbrain/index.php");
            

            
            
        } else {
            
            $hasloErr = "wrong password";
        }
    } else {
        
        $telErr = "account not found (only phone number rn)";
    }
}
?>
