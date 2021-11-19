<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
}
require("config.php");
$id_czyt = $_GET['id_czyt'];
$wynik1 = mysqli_query($link, 'SELECT imie, nazwisko from czytelnik where id_czytelnik=' . $id_czyt.'');
while ($row = mysqli_fetch_array($wynik1)) {
$imie = $row['imie'];
$nazwisko = $row['nazwisko'];
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

                <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" /><br><br>
                <p style="text-align: center;">Panel bibliotekarza</p>

            </div>
            <hr>
            <div class="menu">
                <div class="linki">
                    <a href="./panel-admin.php"><button type="button" class="btn btn-link" style="font-size: 16px;">🏠 Panel Biblioteka</button></a><br><br>
                    <a href="./dodaj-ksiazke.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📖 Dodaj książkę</button></a><br><br>
                    <a href="./edytuj-ksiazke.php"><button type="button" class="btn btn-link" style="font-size: 16px;">📝 Edytuj książkę</button></a><br><br>
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
            <h1>📚 Wypożyczenia użytkownika  <?php echo $imie; echo " $nazwisko";?></h1><br>
            <div class="wyszukaj-czytelnika">

            <a href="test.php"><button type='button' class='btn-sm btn-info' onclick="window.print()">Drukuj</button></a>
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tytuł książki</th>
                            <th>Data wypożyczenia</th>
                            <th>Zwrot</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        $id_czyt = $_GET['id_czyt'];
                        $wynik = mysqli_query($link, 'SELECT * from wypozyczenia, ksiazki where wypozyczenia.id_czytelnik=' . $id_czyt . ' and wypozyczenia.id_ksiazki=ksiazki.id_ksiazki and data_zwrotu IS null');
                        while ($row = mysqli_fetch_array($wynik)) {
                            echo "<tr><td>" . $row['tytul'] . "</td><td>" . $row['data_wyp'] . "</td><td><a href='./zwroc.php?id_wyp=".$row['id_wyp']."&&id_czyt=".$id_czyt."'><button type='button' class='btn-sm btn-info'>Zwróć</button></a></td></tr>";                        }                        ?>
                        
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