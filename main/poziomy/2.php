<?php
$_SESSION['lewel']=2;
$_SESSION['lewel']=2;
?>
<?php include_once 'poziomy.php';

?>
<?php

        
    ?>


<div id="lewodol">
    <h4 id="ocenynapis">COMMENTS</h4>
    <div id="oceny">
        <?php
        $_SESSION['lewel']=2;
        
        $poziom = 2;
        
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
    <h1>LEVEL 2</h1>
    <h1 id="dzialanie">5 * 5 =
    <input type="number" id="wynik"></h1>
    <p id="czydobrze"></p>

    <?php

    if(isset($_SESSION['nazwa'])){
        if ($twojPoziom > 2) {
            echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez2()">ALL DONE</button>';
            exit(); 
    }else{
        echo '<button class="submit" id="potwierdz" onclick="sprawdzOdp2()">ALL DONE</button>';
    }
}
else{
    echo '<button class="submit" id="potwierdz" onclick="sprawdzOdpBez2()">ALL DONE</button>';
    exit(); 

}



?>
     

    
    
</div>
<?php include_once "../../inc/footer.php";?>