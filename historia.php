<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 0) {
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
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>📙 Panel Czytelnika</title>
</head>

<body>
    <div class="calosc">

        <div class="lewa-panel">
            <div class="logo">

                <img width="180" alt="Logo" src="https://i.ibb.co/K7Th4wq/logobib.png" />

            </div>
            <hr>
            <div class="menu">
                <h4 style="text-align: center;">Panel czytelnika</h4><br>
                <div class="linki">
                    <a href="./panel-czyt.php"><button type="button" class="btn btn-link" style="font-size: 18px;">🏠 Panel Czytelnika</button></a><br>
                    <a href="./pokaz-rezerwacje.php"><button type="button" class="btn btn-link" style="font-size: 18px;">📃 Pokaż rezerwacje</button></a><br>

                    <a href="./historia.php"><button type="button" class="btn btn-link" style="font-size: 18px;">🗃 Historia wypożyczeń</button></a><br>

                    <a href="./reset-password.php"><button type="button" class="btn btn-link" style="font-size: 18px;">🔏 Zmień hasło</button></a><br>
                    <a href="./index.php"><button type="button" class="btn btn-link" style="font-size: 18px;">📙 Biblioteka</button></a><br>
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
            <h1>📚 Wypożyczenia użytkownika @user </h1><br>
            <div class="wyszukaj-czytelnika">
            
            <div class="input-group mb-4" style="width: 700px;">
                <div class="input-group-text p-0">
                    <select class="form-select form-select-lg shadow-none bg-light border-0" style="font-size: 14px;">
                        <option>Numer wypożyczenia</option>
                        <option>Nazwa książki</option>
                        <option>Numer książki</option>
                    </select>
                </div>
                <input type="text" class="form-control" placeholder="Wyszukaj">
                <button class="input-group-text shadow-none px-4 btn-warning">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </div>
                <br>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Numer wypożyczenia</th>
                            <th>Nazwa książki</th>
                            <th>Numer książki</th>
                            <th>Data wypożyczenia</th>
                            <th>Data zwrotu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Podstawy programowania w języku C++</td>
                            <td>1/2137/69</td>
                            <td>01.10.2021</td>
                            <td>02.11.2021</td>
                        </tr>
                    </tbody>
                </table>
            <br><br><br><br><br><br><br><br><br><br><br>
            </div>
            <div class="footer">
                <hr>
                <p>Projekt wykonał zespół P2/G4</p>
            </div>
        </div>
    </div>

</html>