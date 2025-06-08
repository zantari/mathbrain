<?php
session_start();
include "../../baza.php";
header('Content-Type: application/json');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents('php://input'), true);

if (isset($_SESSION["nazwa"]) && isset($data['punktyRankingowe'])) {
    $punktyRankingowe = (int)$data['punktyRankingowe'];
    $nick = mysqli_real_escape_string($conn, $_SESSION["nazwa"]);

    $sqlUser = "SELECT id_uzytkownik FROM uzytkownik WHERE nick = '$nick'";
    $resultUser = mysqli_query($conn, $sqlUser);

    if ($resultUser && mysqli_num_rows($resultUser) > 0) {
        $rowUser = mysqli_fetch_assoc($resultUser);
        $userId = (int)$rowUser['id_uzytkownik'];

        $sqlCheck = "SELECT * FROM ranking WHERE id_uzytkownik = $userId";
        $resultCheck = mysqli_query($conn, $sqlCheck);

        if ($resultCheck && mysqli_num_rows($resultCheck) > 0) {
            if ($punktyRankingowe >= 0) {
                $sqlUpdate = "UPDATE ranking 
                    SET ranking = ranking + $punktyRankingowe, 
                        wygrane = wygrane + 1 
                    WHERE id_uzytkownik = $userId";
            } else {
                $sqlUpdate = "UPDATE ranking 
                    SET ranking = ranking + $punktyRankingowe, 
                        przegrane = przegrane + 1 
                    WHERE id_uzytkownik = $userId";
            }

            if (mysqli_query($conn, $sqlUpdate)) {
                echo json_encode(['status' => 'success', 'message' => 'zaktualizwoane', 'punktyRankingowe' => $punktyRankingowe]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'blad: ' . mysqli_error($conn)]);
            }
        } else {
            $wygrane = ($punktyRankingowe >= 0) ? 1 : 0;
            $przegrane = ($punktyRankingowe < 0) ? 1 : 0;
            $ranking = $punktyRankingowe;

            $sqlInsert = "INSERT INTO ranking (id_uzytkownik, wygrane, przegrane, ranking) 
                          VALUES ($userId, $wygrane, $przegrane, $ranking)";

            if (mysqli_query($conn, $sqlInsert)) {
                echo json_encode(['status' => 'success', 'message' => 'dodano', 'punktyRankingowe' => $punktyRankingowe]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'blad: ' . mysqli_error($conn)]);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Nie znaleziono użytkownika']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'brak danychg']);
}
?>
