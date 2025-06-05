
<?php include_once "../../inc/header.php";?>
<?php include_once "../../baza.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POZIOM</title>
    <link rel="stylesheet" href="poziom.css">
    
<script src="skrypt.js"></script>
</head>
<body>
    
    <?php
    if(isset($_SESSION["nazwa"])){
    $sprawdzeniePoziom = "SELECT poziom FROM uzytkownik WHERE nick = '" . $_SESSION["nazwa"] . "';";
    $sprawdzeniePoziomResult = mysqli_query($conn, $sprawdzeniePoziom);
    $sprawdzeniePoziomRow = mysqli_fetch_assoc($sprawdzeniePoziomResult);
    $twojPoziom = $sprawdzeniePoziomRow['poziom'];
    }

    ?>
    

   
</div>

</div>




    
    <div id="prawo">

    <div id="prawogora">
        
        <a href="/mathbrain/"><button id="powrot">POWRÓT</button></a>

    </div>
    <div id="prawodol">
        
        <?php
        if (!isset($_SESSION['lewel'])) {
    echo '<h2>RANKING</h2>';
   echo 'blad'; 
}
else{
            echo '<h2>RANKING LVL: '. $_SESSION['lewel']. '</h2>';
        ?>
        <ol>
            <?php

                $czasy = "SELECT uzytkownik.nick AS nick, czas FROM `czas` INNER JOIN uzytkownik ON czas.id_uzytkownik = uzytkownik.id_uzytkownik WHERE id_poziom=". $_SESSION['lewel']. " LIMIT 5;";
                $czasyResult = mysqli_query($conn, $czasy);
                if(mysqli_num_rows($czasyResult)>0)
                {
                while($row = mysqli_fetch_assoc($czasyResult)){
                    echo '<li>'. $row['nick'] . ' - <strong>'. $row['czas'].' </strong></li>';
                }
                
                }
                else{
                    echo '<li>Nobody has completed this level. </li><br>';
                }
            ?>
            
        <li><a href="./../uzytkownicy">All users</a></li>
            </ol>
        
        <?php
        
}

        ?>
    </div>
    </div>

    

<div id="lewo">
<div id="lewogora">
    <p id="czas">TIME</p>
    <p id="timer">00:00:00</p>
   
</div>
    
    
</body>
</html>

<?php include_once "../../inc/footer.php";?>




<script>
let reloadCount = sessionStorage.getItem("reloadCount") || 0;
reloadCount = parseInt(reloadCount);

if (reloadCount < 2) {
    sessionStorage.setItem("reloadCount", reloadCount + 1);
    location.reload();
} else {
    sessionStorage.removeItem("reloadCount");
}
</script>