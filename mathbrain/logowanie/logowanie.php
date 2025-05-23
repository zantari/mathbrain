
<?php include_once '../baza.php';?>
<?php include_once 'skryptlogowanie.php';?>

    <?php include_once '../inc/header.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGOWANIE</title>
    <link rel="stylesheet" href="rejestracja.css">
    <style>
    </style>
</head>
<body>
    <div id="lewo">
        
        <h1>LOGIN</h1>
        <div id="lewologin">
        <form action = "" method = "POST">

        <p>phone number or nickname: 
            <br>
        <input type="number" value="<?php echo $tel; ?>" class="tel" name="tel"></p>
         <span class="error1"><?php echo $telErr; ?></span>   
        
        <p>password: <br>
        <input type="password" value="" class="haslo" name="haslo" id="haslo"> <input type="button" value="" id="show">
        </p>
        <span class="error2"><?php echo $hasloErr; ?></span>    
        


        
        

       
        </div>
        <button class="submit" id="register">LOGIN</button>

        </form>
    </div>





    

    <div id="prawo">
        <h1>DONT HAVE AN ACCOUNT?</h1>
        <a href="rejestracja.php"><button class="submit" id="login">REGISTER</button></a>
        <br> <br><br>
        <a href="../index.php"><button class="submit" id="BRAKONTA">CONTINUE AS GUEST</button></a>
    </div>


    <script src="skryptReg.js"></script>
</body>
</html>




















<?php include_once '../inc/footer.php';?>
