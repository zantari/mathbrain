
<?php include_once "../../inc/header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RANKED</title>
    <link rel="stylesheet" href="ranked.css">
</head>
<body>
    

    <div id="lewo">
        <div id="lewogora">
            <p id="czas">TIME LEFT</p>
            
            <p id="timer">10</p>

        </div>


        <div id="lewodol">
            
            <h4 id="twojePunkty">POINTS <br> <em id="points">0</em></h4>

        </div>
    
    </div>

    
    <div id="srodek">
        <h1>RANKED</h1>
        <h1 id="dzialanie"><em id="tresc"></em> <input type="number" id="odpowiedz"></h1>
        
        
     
        
        <button onclick="gra()" id="start">START!</button>

        <p id="czyDobrze"></p>
        
    </div>


    <div id="prawo">
        <div id="prawogora"> <a href="/mathbrain/"><button id="powrot">GO BACK</button></a></div>

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


    <div id="komunikat">

            <h4 id="x" onclick="zamknij()">X</h4>
            <h3 id="trescKomunikat"></h3>
            <p id="zamknij" onclick="zamknij()">Try again!</p>
    </div>

    

    
    <script src="skryptranked.js"></script>
    
    
</body>
</html>



<?php include_once '../../inc/footer.php';?>