<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
}
require("config.php");
$id_czyt=$_GET['id_czyt'];
$wynik1 = mysqli_query($link, 'SELECT imie, nazwisko from czytelnik where id_czytelnik=' . $id_czyt.'');
while ($row = mysqli_fetch_array($wynik1)) {
$imie = $row['imie'];
$nazwisko = $row['nazwisko'];
}

if ((isset($_GET['id_czyt'])) && (isset($_GET['anuluj']))) {
    $anuluj_id= $_GET['anuluj'];
    $jeden=1;
    $zero=0;

    //$wynik1= mysqli_query($link, "");
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
}
if ((isset($_GET['id_czyt'])) && (isset($_GET['wypozycz']))) {
    $id_rez= $_GET['wypozycz'];
    $wynik1= mysqli_query($link, "select id_ksiazki from rezerwacja where id_rez= '$id_rez'");
    while ($row = mysqli_fetch_array($wynik1)) { 
        $id_ksiazki=$row['id_ksiazki'];
    }
    $wynikn = mysqli_query($link, "INSERT INTO `wypozyczenia` (`id_wyp`, `id_czytelnik`, `id_ksiazki`, `data_wyp`, `data_zwrotu`) VALUES ('', '$id_czyt', '$id_ksiazki', CURRENT_DATE(), NULL)");
    $wynik3= mysqli_query($link, "delete from rezerwacja where id_rez='$id_rez'");

}


?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>🛠 Panel Administratora</title>
</head>

<body>
    <div class="calosc">

    <div class="lewa-panel">
            <div class="logo">

                <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" /> <br><br>
                <p style="text-align: center;">Panel bibliotekarza</p>

            </div>
            <hr>
            <div class="menu">
                <div class="linki">
                    <a href="./panel-admin.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🏠 Panel Biblioteka</button></a><br><br>
                    <a href="./dodaj-ksiazke.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📖 Dodaj książkę</button></a><br><br>
                    <a href="./szukaj-czyt.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🔍 Wyszukaj czytelnika</button></a><br><br>

                    <a href="./reset-password-admin.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🔏 Zmień hasło</button></a><br><br>
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
            <h1>🔒 Rezerwacje użytkownika <?php echo $imie; echo " $nazwisko";?></h1><br>
            <div class="wyszukaj-czytelnika">
                <br>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th>Tytuł książki</th>
                            <th>Data rezerwacji</th>
                            <th>Koniec rezerwacji</th>
                            <th>Wypożycz</th>
                            <th>Anuluj rezerwację</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            

                        <?php
                        $id_czyt=$_GET['id_czyt'];
                    
                        $wynik = mysqli_query($link, 'SELECT * from rezerwacja, ksiazki where rezerwacja.id_czytelnik=' . $id_czyt . ' and rezerwacja.id_ksiazki=ksiazki.id_ksiazki');
                        while ($row = mysqli_fetch_array($wynik)) {

                            echo "<tr><td>" . $row['tytul'] . "</td><td>" . $row['data_rez'] . "</td><td>" . $row['data_k_rez'] . "</td>
                            <td><a href='rezerwacje.php?id_czyt=$id_czyt&&wypozycz=".$row['id_rez']."'><button type='button' class='btn-sm btn-success'>Wypożycz</button></a></td>
                            <td><a href='rezerwacje.php?id_czyt=$id_czyt&&anuluj=".$row['id_rez']."'><button type='button' class='btn-sm btn-danger'>Anuluj rezerwacje</button></a></td></tr>";
                        }
                        ?>
                            
                        </tr>
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