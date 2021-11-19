<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
}
error_reporting(E_ERROR | E_PARSE);
require("config.php");
$id_wyp=$_GET['id_wyp'];
$id_czyt=$_GET['id_czyt'];
$jeden=1;
$zero=0;
$dwa=2;
if(isset($_GET['id_wyp'])){
$wynik1= mysqli_query($link, "select id_ksiazki from wypozyczenia where id_wyp= '$id_wyp'");
    while ($row = mysqli_fetch_array($wynik1)) { 
        $id_ksiazki=$row['id_ksiazki'];
    }
    $wynik2= mysqli_query($link, "select stan,ilosc from ksiazki where id_ksiazki= '$id_ksiazki'");
    while ($row = mysqli_fetch_array($wynik2)) { 
        $stan=$row['stan'];
        $ilosc=$row['ilosc'];
    }
    if($stan == $jeden)
    {
        $nowailosc=$ilosc+1;
        $wynik3= mysqli_query($link, "update ksiazki set stan = 0 where id_ksiazki='$id_ksiazki'");
        $wynik4= mysqli_query($link, "update ksiazki set ilosc = '$nowailosc' where id_ksiazki='$id_ksiazki'");
        $wynik2= mysqli_query($link, "update wypozyczenia set data_zwrotu = CURRENT_DATE() where id_wyp='$id_wyp'");
    }
    else if($stan==$zero)
    {
        $nowailosc=$ilosc+1;
        $wynik4= mysqli_query($link, "update ksiazki set ilosc = '$nowailosc' where id_ksiazki='$id_ksiazki'");
        $wynik2= mysqli_query($link, "update wypozyczenia set data_zwrotu = CURRENT_DATE() where id_wyp='$id_wyp'");
    }
    else if($stan==$dwa)
    {
        $wynik3= mysqli_query($link, "update ksiazki set stan = 0 where id_ksiazki='$id_ksiazki'");
        $wynik4= mysqli_query($link, "update ksiazki set ilosc = 1 where id_ksiazki='$id_ksiazki'");
        $wynik2= mysqli_query($link, "update wypozyczenia set data_zwrotu = CURRENT_DATE() where id_wyp='$id_wyp'");
    }

    header("location: wypozyczenia.php?id_czyt=$id_czyt");
}else{
    echo "Coś poszło nie tak";
}