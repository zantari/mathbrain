<?php
session_start();
include "../../baza.php";
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION["nazwa"])) {
    $nick = mysqli_real_escape_string($conn, $_SESSION["nazwa"]);

    
    $sqlSelect = "SELECT poziom FROM uzytkownik WHERE nick = '$nick'";
    $result = mysqli_query($conn, $sqlSelect);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $currentLevel = (int)$row['poziom'];
        $newLevel = $currentLevel + 1;

        
        $sqlUpdate = "UPDATE uzytkownik SET poziom = '$newLevel' WHERE nick = '$nick'";
        if (mysqli_query($conn, $sqlUpdate)) {
            echo json_encode(['status' => 'success', 'message' => 'dziala', 'new_level' => $newLevel]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'blad: ' . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono użytkownika']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'brak sesji']);
}
?>
