<?php



    include_once('../baza.php');
    $nazwaErr = $telErr = $hasloErr = $plecErr = $potwierdzErr = '';
    $nazwa = $tel = $haslo = $potwierdz = $plec = '';
    $errors = false;
  
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        
        $nazwa = $_POST["nazwa"];
        $tel = $_POST["tel"];
        $haslo = $_POST["haslo"];
        $potwierdz = $_POST["potwierdz"];
        $plec = $_POST["plec"];
        

        if(empty($nazwa)){
            $nazwaErr = "*pole nazwa jest wymagane*";
            $errors = true;
        } else if(strlen($nazwa) > 21){
            $nazwaErr = "*nazwa nie moze miec wiecej niz 21znakow*";
            $errors = true;
        }


        if (empty($tel)) {
            $telErr = "*pole telefon jest wymagane*";
            $errors = true;
        } else if (strlen($tel) < 9) {
            $telErr = "*podaj prawidlowy numer telefonu*";
            $errors = true;
        } else if (!ctype_digit($tel)) {
            $telErr = "*numer moze zawierac tylko cyfry*";
            $errors = true;
        }




        if (empty($haslo)) {
            $hasloErr = "*podaj haslo*";
            $errors = true;
        } else if (strlen($haslo) < 3) {
            $hasloErr = "*podaj trudniejsze haslo*";
            $errors = true;
        } 
        

        if ($plec == 2) {
            $plecErr = "*podaj swoja plec*";
            $errors = true;
        }
        if($errors){
            return;
        }

        

            $_SESSION["nazwa"] = $nazwa;
            $_SESSION["tel"] = $tel;
            $sprawdzenie = "SELECT * FROM uzytkownik WHERE telefon='$tel'";
            $sprawdzenie2 = "SELECT * FROM uzytkownik WHERE nick='$nazwa'";
            $result = mysqli_query($conn, $sprawdzenie);
            if(mysqli_num_rows($result) > 0){
                $telErr = "*numer jest zajety*";
                $errors = true;
            }
            $result2 = mysqli_query($conn, $sprawdzenie2);
            if(mysqli_num_rows($result2) > 0){
                $nazwaErr = "*Nazwa jest zajeta*";
                $errors = true;
            }
            if(!$errors){
                $haslo = password_hash($haslo, PASSWORD_DEFAULT);
                $sql = "INSERT INTO uzytkownik(nick, telefon, haslo, ranking, rola, plec) VALUES('$nazwa', '$tel', '$haslo', 0, 0, '$plec')";
                if($conn->query($sql) === true){
                    echo "dodano";
                    header('Location: ../index.php');
                }
                else {
                    echo "blad bazy danych :C";
                    header('Location: rejestracja.php');
                    exit;
                }
            }

        }


    




?>