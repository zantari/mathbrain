
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
            
            <h4 id="twojePunkty">POINTS <br> 0</p>

        </div>
    
    </div>

    
    <div id="srodek">
        <h1>RANKED (NOT READY)</h1>
        <h1 id="dzialanie"></h1>
        <input type="number" id="odpowiedz">
        
     
        <button onclick="rownanieUsunButton()" id="losujButton">losuj</button>
        <button onclick="sprawdz()">sprawdz</button>
        <p id="czyDobrze"></p>
    </div>

    <div id="prawo">
        <div id="prawogora"> <a href="/mathbrain/"><button id="powrot">POWRÓT</button></a></div>

        <div id="prawodol">
            <p>RANKING</p>
        </div>
    </div>

    

    
    <script src="skryptranked.js"></script>
    
    
</body>
</html>