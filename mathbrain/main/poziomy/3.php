<?php include_once 'poziomy.php';
    $_SESSION['lewel']=3;
?>
<?php

        
    ?>


<div id="lewodol">
    <h4 id="ocenynapis">COMMENTS</h4>
    <div id="oceny">
        <?php
        
        $poziom = 3;
        
         $ocenySql = 'SELECT uzytkownik.nick AS nick, ocena, komentarz, id_poziom FROM komentarz INNER JOIN uzytkownik ON komentarz.id_uzytkownik = uzytkownik.id_uzytkownik where id_poziom = ' . $poziom .';';
         $ocenyResult = mysqli_query($conn, $ocenySql);
         while($ocenyRow = mysqli_fetch_assoc($ocenyResult)){
            echo '<p><strong>' . $ocenyRow['nick'] . ':</strong> <br>';
            for($i = 0; $i<$ocenyRow['ocena']; $i++ ){
                echo "<img src='gwiazdka.png' alt='gwiazdka' width=20px> ";
            }
            echo '<br>'. $ocenyRow['komentarz'];
            echo '</p>';

         }

        ?>

</div>
        </div></div>

<div id="srodek">
    <h1>LEVEL 3</h1>
    <h1 id="dzialanie">48 : 3 =
    <input type="number" id="wynik"></h1>
    <p id="czydobrze"></p>
    

    <?php

    if(isset($_SESSION['nazwa'])){
        if ($twojPoziom > 3) {
            echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez3()">ALL DONE</button>';
            exit(); 
    }else{
        echo '<button class="submit" id="potwierdz" onclick="sprawdzOdp3()">ALL DONE</button>';
    }
}
else{
    echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez3()">ALL DONE</button>';
    exit(); 

}


?>

     

    
    
</div>
<?php include_once "../../inc/footer.php";?>