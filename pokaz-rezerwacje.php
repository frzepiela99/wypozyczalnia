<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 0) {
    header("location: index.php");
    exit;
}
require("config.php");
$id_czyt=$_SESSION["id"];
$wynik1 = mysqli_query($link, 'SELECT imie, nazwisko from czytelnik where id_czytelnik=' . $id_czyt.'');
while ($row = mysqli_fetch_array($wynik1)) {
$imie = $row['imie'];
$nazwisko = $row['nazwisko'];
$jeden=1;
$zero=0;
}

if (isset($_GET['id_rez']))
{
    $anuluj_id=$_GET['id_rez'];
    $wynik1= mysqli_query($link, "select id_ksiazki from rezerwacja where id_rez= '$anuluj_id'");
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
        $wynik5= mysqli_query($link, "delete from rezerwacja where id_rez='$anuluj_id'");
    }
    else if($stan==$zero)
    {
        $nowailosc=$ilosc+1;
        $wynik4= mysqli_query($link, "update ksiazki set ilosc = '$nowailosc' where id_ksiazki='$id_ksiazki'");
        $wynik5= mysqli_query($link, "delete from rezerwacja where id_rez='$anuluj_id'");
    }


    header("location: pokaz-rezerwacje.php");
}


?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>📙 Panel Czytelnika</title>
</head>

<body>
    <div class="calosc">

        <div class="lewa-panel">
            <div class="logo">

                <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" /><br><br>
                <p style="text-align: center;">Panel czytelnika</p>

            </div>
            <hr>
            <div class="menu">
                <div class="linki">
                    <a href="./panel-czyt.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🏠 Panel Czytelnika</button></a><br><br>
                    <a href="./pokaz-rezerwacje.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📃 Pokaż rezerwacje</button></a><br><br>

                    <a href="./wypozyczenia-czytelnik.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🗃 Pokaż wypożyczenia</button></a><br><br>
                    <a href="./historia.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🗃 Historia wypożyczeń</button></a><br><br>

                    <a href="./reset-password.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🔏 Zmień hasło</button></a><br><br>
                    <a href="./index.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📙 Biblioteka</button></a><br><br>
                </div>
            </div>
        </div>

        <div class="prawa-panel">
            <div class="panel-prawa-gora">
                <span style="margin-right: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg> <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></span>
                <a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a>
                <hr>
            </div>
            <br>
            <h1>🔒 Rezerwacje użytkownika <?php echo $imie; echo " $nazwisko";?> </h1><br>
            <div class="wyszukaj-czytelnika">

                
                <br>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tytuł książki</th>
                            <th>Data rezerwacji</th>
                            <th>Koniec rezerwacji</th>
                            <th>Anuluj rezerwacje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id = $_SESSION['id'];
                        $wynik = mysqli_query($link, 'SELECT * from rezerwacja, ksiazki where rezerwacja.id_czytelnik=' . $id . ' and rezerwacja.id_ksiazki=ksiazki.id_ksiazki');
                        while ($row = mysqli_fetch_array($wynik)) {
                            echo "<tr><td>" . $row['tytul'] . "</td><td>" . $row['data_rez'] . "</td><td>" . $row['data_k_rez'] . "</td>
                            <td><a href='pokaz-rezerwacje.php?id_rez=".$row['id_rez']."'><button type='button' class='btn-sm btn-danger'>Anuluj rezerwacje</button></a></td>
                            
                            
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="footer">
                <hr>
                <p id="stopka">Projekt wykonał zespół P2/G4</p>
            </div>
</body>

</html>