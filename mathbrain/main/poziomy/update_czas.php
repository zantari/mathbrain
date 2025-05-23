<?php
session_start();
include "../../baza.php";
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);


$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['czas'])) {
    echo json_encode(['status' => 'error', 'message' => 'Brak przesłanego czasu']);
    exit;
}

$czas = mysqli_real_escape_string($conn, $data['czas']); 

if (!isset($_SESSION["nazwa"])) {
    echo json_encode(['status' => 'error', 'message' => 'Brak aktywnej sesji użytkownika']);
    exit;
}

$nick = mysqli_real_escape_string($conn, $_SESSION["nazwa"]);


$sqlSelect = "SELECT id_uzytkownik, poziom FROM uzytkownik WHERE nick = '$nick'";
$result = mysqli_query($conn, $sqlSelect);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_uzytkownik = (int)$row['id_uzytkownik'];
    $id_poziom = (int)$row['poziom']-1;

    
    $sqlInsertCzas = "INSERT INTO czas (id_uzytkownik, id_poziom, czas) VALUES ($id_uzytkownik, $id_poziom, '$czas')";
    if (mysqli_query($conn, $sqlInsertCzas)) {
        echo json_encode(['status' => 'success', 'message' => 'Czas zapisany']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Błąd przy dodawaniu czasu: ' . mysqli_error($conn)]);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono użytkownika']);
}
?>