<?php

session_start();

if((!isset($_POST['user']))||(!isset($_POST['password'])))
{
    header('Location: index.php');
}

require_once "connect.php";
$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
if($polaczenie->connect_errno!=0)
{
    echo "error: ".$polaczenie->connect_errno;
}
else
{
    $user=$_POST['user'];
    $password=$_POST['password'];

    $sql="SELECT * FROM uzytkownicy WHERE user='$user' AND pass='$password'";

    if($rezultat = @$polaczenie->query($sql))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
            $_SESSION['zalogowany']=true;

            $wiersz=$rezultat->fetch_assoc();
            $_SESSION['id']=$wiersz['id'];
            $_SESSION['user']=$wiersz['user'];
            $_SESSION['drewno']=$wiersz['drewno'];
            $_SESSION['kamien']=$wiersz['kamien'];
            $_SESSION['zboze']=$wiersz['zboze'];
            $_SESSION['dnipremium']=$wiersz['dnipremium'];
            $_SESSION['email']=$wiersz['email'];
            
            unset($_SESSION['blad']);
            $rezultat->close();
            header('Location: gra.php');
        }
        else
        {
            $_SESSION['blad']='<span style="color:red">Nieprawidłowy login lub hasło</span>';
            header('Location: index.php');
        }

    }
    $polaczenie->close();
}
?>