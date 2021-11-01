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
                    <a href="./index.php"><button type="button" class="btn btn-link">🏠 Panel Czytelnika</button></a><br>
                    <a href="./index.php"><button type="button" class="btn btn-link">📃 Pokaż rezerwacje</button></a><br>

                    <a href="./index.php"><button type="button" class="btn btn-link">🗃 Historia wypożyczeń</button></a><br>

                    <a href="./index.php"><button type="button" class="btn btn-link">🔏 Zmień hasło</button></a><br>
                    <a href="./index.php"><button type="button" class="btn btn-link">📙 Biblioteka</button></a><br>
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
            <br>
            <h1>Witamy w panelu czytelnika!</h1>
            <div class="footer">
                <hr>
                <p>Projekt wykonał zespół P2/G4</p>
            </div>
        </div>
    </div>

</body>

</html>