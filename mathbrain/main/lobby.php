<?php include_once '../inc/header.php';?>
<?php include_once '../baza.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>LOBBY</title>
    <link rel="stylesheet" href="lobby.css">
    <script>
</script>
<?php
?>
</head>
<body>
    <div id="lewo">
    <form action="" method="post">
<?php
if (isset($_SESSION["nazwa"])) {
    $dane = 'SELECT * FROM uzytkownik where nick = "' . $_SESSION["nazwa"] . '"';
    $daneResult = mysqli_query($conn, $dane);
    $daneRow = mysqli_fetch_assoc($daneResult);

    if ($daneRow["poziom"] < 2) {
        echo '<h3>Przejdź poziom, aby go ocenić</h3>';
    } else {
        $idPoziom = $daneRow["poziom"] - 1;

        echo '<h3>RATE LVL ' . $idPoziom . '</h3>';

       
        if (!isset($_POST['gwiazdki'])) {
            for ($a = 1; $a <= 5; $a++) {
                echo '<button type="submit" id="gwiazdki" name="gwiazdki" value="' . $a . '">
                        <img src="poziomy/gwiazdka.png" alt="gwiazdka" width=60px>
                      </button>';
            }
        }

       
        if (isset($_POST['gwiazdki'])) {
            $ocena = (int)$_POST['gwiazdki'];

            
            $sqlSprawdzenie = 'SELECT id_komentarz, komentarz FROM komentarz WHERE id_uzytkownik = ' . $daneRow["id_uzytkownik"] . ' AND id_poziom = ' . $idPoziom . ';';
            $sqlSprawdzenieWyslij = mysqli_query($conn, $sqlSprawdzenie);

            if (mysqli_num_rows($sqlSprawdzenieWyslij) > 0) {
                $daneSprawdzenie = mysqli_fetch_assoc($sqlSprawdzenieWyslij);
                $idKomentarza = $daneSprawdzenie['id_komentarz'];
                
                $twojKomentarz = $daneSprawdzenie['komentarz'];

                
                $sqlUpdate = 'UPDATE komentarz SET ocena = ' . $ocena . ' WHERE id_komentarz = ' . $idKomentarza . ';';
                mysqli_query($conn, $sqlUpdate);

            } else {
                
                $sqlInsert = 'INSERT INTO komentarz (id_uzytkownik, id_poziom, ocena) VALUES (' . $daneRow["id_uzytkownik"] . ', ' . $idPoziom . ', ' . $ocena . ');';
                mysqli_query($conn, $sqlInsert);
            }

            if(!isset($twojKomentarz)){
                $twojKomentarz = '';
            }
            echo '<br><textarea name="komentarz" rows="4" cols="30" style="border-radius: 10%">'. $twojKomentarz .'</textarea><br>';
            echo '<button type="submit" name="wyslij" id="wyslij">WYŚLIJ</button>';
            
        }

        
        if (isset($_POST['wyslij']) && !empty($_POST['komentarz'])) {
            $komentarz = mysqli_real_escape_string($conn, $_POST['komentarz']);

            
            $sqlSprawdzenie = 'SELECT id_komentarz FROM komentarz WHERE id_uzytkownik = ' . $daneRow["id_uzytkownik"] . ' AND id_poziom = ' . $idPoziom . ';';
            $sqlSprawdzenieWyslij = mysqli_query($conn, $sqlSprawdzenie);

            if (mysqli_num_rows($sqlSprawdzenieWyslij) > 0) {
                $daneSprawdzenie = mysqli_fetch_assoc($sqlSprawdzenieWyslij);
                $idKomentarza = $daneSprawdzenie['id_komentarz'];

                
                $sqlUpdateKomentarz = 'UPDATE komentarz SET komentarz = "' . $komentarz . '" WHERE id_komentarz = ' . $idKomentarza . ';';
                mysqli_query($conn, $sqlUpdateKomentarz);

            } else {
                echo "<p>first rate with stars.</p>";
            }
        }
    }

?>
</form>
<?php
?>
<?php 
    $ocenaTwoja = 'SELECT uzytkownik.nick AS nick, ocena, komentarz, id_poziom, id_komentarz 
    FROM komentarz 
    INNER JOIN uzytkownik 
    ON komentarz.id_uzytkownik = uzytkownik.id_uzytkownik 
    WHERE komentarz.id_uzytkownik = ' . $daneRow["id_uzytkownik"] . ' 
    AND id_poziom = ' . ($daneRow["poziom"] - 1) . ';';
    
    $ocenaTwojaResult = mysqli_query($conn, $ocenaTwoja);
    $ocenaTwojaRow = mysqli_fetch_assoc($ocenaTwojaResult);
    
    if ($ocenaTwojaRow) {
        echo '<p>rate again to edit, click to delete.</p>';
        echo '<div id="twojaOcena" >';
        echo '<p><i>'. $daneRow["nick"].': </i>';
        for($a = 1; $a <= $ocenaTwojaRow['ocena']; $a++){
            echo  '<img src="poziomy/gwiazdka.png" alt="gwiazdka" width=7%>';

        } 
        echo '<br> - ' . $ocenaTwojaRow['komentarz'] . '.</p>';
        echo '</div>';
        
    }

    $srednaOcen = 'SELECT ROUND(AVG(`ocena`)) AS sredniaOcena FROM komentarz WHERE id_poziom ='.($daneRow["poziom"] - 1) . ';';
    $sredniaOcenResult = mysqli_query($conn, $srednaOcen);
    $sredniaOcenRow = mysqli_fetch_assoc($sredniaOcenResult);


    $opinieUzytkownikow = 'SELECT uzytkownik.nick AS nick, komentarz.ocena, komentarz.komentarz FROM komentarz JOIN uzytkownik ON komentarz.id_uzytkownik = uzytkownik.id_uzytkownik WHERE id_poziom ='.($daneRow["poziom"] - 1) . ';';
    $opinieUzytkownikowResult = mysqli_query($conn, $opinieUzytkownikow);

    echo '<h3> AVERAGE RATING </h3>';
    for ($b = 0; $b<$sredniaOcenRow['sredniaOcena']; $b++){
        
        echo '<img src="poziomy/gwiazdka.png" alt="gwiazdka" width=60px>';
    }
    echo '<h4><br>COMMENTS<br></h4>';

    while($opinieUzytkownikowRow = mysqli_fetch_assoc($opinieUzytkownikowResult)){
         echo '<div id="opinieUz">';
         echo '<p><strong>'. $opinieUzytkownikowRow['nick'] . ': </strong>';
         for($a = 1; $a <= $opinieUzytkownikowRow['ocena']; $a++){
            echo  '<img src="poziomy/gwiazdka.png" alt="gwiazdka" width=7%>';

        } 
        echo '<br> '. $opinieUzytkownikowRow['komentarz']. '</p></div>';


         
         
    }
}
else{
    echo '<h3> LOGIN TO RATE LEVELS </h3>';
}
?>



    

    
    
    </div>


    
    <div id="srodek">
        <?php 
        if(isset($_SESSION['komunikat'])){

            echo '<div id="komunikat">
            <h4 id="x" onclick="zamknij()">X</h4>
            <h3 id="trescKomunikat">'.  $_SESSION['komunikat'] .'</h3>
            <p id="zamknij" onclick="zamknij()">CLOSE</p>
            
            </div>
            

            ';
                
            $_SESSION['komunikat'] = '';
            unset($_SESSION['komunikat']);
            }
            
        ?>

        <div id="czyDelete">
            <?php
            $_SESSION['idKomentarza'] = $ocenaTwojaRow["id_komentarz"];
            ?>
            
            <h4 id="x" onclick="zamknijDel()">X</h4>
            
            <h3>DELETE COMMENT are you sure?</h3>
            <a href='deleteKomentarz.php'><p onclick="zamknijDel()">yes</p></a>
            <p id="nie" onclick="zamknijDel()">no</p>
            
        
           
        </div>
        


    <h1>SELECT LEVEL</h1>
    <div id="poziomy">
        
        <?php
                $sqlPoziomy = "SELECT * FROM `poziom`;";
                $sqlPoziomyResult = mysqli_query($conn, $sqlPoziomy);
                
                
                
                if (mysqli_num_rows($sqlPoziomyResult) > 0) {
                    for ($i = 0; $i < mysqli_num_rows($sqlPoziomyResult); $i++) {
                        $row = mysqli_fetch_assoc($sqlPoziomyResult);
                
                        if (!isset($_SESSION["nazwa"])) {
                            if ($i > 2) {
                                 
                               $_SESSION['komunikat'] = 'Zaloguj sie aby przechodzic inne poziomy.';
                                echo "<input class='poziom' type='button' value='" . $row['id_poziom'] . "' ' style='background-color: rgb(214, 132, 94);' onclick='komunikatShow(); location.reload()'>";
                           
                            } else {
                                echo "<a href='poziomy/" . $row['id_poziom'] . ".php'><input class='poziom' type='button' value='" . $row['id_poziom'] . "'></a>";
                            }
                        } else {
                            if($i < ($daneRow["poziom"]-1)){
                                echo "<a href='poziomy/" . $row['id_poziom'] . ".php'><input class='poziomDone' type='button' value='" . $row['id_poziom'] . "' '></a>";

                            }

                            if($i == ($daneRow["poziom"]-1)){
                            echo "<a href='poziomy/" . $row['id_poziom'] . ".php'><input class='poziom' type='button' value='" . $row['id_poziom'] . "'></a>";
                            }

                            if($i > ($daneRow["poziom"]-1)){
                            $_SESSION['komunikat'] = 'First complete the previous level.';
                            echo "<input class='poziomNext' type='button' value='" . $row['id_poziom'] . "' ' onclick='komunikatShow()'>";
                            }

                        }
                    }
                } else {
                    echo "błąd";
                }
            
                



