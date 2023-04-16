<?php
    session_start();
    if(isset($_SESSION['zalogowany'])&&($_SESSION['zalogowany']==true))
    {
        header('Location: gra.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="bg" aria-hidden="true">
        <div class="bg__dot"></div>
        <div class="bg__dot"></div>
    </div>

    <form autocomplete="off" action="zaloguj.php" method="post">
        <div class="form__icon" aria-hidden="true"></div>
        <div class="form__input-container">
            <input id="user" type="text" placeholder=" " aria-label="User" name="user"/>
            <label for="user">User</label>
        </div>
        <div class="form__input-container">
            <input id="password" type="password" placeholder=" " aria-label="Password" name="password">
            <label for="password">Password</label>
        </div>
        <div class="form__spacer" aria-hidden="true"></div>
        <button>Login</button>
        <br/>
        <div id="komunikat">
        <?php
            if(isset($_SESSION['blad']))
            {
                echo $_SESSION['blad'];
            }            
        ?>
        </div>
    </form>
</body>
</html>