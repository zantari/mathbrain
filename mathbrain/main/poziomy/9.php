<?php include_once 'poziomy.php';
    $_SESSION['lewel']=9;
?>
<?php

        
    ?>


<div id="lewodol">
    <h4 id="ocenynapis">COMMENTS</h4>
    <div id="oceny">
        <?php
        
        $poziom = 9;
        
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
    <h1>LEVEL 9</h1>
    <h1 id="dzialanie">(24 ÷ 3) + 6 × (2 + 1/2) - 18 ÷ (3/2) + 8 × (1/4 + 3/4) - 9 ÷ 3 + 5 =
    <input type="number" id="wynik"></h1>
    <p id="czydobrze"></p>
    

    <?php

    if(isset($_SESSION['nazwa'])){
        if ($twojPoziom > $poziom) {
            echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez9()">ALL DONE</button>';
            exit(); 
    }else{
        echo '<button class="submit" id="potwierdz" onclick="sprawdzOdp9()">ALL DONE</button>';
    }
}
else{
    echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez9()">ALL DONE</button>';
    exit(); 

}


?>

     

    
    
</div>
<?php include_once "../../inc/footer.php";?>