<?php include_once '../inc/header.php';?>
<?php include_once '../baza.php';?>
<?php include_once 'skryptrejestracja.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REJESTRACJA</title>
    <link rel="stylesheet" href="rejestracja.css">
</head>
<body>
    <div id="lewo">
        
        <h1 id="zarejestrujnapis">REGISTER</h1>
        <div id="lewologin">
        <form action = "" method = "POST">
        
            
        <p>nickname <br> <input type="text" value="<?php echo $nazwa; ?>" class="nick" name="nazwa"></p>
        <span class="error"><?php echo $nazwaErr; ?></span>
        <p>phone number: <br><input type="number" value="<?php echo $tel; ?>" class="tel" name="tel"></p>
        <span class="error"><?php echo $telErr; ?></span>
        <p>your password: <br><input type="password" id='haslo' value='<?php echo $haslo; ?>' class="haslo" name="haslo"><input type="button" value="" id="show"></p>
        <span class="error"><?php echo $hasloErr; ?></span>
        <p>confirm password: <br><input type="password" class="haslo" id='haslo' name="potwierdz" ></p>
        <span class="error"><?php echo $potwierdzErr; ?></span>
        
        <p>gender: <br> <select name="plec" class="plec"><br>
        <option value="2" <?php if ($plec == 2) echo 'selected'; ?> disabled>Wybierz płeć</option>
        <option value="0" <?php if ($plec == 0) echo 'selected'; ?>>man</option>
        <option value="1" <?php if ($plec == 1) echo 'selected'; ?>>woman</option>
        </select>
        </p>
</div>
        <button class="submit" id="registerr">REGISTER</button>
        
        

        </form>

        


</div>




    <div id="prawo">
        <h1>HAVE AN ACCOUNT?</h1>
        <a href="logowanie.php"><button class="submit" id="login">LOGIN</button></a>
        <br>
        <br>
        <br>
         <a href="../index.php"><button class="submit" id="BRAKONTA">CONTINUE AS GUEST</button></a>
    </div>

    <script src="skryptReg.js"></script>
</body>
</html>




















<?php include_once '../inc/footer.php';?>