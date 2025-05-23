<?php

    $_SESSION['lewel']=1;

?>

<?php include_once 'poziomy.php';

?>
<?php

        
    ?>


<div id="lewodol">
    <h4 id="ocenynapis">COMMENTS</h4>
    <div id="oceny">
        <?php
        $_SESSION['lewel']=1;
        $poziom =1;
        
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
    <h1>LEVEL 1</h1>
    <h1 id="dzialanie">10 + 10 =
    <input type="number" id="wynik"></h1>
    <p id="czydobrze"></p>

    <?php

    if(isset($_SESSION['nazwa'])){
        if ($twojPoziom > 1) {
            echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez()">ALL DONE</button>';
            exit(); 
    }else{
        echo '<button class="submit" id="potwierdz" onclick="sprawdzOdp()">ALL DONE</button>';
    }
}
else{
    echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez()">ALL DONE</button>';
    exit(); 

}



?>
<p id="czydobrze"></p>
     

    
    
</div>