?>
    </div>

    </div>



    <div id="prawo">


        <div id="prawogora">
        
        <?php
        if(isset($_SESSION["nazwa"])){

        

        echo '<a href="/mathbrain/main/ranked/ranked.php"><button id="rankingowy">RANKED</button></a></div>';

        }
        else{
            
            $_SESSION['komunikat'] = 'you need to be logged in to play this mode';
            echo '<input type="button" class="rankingowy" onclick="komunikatShow()" value="RANKED"></div>';


        }


        ?>

            
        



        <div id="prawodol"><h2>RANKING</h2>
        
        <?php
        $pozycjerankingowe = 'SELECT wygrane, przegrane, ranking.ranking AS ranking, uzytkownik.nick AS nick FROM `ranking` INNER JOIN uzytkownik ON uzytkownik.id_uzytkownik = ranking.id_uzytkownik;';
        $pozycjerankingoweResult = mysqli_query($conn, $pozycjerankingowe);
        while($pozycjerankingoweRow = mysqli_fetch_assoc($pozycjerankingoweResult)){
            echo ' <p id="pozycjarankingowa"> '. $pozycjerankingoweRow['nick'] . ':<strong> ' . $pozycjerankingoweRow['ranking'];
            echo '</strong> <span id="wygrane">' . $pozycjerankingoweRow['wygrane'] . '</span> ';
            echo ' <span id="przegrane">' . $pozycjerankingoweRow['przegrane'] . '</span> ';
            echo '</p>';
        }


        ?>
    
    </div>


    </div>
    <script src="lobbySkrypt.js"></script>
</body>
</html>




















<?php include_once '../inc/footer.php';?>
