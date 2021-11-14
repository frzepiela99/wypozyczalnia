<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
}
require("config.php");
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

                <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" /><br><br>
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
            <h1>🔍 Wyszukaj czytelnika</h1><br>
            <div class="wyszukaj-czytelnika">
            
            <div class="input-group mb-4" style="width: 50%;">
                <div class="input-group-text p-0">
                    <select class="form-select form-select-lg shadow-none bg-light border-0" style="font-size: 14px;" id="opcja">
                        <option value="Nazwisko">Nazwisko</option>
                        <option value="Mail">E-Mail</option>
                    </select>
                </div>
                <input type="text" class="form-control" placeholder="Wyszukaj" id="wartosc">
                <button class="input-group-text shadow-none px-4 btn-warning" onclick="pokaz()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
                <br>
                <h4>🗃 Czytelnicy zarejestrowani w bibliotece:</h4><br>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>E-Mail</th>
                            <th>Dane</th>
                            <th>Rezerwacje</th>
                            <th>Wypożyczenia</th>
                            <th>Historia</th>
                        </tr>
                    </thead>
                    <tbody id="czytelnicy">

                    <?php

$wynik = mysqli_query($link, 'SELECT Id_czytelnik, Imie, Nazwisko, Mail FROM czytelnik');
$i = 1;
while ($row = mysqli_fetch_array($wynik)) {
    echo "<tr><th scope='row'>" . $i . "</th><td>" . $row['Imie'] . "</td><td>" . $row['Nazwisko'] . "</td><td>" . $row['Mail'] . "</td><td><a href='./dane.php?id_czyt=".$row['Id_czytelnik']."'><button type='button' class='btn-sm btn-danger'>Dane</button></a></td>
    <td><a href='./rezerwacje.php?id_czyt=".$row['Id_czytelnik']."''.php'><button type='button' class='btn-sm btn-success'>Rezerwacje</button></a></td>
    <td><a href='./wypozyczenia.php?id_czyt=".$row['Id_czytelnik']."'.php'><button type='button' class='btn-sm btn-info'>Wypożyczenia</button></a></td><td><a href='./historia_czyt.php?id_czyt=".$row['Id_czytelnik']."'.php'><button type='button' class='btn-sm btn-info'>Historia wypożyczeń</button></a></td>
</tr>";
$i++;
}



                    ?>
                    </tbody>
                </table>
            <br><br><br><br><br>
            </div>
            
        </div>
    </div>
    <div class="footer">
                <hr>
                <p id="stopka">Projekt wykonał zespół P2/G4</p>
            </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function pokaz() {
            var opcja = document.getElementById("opcja").value;
            var wartosc = document.getElementById("wartosc").value;
            $.ajax({
                type: "POST",
                url: "szukaj.php",
                data: {
                    option: opcja,
                    tresc: wartosc
                }
            }).done(function(data) {
                document.getElementById("czytelnicy").innerHTML = data;
            });
        }
    </script>
</html>