<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1){
    header("location: index.php");
    exit;
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

                <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" />

            </div>
            <hr>
            <div class="menu">
                <h3 style="text-align: center;">Panel bibliotekarza</h3><br><br>
                <div class="linki">
                    <a href="./panel-admin.php"><button type="button" class="btn btn-link" style="font-size: 18px;">🏠 Panel Biblioteka</button></a><br><br>
                    <a href="./dodaj-ksiazke.php"><button type="button" class="btn btn-link" style="font-size: 18px;">📖 Dodaj książkę</button></a><br><br>

                    <a href="./szukaj-czyt.php"><button type="button" class="btn btn-link" style="font-size: 18px;">🔍 Wyszukaj czytelnika</button></a><br><br>

                    <a href="./reset-password-admin.php"><button type="button" class="btn btn-link" style="font-size: 18px;">🔏 Zmień hasło</button></a><br><br>
                    <a href="./index.php"><button type="button" class="btn btn-link" style="font-size: 18px;">📙 Biblioteka</button></a><br><br>
                </div>
            </div>
        </div>

        <div class="prawa-panel">
            <div class="panel-prawa-gora">
                <span style="margin-right: 20px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg> <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></span>
                <a href="./logout.php"><button type="button" class="btn btn-primary">Wyloguj</button></a><hr>
            </div>
            <h1>📖 Dodaj książkę!</h1><br>
            
            <div class="formularz-dodania-ksiazki">
                <form>
                    <label for="tytul">Tytuł</label>
                    <input type="text" class="form-control" id="tytul" placeholder="Wpisz Tytuł" style="width: 400px;">
                    <label for="autor">Autor</label>
                    <input type="text" class="form-control" id="autor" placeholder="Wpisz autora">
                    <label for="nr_ksiazki">Numer książki</label>
                    <input type="number" class="form-control" id="nr_ksiazki" placeholder="Wpisz numer książki">
                    <label for="gatunek">Gatunek</label>
                    <input type="text" class="form-control" id="gatunek" placeholder="Wpisz gatunek">
                    <label for="wydawnictwo">Wydawnictwo</label>
                    <input type="text" class="form-control" id="wydawnictwo" placeholder="Wpisz nazwe wydawnictwa">
                    <label for="rok_wyd">Rok wydania</label>
                    <input type="number" class="form-control" id="rok_wyd" placeholder="Wpisz rok wydania">
                    <label for="opis">Opis</label>
                    <textarea class="form-control" id="opis" rows="3"></textarea>
                    <br>
                    <label for="przykladoweWysylaniePliku">Zdjęcie okładki</label>
                    <input type="file" class="form-control-file" id="przykladoweWysylaniePliku">
                    <br><br>
                    <input type="submit" class="btn btn-primary" value="Dodaj książkę">
                </form>
            </div>
            <br><br>
            <div class="footer">
                <hr>
                <p>Projekt wykonał zespół P2/G4</p>
            </div>
        </div>
    </div>
</html>