<?php
    session_start();

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>osadnicy</title>
</head>
<body>
    <div class="bg" aria-hidden="true">
        <div class="bg__dot"></div>
        <div class="bg__dot"></div>
    </div>
    <div style="z-index: 100">
    <?php
    echo "Witaj ".$_SESSION['user'].'! <a href="logout.php">Wyloguj się</a></br>';
    echo "<b>Drewno</b>: ".$_SESSION['drewno']."<br/>";
    echo "<b>Kamień</b>: ".$_SESSION['kamien']."<br/>";
    echo "<b>Zboże</b>: ".$_SESSION['zboze']."<br/>";
    echo "<br/><br/>";
    echo "<b>E-mail<b/>: ".$_SESSION['email']."<br/>";
    echo "<b>Dni premium<b>/: ".$_SESSION['dnipremium'];
    ?>
    </div>
</body>
</html>