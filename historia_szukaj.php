<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
}
?>
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
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
</head>
<?php
require("config.php");
$opcja = $_POST['option'];
$tresc = $_POST['tresc'];
$id_czyt = $_POST['czyt'];
$wynik1 = mysqli_query($link, "SELECT * from wypozyczenia, ksiazki where wypozyczenia.id_czytelnik= $id_czyt and wypozyczenia.id_ksiazki=ksiazki.id_ksiazki and data_zwrotu is not null and $opcja LIKE '%$tresc%'");
while ($row = mysqli_fetch_array($wynik1)) {
    echo "<tr><td>" . $row['tytul'] . "</td><td>" . $row['data_wyp'] . "</td><td>" . $row['data_zwrotu'] . "</td></tr>";
}


?>