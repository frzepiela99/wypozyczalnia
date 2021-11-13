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
if (isset($opcja) && isset($tresc)) {

    $wynik = mysqli_query($link, "SELECT Id_czytelnik, Imie, Nazwisko, Mail FROM czytelnik WHERE $opcja LIKE '$tresc%'");
    $i = 1;
    while ($row = mysqli_fetch_array($wynik)) {
        echo "<tr><th scope='row'>" . $i . "</th><td>" . $row['Imie'] . "</td><td>" . $row['Nazwisko'] . "</td><td>" . $row['Mail'] . "</td><td><a href='./dane.php?id_czyt=" . $row['Id_czytelnik'] . "'><button type='button' class='btn-sm btn-danger'>Dane</button></a></td>
    <td><a href='./rezerwacje.php?id_czyt=" . $row['Id_czytelnik'] . "''.php'><button type='button' class='btn-sm btn-success'>Rezerwacje</button></a></td>
    <td><a href='./wypozyczenia.php?id_czyt=" . $row['Id_czytelnik'] . "'.php'><button type='button' class='btn-sm btn-info'>Wypożyczenia</button></a></td><td><a href='./historia_czyt.php?id_czyt=" . $row['Id_czytelnik'] . "'.php'><button type='button' class='btn-sm btn-info'>Historia wypożyczeń</button></a></td>
</tr>";
        $i++;
    }
} else {
    echo "Odpowiednie pola nie zostały uzupełnione";
}

?>