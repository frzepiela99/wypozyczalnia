<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<?php
error_reporting(E_ERROR | E_PARSE);
require("config.php");
$opcja = $_POST['option'];
$tresc = $_POST['tresc'];
if(isset($opcja) && isset($tresc)){

echo "<div class='ksiazki'>";
$liczba = 0;
$wynik = mysqli_query($link, "SELECT * FROM `ksiazki` WHERE stan=0 AND $opcja like '%$tresc%'");
while ($row = mysqli_fetch_array($wynik)) {
    if ($liczba % 5 == 0) {
        if ($liczba > 0) {
            echo "</div>
                    <div class='ksiazki'>
                    ";
        }
    }
    echo "
    <div class='card'>
    <img src='zdjecie/". $row['zdjecie']."' class='card-img-top' style='width: 100%; height: 240px;' alt='...'>
    <hr>
    <div class='card-body' style='text-align: center;'>
    <p class='card-tytul' title='".$row['tytul']."'>".$row['tytul']."</p>
    <p class='card-text' style='text-align: center;'>".$row['autor']."</p>
        <p class='card-text' style='text-align: center; color:green;'>Dostępna</p>
        <a href='index.php?name=".$row['id_ksiazki']."'> <button type='button' class='btn btn-success'>Wypożycz</button></a>
    </div>
</div>
                ";
    $liczba = $liczba + 1;
}
$wynik1 = mysqli_query($link, "SELECT * FROM `ksiazki` WHERE stan=1 AND $opcja like '%$tresc%'");
while ($row = mysqli_fetch_array($wynik1)) {
    if ($liczba % 5 == 0) {
        echo "</div>
                    <div class='ksiazki'>
                    ";
    }
    echo "
    <div class='card'>
    <img src='zdjecie/". $row['zdjecie']."' class='card-img-top' style='width: 100%; height: 240px;' alt='...'>
    <hr>
    <div class='card-body' style='text-align: center;'>
    <p class='card-tytul' title='".$row['tytul']."'>".$row['tytul']."</p>
    <p class='card-text' style='text-align: center;'>".$row['autor']."</p>
        <p class='card-text' style='text-align: center; color:#fd078e;'>Wypożyczona</p>
        <button type='button' class='btn btn-primary'>Zapisz się</button>
    </div>
</div>
                    ";
    $liczba = $liczba + 1;
}
$wynik2 = mysqli_query($link, "SELECT * FROM `ksiazki` WHERE stan=2 AND $opcja like '%$tresc%'");
while ($row = mysqli_fetch_array($wynik2)) {
    if ($liczba % 5 == 0) {
        echo "</div>
                    <div class='ksiazki'>
                    ";
    }
    echo "
    <div class='card'>
    <img src='zdjecie/". $row['zdjecie']."' class='card-img-top' style='width: 100%; height: 240px;' alt='...'>
    <hr>
    <div class='card-body' style='text-align: center;'>
    <p class='card-tytul' title='".$row['tytul']."'>".$row['tytul']."</p>
    <p class='card-text' style='text-align: center;'>".$row['autor']."</p>
        <p class='card-text' style='text-align: center; color:grey;'>Wycofana</p>
        <button type='button' class='btn btn-light disabled'>Niedostępna</button>
    </div>
</div>
                        ";
    $liczba = $liczba + 1;
}
}else{
    echo "Odpowiednie pola nie zostały uzupełnione";
}
?>