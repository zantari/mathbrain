<?php include_once "../../inc/header.php";?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <section id="lewo">
           <button onclick="history.back()">Go Back</button>
        </section>
        
    
    <section id="prawo">
    
    <table>
        <tr>
            <th>Nazwa użytkownika</th>
            <th>ranking</th>
            <th>rola</th>
            <th>aktualny poziom</th>
        </tr>

        <?php
        $uczestnicySql = 'SELECT `nick`, `ranking`, `rola`, `poziom`, `plec`, `telefon` FROM `uzytkownik` ORDER BY `poziom` DESC;';
        $uczesnicyResult = mysqli_query($conn, $uczestnicySql);
        while($uczestnicyRow = mysqli_fetch_assoc($uczesnicyResult)){
            echo '<tr>';
            echo '<td>'. $uczestnicyRow ["nick"] . '</td>';
            echo '<td>'. $uczestnicyRow ["ranking"] . '</td>';
            if($uczestnicyRow ["rola"] == 0){
                echo '<td> gracz </td>';
            }
            else{
                echo '<td> admin </td>';
            }

            echo '<td>'. $uczestnicyRow["poziom"] . '</td>';


            echo '</tr>';
        }

?>
 </section>

   </body>
</html>
